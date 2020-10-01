<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClassUnits Controller
 *
 * @property \App\Model\Table\ClassUnitsTable $ClassUnits
 *
 * @method \App\Model\Entity\ClassUnit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassUnitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */


    public function index()
    {
        $this->paginate = [
            'contain' => ['Class', 'Units']
        ];
        $classUnits = $this->paginate($this->ClassUnits);

        $this->set(compact('classUnits'));
    }

    /**
     * View method
     *
     * @param string|null $id Class Unit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classUnit = $this->ClassUnits->get($id, [
            'contain' => ['Class', 'Units']
        ]);

        $this->set('classUnit', $classUnit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classUnit = $this->ClassUnits->newEntity();
        if ($this->request->is('post')) {
            $classUnit = $this->ClassUnits->patchEntity($classUnit, $this->request->getData());
            if ($this->ClassUnits->save($classUnit)) {
                $this->Flash->success(__('The class unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class unit could not be saved. Please, try again.'));
        }
        $class = $this->ClassUnits->Class->find('list', ['limit' => 200]);
        $units = $this->ClassUnits->Units->find('list', ['limit' => 200]);
        $this->set(compact('classUnit', 'class', 'units'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Class Unit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classUnit = $this->ClassUnits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classUnit = $this->ClassUnits->patchEntity($classUnit, $this->request->getData());
            if ($this->ClassUnits->save($classUnit)) {
                $this->Flash->success(__('The class unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class unit could not be saved. Please, try again.'));
        }
        $class = $this->ClassUnits->Class->find('list', ['limit' => 200]);
        $units = $this->ClassUnits->Units->find('list', ['limit' => 200]);
        $this->set(compact('classUnit', 'class', 'units'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Class Unit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classUnit = $this->ClassUnits->get($id);
        if ($this->ClassUnits->delete($classUnit)) {
            $this->Flash->success(__('The class unit has been deleted.'));
        } else {
            $this->Flash->error(__('The class unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function confirm($ex_id = null, $class_id = null){
        $this->layout = '/teacherhome';
        if(!($ex_id == null))
            $this->set("ex_id", $ex_id);
        else{
            return $this->redirect(['controller' => "teacher", 'action' => "chooseunits"]);
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
