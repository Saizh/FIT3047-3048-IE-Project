<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * MultipleChoiceAttempts Controller
 *
 * @property \App\Model\Table\MultipleChoiceAttemptsTable $MultipleChoiceAttempts
 *
 * @method \App\Model\Entity\MultipleChoiceAttempt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MultipleChoiceAttemptsController extends AppController
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
        $count = $this->MultipleChoiceAttempts->find()->count();

        $this->paginate = [
            'contain' => ['ExerciseAttempts', 'MultipleChoices'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $multipleChoiceAttempts = $this->paginate($this->MultipleChoiceAttempts);

        $this->set(compact('multipleChoiceAttempts'));
    }

    /**
     * View method
     *
     * @param string|null $id Multiple Choice Attempt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multipleChoiceAttempt = $this->MultipleChoiceAttempts->get($id, [
            'contain' => ['ExerciseAttempts' => 'Exercises', 'MultipleChoices']
        ]);

        $this->set('multipleChoiceAttempt', $multipleChoiceAttempt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $multipleChoiceAttempt = $this->MultipleChoiceAttempts->newEntity();
        if ($this->request->is('post')) {
            $multipleChoiceAttempt = $this->MultipleChoiceAttempts->patchEntity($multipleChoiceAttempt, $this->request->getData());
            if ($this->MultipleChoiceAttempts->save($multipleChoiceAttempt)) {
                $this->Flash->success(__('The multiple choice attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple choice attempt could not be saved. Please, try again.'));
        }
        $exerciseAttempts = $this->MultipleChoiceAttempts->ExerciseAttempts->find('list', ['limit' => 200]);
        $multipleChoices = $this->MultipleChoiceAttempts->MultipleChoices->find('list', ['limit' => 200]);
        $this->set(compact('multipleChoiceAttempt', 'exerciseAttempts', 'multipleChoices'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Multiple Choice Attempt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multipleChoiceAttempt = $this->MultipleChoiceAttempts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multipleChoiceAttempt = $this->MultipleChoiceAttempts->patchEntity($multipleChoiceAttempt, $this->request->getData());
            if ($this->MultipleChoiceAttempts->save($multipleChoiceAttempt)) {
                $this->Flash->success(__('The multiple choice attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple choice attempt could not be saved. Please, try again.'));
        }
        $exerciseAttempts = $this->MultipleChoiceAttempts->ExerciseAttempts->find('list', ['limit' => 200]);
        $multipleChoices = $this->MultipleChoiceAttempts->MultipleChoices->find('list', ['limit' => 200]);
        $this->set(compact('multipleChoiceAttempt', 'exerciseAttempts', 'multipleChoices'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Multiple Choice Attempt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multipleChoiceAttempt = $this->MultipleChoiceAttempts->get($id);
        if ($this->MultipleChoiceAttempts->delete($multipleChoiceAttempt)) {
            $this->Flash->success(__('The multiple choice attempt has been deleted.'));
        } else {
            $this->Flash->error(__('The multiple choice attempt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
