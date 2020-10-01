<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * MultipleChoices Controller
 *
 * @property \App\Model\Table\MultipleChoicesTable $MultipleChoices
 *
 * @method \App\Model\Entity\MultipleChoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MultipleChoicesController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function beforeRender(Event $event) {
        parent::beforeFilter($event);
        $this->layout='/adminhome';
    }

    public function index()
    {

        $count = $this->MultipleChoices->find()->count();

        $this->paginate = [
            'contain' => ['Questions'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $multipleChoices = $this->paginate($this->MultipleChoices);

        $this->set(compact('multipleChoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Multiple Choice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multipleChoice = $this->MultipleChoices->get($id, [
            'contain' => ['Questions']
        ]);

        $this->set('multipleChoice', $multipleChoice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $multipleChoice = $this->MultipleChoices->newEntity();
        if ($this->request->is('post')) {
            $multipleChoice = $this->MultipleChoices->patchEntity($multipleChoice, $this->request->getData());
            if ($this->MultipleChoices->save($multipleChoice)) {
                $this->Flash->success(__('The multiple choice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple choice could not be saved. Please, try again.'));
        }
        $questions = $this->MultipleChoices->Questions->find('list', ['limit' => 200]);
        $this->set(compact('multipleChoice', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Multiple Choice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multipleChoice = $this->MultipleChoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multipleChoice = $this->MultipleChoices->patchEntity($multipleChoice, $this->request->getData());
            if ($this->MultipleChoices->save($multipleChoice)) {
                $this->Flash->success(__('The multiple choice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple choice could not be saved. Please, try again.'));
        }
        $questions = $this->MultipleChoices->Questions->find('list', ['limit' => 200]);
        $this->set(compact('multipleChoice', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Multiple Choice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multipleChoice = $this->MultipleChoices->get($id);
        if ($this->MultipleChoices->delete($multipleChoice)) {
            $this->Flash->success(__('The multiple choice has been deleted.'));
        } else {
            $this->Flash->error(__('The multiple choice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
