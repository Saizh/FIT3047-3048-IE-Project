<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Role;
use App\Model\Entity\Subscription;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;


class StudentController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Units');
        $this->Auth->allow(['view']);
        $this->loadModel('UnitViews');

    }

    public function isAuthorized($user)
    {
        if (isset($user['role']) && $user['role'] === 'teacher' || $user['role'] === 'admin' || $user['role'] === 'unverified' || $user['role'] === 'student' && $user['status'] != 'disabled') {
            return true;
        }
    }

    public function home()
    {
        $this->layout='/studenthome';
    }
//    public function unit1()
//    {
//        $this->layout='/studenthome';
//
//    }
//    public function unit2()
//    {
//        if ($this->request->getSession()->read('Auth.User.subscription') == 'trial'){
//            $this->redirect($this->referer(['action' => 'home']));
//        }
//        $this->layout='/studenthome';
//    }
//    public function unit3()
//    {
//        if ($this->request->getSession()->read('Auth.User.subscription') == 'trial'){
//            $this->redirect($this->referer(['action' => 'home']));
//        }
//        $this->layout='/studenthome';
//    }

    public function profile($id = null)
    {
        $this->layout='/studentnav';
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

            }else {
                $this->Flash->error(__('Unable to edit your profile. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }
    public function purchase($id = null)
    {
        $this->layout='/studentnav';
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put','post','patch'])) {
            $user->expiry = date('Y-m-d', strtotime('+1 years'));
            $user->subscription = Subscription::FULL;
            $user->unit_token = 10;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('You have purchased a full subscription'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->referer(['action' => 'updateProfile']));

            }else {
                $this->Flash->error(__('Unable to purchase. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }
    public function purchaseextra($id = null)
    {
        $this->layout='/studentnav';
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put','post','patch'])) {
            $user->unit_token = $user->unit_token+1;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('You have purchased one extra unit'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->referer(['action' => 'updateProfile']));

            }else {
                $this->Flash->error(__('Unable to purchase. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }

    public function tenunits($id = null)
    {
        $this->layout='/studentnav';
        $this->set('user_session', $this->request->getSession()->read('Auth.User'));

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put','post','patch'])) {
            $user->unit_token = $user->unit_token+10;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__('You have purchased ten extra units'));
                $this->Auth->setUser($user->toArray());
                return $this->redirect($this->referer(['action' => 'updateProfile']));

            }else {
                $this->Flash->error(__('Unable to purchase. Please, try again.'));
            }
        }
        $this->set(compact('user'));
    }


    public function configuration() {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'YOUR APPLICATION CLIENT ID',  // you will get information about client id and secret once you have created test account in paypal sandbox
                'YOUR APPLICATION CLIENT SECRET'
            )
        );
    }

    public function view($slug = null)
    {
        $unit = $this->Units->findBySlug($slug)->firstOrFail();

        // Only show published articles to guest users. Alternatively, admin users can see any article regardless
        // of the published status.
        if (Role::isStudent($this->Auth->user())) {
            $view = new UnitView([
                'unit_id' => $unit->id,
                'user_id' => $this->Auth->user()['id']
            ]);
            $this->UnitViews->save($view);
            $this->viewBuilder()->setLayout('default');
            $this->set(compact('unit'));
        } else {
            throw new NotFoundException("Unit not found");
        }
    }

    public function dashboard()
    {



        $this->loadModel('Techniques');
        $session = $this->getRequest()->getSession();
        $role = $session->read('Auth.User.role');
        $user_id = $session->read('Auth.User.id');
        $user = $this->Users->get($user_id, [
            'contain' => []
        ]);
        $user_tokens = $user['unit_token'];


//        if($role == 'admin'){
            $this->viewBuilder()->setLayout('studentnav');
//        }

        $name = $session->read('Auth.User.first_name');
        $query = $this->Techniques->find('all');
        foreach ($query as $rows){
            if ($rows->id == 1){
                $tec1 = $rows->technique;
            }
            elseif ($rows->id == 2){
                $tec2 = $rows->technique;
            }
            elseif ($rows->id == 3){
                $tec3 = $rows->technique;
            }
        }
        $this->Auth->setUser($user->toArray());

        $this->loadModel('Units');
        $units = $this->Units->find('all')
            ->contain(['Sections', 'Exercises']);

        $this->loadModel('Sections');
        $sections = $this->Sections->find('all');


        //Variables for templates
        $this->set('role', $role);
        $this->set('firstName', $name);
        $this->set('tec1', $tec1);
        $this->set('tec2', $tec2);
        $this->set('tec3', $tec3);
        $this->set('units', $units);

        //The name of the sections
        $counter = 1;
        foreach ($sections as $section){
            $this->set('section'.h($counter), $section->section);
            $counter++;
        }
        $this->set(compact('user'));

    }

}
