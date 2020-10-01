<?php
/**
 * Created by PhpStorm.
 * User: angga
 * Date: 22/08/2018
 * Time: 4:19 PM
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Enquiry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use App\Model\Entity\Role;
use App\Model\Entity\Subscription;
use Cake\ORM\Table;
use Cake\Controller\Component\PaginatorComponent;
use Cake\ORM\TableRegistry;
use Cake\Database\Schema\Collection;
use Cake\Database\Schema\TableSchema;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Query;
use Cake\ORM\Behavior\CounterCacheBehavior;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['register','login']);
    }

    public function configuration()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'YOUR APPLICATION CLIENT ID',  // you will get information about client id and secret once you have created test account in paypal sandbox
                'YOUR APPLICATION CLIENT SECRET'
            )
        );
    }


    public function adminmgmt()
    {
        $this->layout='/adminhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find(
            'all',
            array('conditions'=>array('status' => 'active'))
        ));
    }
    public function enquirymgmt()
    {
        $this->loadModel('Enquiry');
        $this->layout='/adminhome';
        $enquiry = $this->paginate($this->Enquiry);

        $this->set(compact('enquiry'));
        $this->set('enquiry', $this->Enquiry->find('all')->where(['status'=> "open"])->contain([]));
    }
    public function viewenquiry($id = null)
    {
        $this->loadModel('Enquiry');
        $this->layout='/adminhome';
        $enquiry = $this->Enquiry->get($id, [
            'contain' => []
        ]);

        $this->set('enquiry', $enquiry);
    }

    public function view($id)
    {
        $this->layout='/home';
        $user = $this->Users->get($id);
        $this->set(compact('user'));
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }


    public function add()
    {
        $this->layout='/adminhome';
        $user = $this->Users->newEntity();
        $this->loadModel('School');
        $options = $this->School->find('all',['conditions' => ['status' =>'verified']]); //or whatever conditions you want
        $this->set(compact('options',$options));
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->request->getData('school') == 'other'){
                $school = $this->request->getData('other_school');
                $user->school = $school;
            }
            // Prior to 3.4.0 $this->request->data() was used.

            $user->status = "active";
            if ($this->Users->save($user)) {
                if ($this->request->getData('school') == 'other'){
                    $this->newschool();
                }
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }

        $this->set('user', $user);

        $this->set(compact('user', 'roles'));
        $class = $this->Users->class->find('list', ['limit' => 200]);
        $this->set(compact('user', 'class'));
        $this->set('_serialize', ['user']);
    }

    public function register()
    {

        $this->loadModel('School');
        $options = $this->School->find('all',['conditions' => ['status' =>'verified']]); //or whatever conditions you want
        $this->set(compact('options',$options));
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity($this->request->getData());

            if ($this->request->getData('school') == 'other'){
                $school = $this->request->getData('other_school');
                $user->school = $school;
            }
            $user->status = "active";
            $user->subscription = Subscription::TRIAL;

            if ($this->Users->save($user)) {
                if ($this->request->getData('school') == 'other'){
                    $this->newschool();
                }
                if ($this->request->getData('role') == 'unverified'){


                    $email1 = $user['email'];
                    $first_name = $user['first_name'];
                    $surname = $user['surname'];
                    $schoolname = $user['school'];

                    $email = new Email();
                    $email->template('unverified');
                    $email->emailFormat('both');
                    $email->from('languagetub@notification.com');
                    $email->to('pinzhuozhao@gmail.com');
                    $email->subject('The system detects a new unverified teacher');
                    $email->viewVars(['schoolname' => $schoolname, 'email1' => $email1,'first_name' => $first_name,'surname' => $surname ]);

                    if ($email->send()) {

                    } else {

                    }



                }
                $this->Flash->success(__('You are now successfully signed up! Please login'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);

            }


            $this->Flash->error(__('Unable to Sign up.'));
        }
    }
    public function newschool()
    {
        $school = $this->School->newEntity();
        if ($this->request->is('post')) {
            $school->school_name = $this->request->getData('other_school');
            $school->status="unverified";

            if ($this->School->save($school)) {
                $schoolname = $this->request->getData('other_school');

                $email = new Email();
                $email->template('school');
                $email->emailFormat('both');
                $email->from('languagetub@notification.com');
                $email->to('pinzhuozhao@gmail.com');
                $email->subject('The system detects a new school');
                $email->viewVars(['schoolname' => $schoolname]);

                if ($email->send()) {

                } else {

                }


            }
        }
        $this->set(compact('school'));
    }


    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if (Role::isAdmin($user['role'])) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'users','action' => 'home']);
                } elseif (Role::isTeacher($user['role'])) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
                } elseif (Role::isUnverified($user['role'])) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
                }
                else if (Role::isStudent($user['role'])){


                    $today = date('y-m-d');
                    $today_time = strtotime($today);
                    $expire_time = strtotime($user['expiry']);

                        if ($today_time>$expire_time){
                            $this->purchase($user['id']);
                        }

                        else{$this->Auth->setUser($user);}
                    return $this->redirect(['controller' => 'student', 'action' => 'dashboard']);
                }
            } else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
    }
    public function enquiry()
    {
        $this->loadModel('Enquiry');
        $enquiry = $this->Enquiry->newEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquiry->patchEntity($enquiry, $this->request->getData());
            $enquiry->status = "open";
            if ($this->Enquiry->save($enquiry)) {

                $message = $enquiry['message'];
                $email1 =  $enquiry['email'];
                $name = $enquiry['name'];
                $phone_number = $enquiry['phone_number'];
                $country_code = $enquiry['country_code'];
                $email = new Email();
                $email->template('enquiry');
                $email->emailFormat('both');
                $email->from('languagetub@notification.com');
                $email->to('pinzhuozhao@gmail.com');
                $email->subject('You have a new enquiry');
                $email->viewVars(['email1' => $email1, 'message' => $message, 'name' => $name, 'phone_number' => $phone_number, 'country_code' => $country_code]);

                if ($email->send()) {
                    $this->Flash->success(__('Thank you for your message'));
                } else {
                    $this->Flash->error(__('It looks like we encountered a problem sending your enquiry'));
                }

                $this->redirect(['action' => 'enquiry']);
            }
//            $this->Flash->error(__('The enquiry could not be uploaded. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }
//    private function sendEmail($message, $email1) {
//        $email = new Email();
//        $email->template('enquiry');
//        $email->emailFormat('both');
//        $email->from($email1);
//        $email->to('pinzhuozhao@gmail.com');
//        $email->subject('You have a new enquiry');
//
//        if ($email->send()) {
//            $this->Flash->success(__('The enquiry has been uploaded.'));
//        } else {
//            $this->Flash->error(__('The enquiry could not be uploaded. Please, try again.'));
//        }
//    }


    public function purchase($id = null)
    {
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put','post','patch'])) {
            $user->subscription = Subscription::TRIAL;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Auth->setUser($user->toArray());


            }else {
                $this->Flash->error(__('Unable to purchase. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }




    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
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
                    $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
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

    public function edit($id = null)
    {
        $this->loadModel('School');
        $options = $this->School->find('list',['conditions' => ['status' =>'verified']]);//or whatever conditions you want
        $this->set(compact('options',$options));
        $this->layout='/adminhome';
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $class = $this->Users->class->find('list',
            array('conditions' => array('belongs_to' => $user->school)));

        $this->set(compact('user', 'class'));
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

    public function home()
    {
        $this->layout='/adminhome';
        $this->loadModel('Enquiry');
        $enquiry = $this->paginate($this->Enquiry);

        $this->set(compact('enquiry'));
        $this->set('enquiry', $this->Enquiry->find('all')->where(['status'=> "open"])->contain([]));
    }

    public function teachershome()
    {
    }



    public function addclass()
    {
        $this->layout='/adminhome';
        $this->loadModel('Class');
        $class = $this->Class->newEntity();
        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher' ]]);
        $user = $query->all();

        if ($this->request->is(['patch','post','put'])) {
            $class->subscription = "trial";
            $class = $this->Class->patchEntity($class, $this->request->getData());
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
    public function editclass($classid = null)
    {
        $this->layout='/adminhome';
        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher' ]]);
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

    public function classmgmt()
    {
        $this->layout='/adminhome';
        $this->loadModel('Class');
        $class = $this->paginate($this->Class);
        $query = $this->Users->find('all', ['conditions' => ['role' => 'teacher' ]]);
        $user = $query->all();

//        $this->set(compact('class'));
        $this->set(compact('class', 'users'));
        $this->set('class', $this->Class->find('all'));
        $this->set('user', $user);
    }





    public function profile($id = null)
    {
        $this->layout='/adminhome';
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
        'contain' => []
    ]);
        if ($this->request->is(['put','post','patch'])) {
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

    public function unverified()
    {
        $this->layout='/adminhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find(
            'all',
            array('conditions'=>array('role' => 'unverified'))
        ));
    }

    public function verified()
    {
        $this->layout='/adminhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find(
            'all',
            array('conditions'=>array('role' => 'teacher'))
        ));
    }
    public function editenquiry($id = null)
    {
        $this->loadModel('Enquiry');
        $this->layout='/adminhome';
        $enquiry = $this->Enquiry->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquiry = $this->Enquiry->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiry->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been marked as closed.'));

                return $this->redirect(['action' => 'enquirymgmt']);
            }
            $this->Flash->error(__('The enquiry could not be marked as closed. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }


    public function deleteenquiry($id = null)
    {
        $this->loadModel('Enquiry');
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquiry->get($id);
        if ($this->Enquiry->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'closed']);
    }

    public function close($id=null)
    {
        $this->loadModel('Enquiry');
        $enquiry = $this->Enquiry->get($id);

        $enquiry->status = "closed";
        if ($this->Enquiry->save($enquiry)) {
            $this->Flash->success(__('This enquiry has been closed.'));
            return $this->redirect(['action' => 'enquirymgmt']);
        }
        $this->Flash->error(__('Unable to close this enquiry.'));
    }
    public function closed()
    {
        $this->loadModel('Enquiry');
        $this->layout='/adminhome';
        $enquiry = $this->paginate($this->Enquiry);


        $this->set(compact('enquiry'));
        $this->set('enquiry', $this->Enquiry->find('all', array('conditions'=>array('status' => 'closed'))));
    }
    public function disabled()
    {
        $this->layout='/adminhome';
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('users', $this->Users->find(
            'all',
            array('conditions'=>array('status' => 'disabled'))
        ));
    }
    public function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function import()
    {
        if ($this->request->getSession()->read('Auth.User.role') == "unverified") {
            return $this->redirect(['controller' => 'teacher', 'action' => 'home']);
        }
        $this->layout = '/adminhome';
        $this->loadModel('Users');
        if ($this->request->is(['put', 'post', 'patch'])) {
            $i = 0;
            $fileName = $_FILES['FileToImport']['tmp_name'];

            $handle = fopen($fileName, "r");

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                //ignore the first line of the csv file as it is an example
                if ($i > 0){
                    $password = $this->generateRandomString();
                    $csv = [
                        'first_name' => $data[0],
                        'surname' => $data[1],
                        'email' => $data[2],
                        'school' => $data[3],
                        'role' => $data[4],
                        'year_level' => $data[5],
                        'country' => $data[6],
                        'class_id' => $data[7],
                        'password' => $password,
                        'confirm_password' => $password,
                        'subscription' => $data[8],
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

    public function viewsrecorded()
    {
        $this->layout='/adminhome';
    }

    public function editterms()
    {
        $this->loadModel('Terms');
        $this->layout='/adminhome';
        $term = $this->Terms->get('1');
        $this->set('terms', $term);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $term = $this->Terms->patchEntity($term, $this->request->getData());
            if ($this->Terms->save($term)) {
                $this->Flash->success(__('The changes have been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The term could not be saved. Please, try again.'));
        }
    }

    public function showterms()
    {

        $this->layout='/adminhome';
        $this->loadModel('Terms');
        $query = $this->Terms->find('all')->count();

        if ($query == 1){
            $term = $this->Terms->get('1');
            $this->set('terms', $term);
        } else {
            $data = ['content' => "Please add the terms and conditions here.", 'id' => "1"];

            $newterms = $this->Terms->newEntity($data);
            $this->Terms->save($newterms);
            $term = $this->Terms->get('1');
            $this->set('terms', $term);
        }

    }

    public function terms()
    {
        $this->loadModel('Terms');

        $term = $this->Terms->get('1');
        $this->set('terms', $term);
    }

    public function downloadterms()
    {

        $this->loadModel('Terms');
        $query = $this->Terms->find('all')->count();
        // $this->layout='/adminhome';
        if ($query == 1){
            $terms = $this->Terms->get('1');

            $this->viewBuilder()->setClassName('CakePdf.Pdf');


            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'download' => true,// This can be omitted if "filename" is specified.
                    'filename' => 'Terms and Conditions'
                ]
            ]);
            $this->set('terms', $terms);


        } else {
            $data = ['content' => "Please add the terms and conditions here.", 'id' => "1"];

            $newterms = $this->Terms->newEntity($data);
            $this->Terms->save($newterms);
            $term = $this->Terms->get('1');
            $this->set('terms', $term);

            $this->viewBuilder()->setClassName('CakePdf.Pdf');
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'download' => true, // This can be omitted if "filename" is specified.
                ]
            ]);
        }



    }

    public function schoolindex()
    {
        $this->layout='/adminhome';
        $this->loadModel('School');
        $school = $this->paginate($this->School);

        $this->set(compact('school'));
    }

    public function addschool()
    {
        $this->layout='/adminhome';
        $this->loadModel('School');
        $school = $this->School->newEntity();
        if ($this->request->is('post')) {
            $school = $this->School->patchEntity($school, $this->request->getData());
            if ($this->School->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect(['action' => 'schoolindex']);
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }
        $this->set(compact('school'));
    }


    public function editschool($id = null)
    {
        $this->layout='/adminhome';
        $this->loadModel('School');
        $school = $this->School->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $school = $this->School->patchEntity($school, $this->request->getData());
            if ($this->School->save($school)) {
                $this->Flash->success(__('The school has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The school could not be saved. Please, try again.'));
        }
        $this->set(compact('school'));
    }


    public function deleteschool($id = null)
    {
        $this->loadModel('School');
        $this->request->allowMethod(['post', 'delete']);
        $school = $this->School->get($id);
        if ($this->School->delete($school)) {
            $this->Flash->success(__('The school has been deleted.'));
        } else {
            $this->Flash->error(__('The school could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'schoolindex']);
    }
    public function verifiesschool($id=null)
    {
        $this->loadModel('School');
        $school = $this->School->get($id);

        $school->status = "verified";
        if ($this->School->save($school)) {
            $this->Flash->success(__('This school has been added to the school list.'));
            return $this->redirect(['action' => 'schoolindex']);
        }
        $this->Flash->error(__('Unable to add this school
        
        .'));
    }

    // public function downloadterms()
    // {
    //     $this->Terms->setTemplatePath('Users');
    //     $this->Terms->set('terms', 'This is the post');

    //     $this->Terms->pdfConfig['download'] = true;

    //     $result = $this->Terms->render('view', 'default');
    //     $this->assertContains('<h2>Rendered with default layout</h2>', $result);
    //     $this->assertContains('Post data: This is the post', $result);

    //     $this->assertContains('filename="posts.pdf"', $this->Terms->response->getHeaderLine('Content-Disposition'));
    // }
}
