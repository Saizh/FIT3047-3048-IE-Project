<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Exercise;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * UserUnits Controller
 *
 * @property \App\Model\Table\UserUnitsTable $UserUnits
 *
 * @method \App\Model\Entity\UserUnit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserUnitsController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if (($user['subscription'])=='full') {
            $this->Auth->allow(['confirm','tokenspend']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Units', 'Users']
        ];
        $userUnits = $this->paginate($this->UserUnits);

        $this->set(compact('userUnits'));
    }

    /**
     * View method
     *
     * @param string|null $id User Unit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userUnit = $this->UserUnits->get($id, [
            'contain' => ['Units', 'Users']
        ]);

        $this->set('userUnit', $userUnit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->getRequest()->getSession();
        $userUnit = $this->UserUnits->newEntity();
        if ($this->request->is('post')) {


            $userUnit = $this->UserUnits->patchEntity($userUnit, $this->request->getData());

            $userUnit->user_id=$session->read('Auth.User.id');

            if ($this->UserUnits->save($userUnit)) {
                $this->Flash->success(__('The user unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user unit could not be saved. Please, try again.'));
        }
        $units = $this->UserUnits->Units->find('list', ['limit' => 200]);


        $users = $session->read('Auth.User.id');
        $this->set(compact('userUnit', 'units', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Unit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userUnit = $this->UserUnits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userUnit = $this->UserUnits->patchEntity($userUnit, $this->request->getData());
            if ($this->UserUnits->save($userUnit)) {
                $this->Flash->success(__('The user unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user unit could not be saved. Please, try again.'));
        }
        $units = $this->UserUnits->Units->find('list', ['limit' => 200]);
        $users = $this->UserUnits->Users->find('list', ['limit' => 200]);
        $this->set(compact('userUnit', 'units', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Unit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userUnit = $this->UserUnits->get($id);
        if ($this->UserUnits->delete($userUnit)) {
            $this->Flash->success(__('The user unit has been deleted.'));
        } else {
            $this->Flash->error(__('The user unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    * A confirmation page as to whether the user wants to buy the unit
    *
    * @param $ex_id is the id to the exercise
    */
    public function confirm($ex_id = null){
      $this->viewBuilder()->setLayout('studentnav');
      if(!($ex_id == null))
      $this->set("ex_id", $ex_id);
      else{
        return $this->redirect(['controller' => "student", 'action' => "dashboard"]);
      }
    }

    public function tokenspend($ex_id = null)
    {
        $connection = ConnectionManager::get('default');
        $session = $this->getRequest()->getSession();
        $exercise = $this->UserUnits->Units->Exercises->get($ex_id, [
            'contain' => []
        ]);
        $user_id = $session->read('Auth.User.id');
        $user = $this->UserUnits->Users->get($user_id, [
            'contain' => []
        ]);
        $user_tokens = $user['unit_token'];
        if ($user_tokens <= 0) {
            $this->Flash->error(__("Sorry, but you don't have enough tokens to purchase this unit"));
            return $this->redirect(['controller' => 'Student', 'action' => 'Dashboard']);
        } 
        else {
            $user['unit_token'] = $user_tokens - 1;
            if ($this->UserUnits->Users->save($user)) {
                $this->Flash->success(__('A token has been deducted from your account'));
                $connection->insert('user_units', [
                    'unit_id' => $exercise['unit_id'],
                    'user_id' => $user_id
                ]);
                $this->Auth->setUser($user->toArray());
            }
            $this->getRequest()->getSession()->write('Auth.User.unit_token',$user_tokens);
            return $this->redirect(['controller' => 'Student', 'action' => 'Dashboard']);
            //return $this->redirect(['controller' => 'Exercises', 'action' => 'get', $ex_id]);

        }
    }
}
