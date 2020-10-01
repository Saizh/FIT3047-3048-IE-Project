<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Role;
use App\Model\Entity\Subscription;
use Cake\ORM\Table;
use Cake\Controller\Component\PaginatorComponent;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Database\Schema\Collection;
use Cake\Database\Schema\TableSchema;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\Database\Connection;

class TeacherController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    public function isAuthorized($user)
    {
        if (isset($user['role']) && $user['status'] != 'disabled' && $user['role'] === 'teacher' || $user['role'] === 'admin' || $user['role'] === 'unverified') {
            return true;
        }


    }

    public function home()
    {
        $this->layout = '/teacherhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find('all',
            array('conditions' => array('role' => 'student', 'school' => $this->request->getSession()->read('Auth.User.school'), 'status' => "active"))));


    }


    public function viewstudents()
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->layout = '/teacherhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find('all',
            array('conditions' => array('role' => 'student', 'school' => $this->request->getSession()->read('Auth.User.school'), 'status' => "active"))));
    }

    public function classpurchase($classid = null)
    {
        $this->layout = '/teacherhome';
        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher', 'school' => $this->request->getSession()->read('Auth.User.school')]]);

        $user = $query->all();
        $this->loadModel('Class');
        $this->loadModel('Users');
        $class = $this->Class->get($classid, [
            'contain' => ['users']
        ]);
        $query2 = $this->Users->find('all', ['conditions' => ['role' => 'student', 'class_id' => $class->class_id]]);
        $students = $query2->all();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $class->subscription = Subscription::FULL;
            $class->unit_token = 10;
            foreach ($students as $student) {
                $student->subscription = Subscription::FULL;
                $student->expiry = date('Y-m-d', strtotime('+1 years'));
                $student->unit_token = 0;
            }


            $class = $this->Class->patchEntity($class, $this->request->getData());
            if ($this->Class->save($class) && $this->Users->saveMany($students)) {
                $this->Flash->success(__('You have purchased a full subscription'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Unable to purchase. Please, try again.'));
        }
        $this->set(compact('user', 'class'));
    }

    public function addclass()
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->layout = '/teacherhome';
        $this->loadModel('Class');
        $class = $this->Class->newEntity();
        if ($this->request->getSession()->read('Auth.User.role') == "admin") {
            $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher']]);
            $user = $query->all();
        } else {
            $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher', 'school' => $this->request->getSession()->read('Auth.User.school')]]);
            $user = $query->all();
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Class->patchEntity($class, $this->request->getData());
            $class->subscription = "trial";
            $class->belongs_to = $this->request->getSession()->read('Auth.User.school');
            if ($this->Class->save($class)) {

                $this->Flash->new_class('Class', [
                    'params' => [
                        'classname' => $class->class_name,
                        'classid' => $class->class_id
                    ]
                ]);

                return $this->redirect(['action' => 'import']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }

        $this->set(compact('class', 'users'));
        $this->set('user', $user);
    }

    public function chooseunits($classid = null)
    {
        $this->layout = '/teacherhome';
        $this->loadModel('Units');
        $this->loadModel('Class');

        $units = $this->Units->find('all')
            ->contain(['Sections', 'Exercises']);

        $class = $this->Class->get($classid);


        $this->loadModel('Sections');
        $sections = $this->Sections->find('all');
        $counter = 1;
        foreach ($sections as $section) {
            $this->set('section' . h($counter), $section->section);
            $counter++;
        }
        $this->set('units', $units);

        $this->set(compact('user', 'class'));


    }

    public function confirm($ex_id = null, $class_id = null)
    {
        $this->layout = '/teacherhome';

        $this->loadModel('Class');
        $class = $this->Class->get($class_id);
        $this->set(compact('class'));
        if (!($ex_id == null))
            $this->set("ex_id", $ex_id);
        else {
            return $this->redirect(['controller' => "teacher", 'action' => "teacherclassmgmt"]);
        }
    }

    public function tokenspend($ex_id = null, $class_id = null)
    {
        $connection = ConnectionManager::get('default');
        $session = $this->getRequest()->getSession();
        $this->loadModel('Units');
        $this->loadModel('Class');
        $this->loadModel('Exercises');
        $this->loadModel('class_units');
        $this->set(compact('units', 'class'));
        $this->set(compact('class_units'));
        $unit = $this->Units->get($ex_id, [
            'contain' => []
        ]);
        $unit_id = $unit->id;
        $class = $this->Class->get($class_id);
        $class_tokens = $class['unit_token'];
        if ($class_tokens <= 0) {
            $this->Flash->error(__("Sorry, but you don't have enough tokens to purchase this unit"));
            return $this->redirect(['controller' => 'teacher', 'action' => 'chooseunits/' . h($class_id)]);
        } else {

            $class['unit_token'] = $class_tokens - 1;
            if ($this->Class->save($class)) {
                $this->Flash->success(__('A token has been deducted from your account'));
                $connection->insert('class_units', [
                    'unit_id' => $unit_id,
                    'class_id' => $class_id
                ]);


//                $this->Auth->setUser($user->toArray());

//            $this->getRequest()->getSession()->write('Auth.User.unit_token',$user_tokens);
                return $this->redirect(['controller' => 'Teacher', 'action' => 'chooseunits/' . h($class_id)]);
                //return $this->redirect(['controller' => 'Exercises', 'action' => 'get', $ex_id]);

            }
        }
    }

    public function editclass($classid = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }

//        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher']]);

        $this->layout = '/teacherhome';
        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher', 'school' => $this->request->getSession()->read('Auth.User.school')]]);

        $user = $query->all();


        $this->loadModel('Class');
        $class = $this->Class->get($classid, [
            'contain' => ['users']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Class->patchEntity($class, $this->request->getData());
            if ($this->Class->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
//        $this->set(compact('class'));
        $this->set(compact('user', 'class'));
    }

    public function deleteclass($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }

        $this->layout = '/teacherhome';
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Class');
        $class = $this->Class->get($id);
        if ($this->Class->delete($class)) {
            $this->Flash->success(__('The class has been deleted.'));
        } else {
            $this->Flash->error(__('The class could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    public function teacherclassmgmt()
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->layout = '/teacherhome';
        $this->loadModel('Class');
        $class = $this->paginate($this->Class);
        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher']]);
        $user = $query->all();

//        $this->set(compact('class'));
        $this->set(compact('class', 'users'));
//        $this->set('class', $this->Class->find('all'));
        $this->set('class', $this->Class->find('all',
            array('conditions' => array('belongs_to' => $this->request->getSession()->read('Auth.User.school')))));
        $this->set('user', $user);
    }


    public function edit($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->loadModel('Users');
        $this->layout = '/teacherhome';
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']) && $user['role'] == 'student') {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $class = $this->Users->class->find('list',
            array('conditions' => array('belongs_to' => $this->request->getSession()->read('Auth.User.school'))));

        $this->set(compact('user', 'class'));
    }

    public function purchase($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->loadModel('Users');
        $this->layout = '/teacherhome';
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put', 'post', 'patch'])) {
            $user->expiry = date('Y-m-d', strtotime('+1 years'));
            $user->subscription = Subscription::FULL;
            $user->unit_token = 10;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('You have purchased a full subscription'));
                return $this->redirect($this->referer());

            } else {
                $this->Flash->error(__('Unable to purchase. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

    public function add()
    {
        $this->loadModel('Class');
        $class = $this->Users->class->find('list',
            array('conditions' => array('belongs_to' => $this->request->getSession()->read('Auth.User.school'))));
        $password = $this->generateRandomString();
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }

        $this->layout = '/teacherhome';
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->getData());
            $user->status = "active";
            $user->country = $this->request->getSession()->read('Auth.User.country');
            $user->school = $this->request->getSession()->read('Auth.User.school');
            $user->subscription = Subscription::FULL;
            $user->expiry = date('Y-m-d', strtotime('+1 years'));
            $user->unit_token = 0;
            $user->role = Role::STUDENT;
            $user->password = $password;
            $user->confirm_password = $password;
            if ($this->Users->save($user)) {
                $this->Flash->newuser('Successful sign up', [
                    'params' => [
                        'password' => $password
                    ]
                ]);

                return $this->redirect(['controller' => 'teacher', 'action' => 'add']);
            }
            $this->Flash->error(__('Unable to Sign up.'));

        }
        $this->set(compact('class'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    public function profile($id = null)
    {
        $this->layout = '/teacherhome';
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put', 'post', 'patch'])) {


            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('User Updated Successfully'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->referer(['action' => 'updateProfile']));

            } else {
                $this->Flash->error(__('Unable to edit your profile. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

    public function contact($id = null)
    {
        $this->layout = '/teacherhome';
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put', 'post', 'patch'])) {


            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('User Updated Successfully'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->referer(['action' => 'updateProfile']));

            } else {
                $this->Flash->error(__('Unable to edit your profile. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

    public function reset($passkey = null)
    {
        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    // Clear passkey and timeout
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'password']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }


    }


    private function sendResetEmail($url, $user)
    {
        $email = new Email();
        $email->template('resetpassword');
        $email->emailFormat('both');
        $email->from('no-reply@languagetub.com');
        $email->to($user->email);
        $email->subject('Reset your password');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }


    public function password()
    {
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $passkey = uniqid();
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey;
                $timeout = time() + DAY;
                if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])) {
                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'password']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }


    public function purchasesub()
    {
        $this->layout = '/teacherhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find('all',
            array('conditions' => array('subscription' => 'trial', 'school' => $this->request->getSession()->read('Auth.User.school')))));
    }

    public function preview()
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->layout = '/teacherhome';
        $conn = ConnectionManager::get('default');
        if ($this->request->is('post')) {

            $fileName = $_FILES['FileToImport']['tmp_name'];
            echo "<html><body><table>\n\n";
            $f = fopen($fileName, "r");
            while (($line = fgetcsv($f)) !== false) {
                echo "<tr>";
                foreach ($line as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>\n";
            }
            fclose($f);
            echo "\n</table></body></html>";


        }
    }

    public function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }





     public function import($classid = null)
        {
            $this->loadModel('Class');


            if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
                return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
            }
            $this->loadModel('Users');
            $this->layout = '/teacherhome';


            if ($this->request->is(['put', 'post', 'patch'])) {
                $i = 0;
                $fileName = $_FILES['FileToImport']['tmp_name'];

                $handle = fopen($fileName, "r");

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    //ignore the first line of the csv file as it is an example
                    if ($i > 0) {


                        $password = $this->generateRandomString();
                        $csv = [
                            'first_name' => $data[0],
                            'surname' => $data[1],
                            'email' => $data[2],
                            'school' => $this->request->getSession()->read('Auth.User.school'),
                            'role' => Role::STUDENT,
                            'year_level' => $data[3],
                            'country' => $this->request->getSession()->read('Auth.User.country'),
                            'password' => $password,
                            'confirm_password' => $password,
                            'class_id' => $classid,
                            'subscription' => Subscription::TRIAL,
                            'status' => "active"
                        ];
                        $user = $this->Users->newEntity($csv);
                        $saveStatus = $this->Users->save($user);
                        if ($saveStatus) {
                            $this->Flash->success_csv('Successful sign up', [
                                'params' => [
                                    'email' => $data[2],
                                    'first_name' => $data[0],
                                    'surname' => $data[1],
                                    'password' => $password
                                ]
                            ]);

                        } else {
                            $this->Flash->error_csv('Unable to Sign up', [
                                'params' => [
                                    'email' => $data[2],
                                    'first_name' => $data[0],
                                    'surname' => $data[1]
                                ]
                            ]);
                        }

                    }
                    $i++;
                }
                fclose($handle);
            }
        }



}



