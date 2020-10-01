<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * MultipleAnswersAttempts Controller
 *
 * @property \App\Model\Table\MultipleAnswersAttemptsTable $MultipleAnswersAttempts
 *
 * @method \App\Model\Entity\MultipleAnswersAttempt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MultipleAnswersAttemptsController extends AppController
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
        $count = $this->MultipleAnswersAttempts->find()->count();

        $this->paginate = [
            'contain' => ['ExerciseAttempts', 'MultipleAnswers'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $multipleAnswersAttempts = $this->paginate($this->MultipleAnswersAttempts);

        $this->set(compact('multipleAnswersAttempts'));
    }

    /**
     * View method
     *
     * @param string|null $id Multiple Answers Attempt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multipleAnswersAttempt = $this->MultipleAnswersAttempts->get($id, [
            'contain' => ['ExerciseAttempts' => 'Exercises', 'MultipleAnswers']
        ]);

        $this->set('multipleAnswersAttempt', $multipleAnswersAttempt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $multipleAnswersAttempt = $this->MultipleAnswersAttempts->newEntity();
        if ($this->request->is('post')) {
            $multipleAnswersAttempt = $this->MultipleAnswersAttempts->patchEntity($multipleAnswersAttempt, $this->request->getData());
            if ($this->MultipleAnswersAttempts->save($multipleAnswersAttempt)) {
                $this->Flash->success(__('The multiple answers attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple answers attempt could not be saved. Please, try again.'));
        }
        $exerciseAttempts = $this->MultipleAnswersAttempts->ExerciseAttempts->find('list', ['limit' => 200]);
        $multipleAnswers = $this->MultipleAnswersAttempts->MultipleAnswers->find('list', ['limit' => 200]);
        $this->set(compact('multipleAnswersAttempt', 'exerciseAttempts', 'multipleAnswers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Multiple Answers Attempt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multipleAnswersAttempt = $this->MultipleAnswersAttempts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multipleAnswersAttempt = $this->MultipleAnswersAttempts->patchEntity($multipleAnswersAttempt, $this->request->getData());
            if ($this->MultipleAnswersAttempts->save($multipleAnswersAttempt)) {
                $this->Flash->success(__('The multiple answers attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple answers attempt could not be saved. Please, try again.'));
        }
        $exerciseAttempts = $this->MultipleAnswersAttempts->ExerciseAttempts->find('list', ['limit' => 200]);
        $multipleAnswers = $this->MultipleAnswersAttempts->MultipleAnswers->find('list', ['limit' => 200]);
        $this->set(compact('multipleAnswersAttempt', 'exerciseAttempts', 'multipleAnswers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Multiple Answers Attempt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multipleAnswersAttempt = $this->MultipleAnswersAttempts->get($id);
        if ($this->MultipleAnswersAttempts->delete($multipleAnswersAttempt)) {
            $this->Flash->success(__('The multiple answers attempt has been deleted.'));
        } else {
            $this->Flash->error(__('The multiple answers attempt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
