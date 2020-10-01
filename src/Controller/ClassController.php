<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Class Controller
 *
 * @property \App\Model\Table\ClassTable $Class
 *
 * @method \App\Model\Entity\Clas[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $class = $this->paginate($this->Class);

        $this->set(compact('class'));
    }

    /**
     * View method
     *
     * @param string|null $id Class id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout='/adminhome';
        $class = $this->Class->get($id, [
            'contain' => []
        ]);

        $this->set('class', $class);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout='/adminhome';
        $class = $this->Class->newEntity();
        if ($this->request->is('post')) {
            $class = $this->Class->patchEntity($class, $this->request->getData());
            if ($this->Class->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $this->set(compact('class'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Class id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout='/adminhome';
        $class = $this->Class->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Class->patchEntity($class, $this->request->getData());
            if ($this->Class->save($class)) {
                $this->Flash->success(__('The class has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }
        $this->set(compact('class'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Class id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $class = $this->Class->get($id);
        if ($this->Class->delete($class)) {
            $this->Flash->success(__('The class has been deleted.'));
        } else {
            $this->Flash->error(__('The class could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
