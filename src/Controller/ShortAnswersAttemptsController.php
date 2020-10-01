<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ShortAnswersAttempts Controller
 *
 * @property \App\Model\Table\ShortAnswersAttemptsTable $ShortAnswersAttempts
 *
 * @method \App\Model\Entity\ShortAnswersAttempt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShortAnswersAttemptsController extends AppController
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
        $count = $this->ShortAnswersAttempts->find()->count();

        $this->paginate = [
            'contain' => ['ExerciseAttempts', 'Questions'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $shortAnswersAttempts = $this->paginate($this->ShortAnswersAttempts);

        $this->set(compact('shortAnswersAttempts'));
    }

    /**
     * View method
     *
     * @param string|null $id Short Answers Attempt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shortAnswersAttempt = $this->ShortAnswersAttempts->get($id, [
            'contain' => ['ExerciseAttempts' => 'Exercises', 'Questions']
        ]);

        $this->set('shortAnswersAttempt', $shortAnswersAttempt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortAnswersAttempt = $this->ShortAnswersAttempts->newEntity();
        if ($this->request->is('post')) {
            $shortAnswersAttempt = $this->ShortAnswersAttempts->patchEntity($shortAnswersAttempt, $this->request->getData());
            if ($this->ShortAnswersAttempts->save($shortAnswersAttempt)) {
                $this->Flash->success(__('The short answers attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short answers attempt could not be saved. Please, try again.'));
        }
        $exerciseAttempts = $this->ShortAnswersAttempts->ExerciseAttempts->find('list', ['limit' => 200]);
        $questions = $this->ShortAnswersAttempts->Questions->find('list', ['limit' => 200]);
        $this->set(compact('shortAnswersAttempt', 'exerciseAttempts', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Short Answers Attempt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shortAnswersAttempt = $this->ShortAnswersAttempts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shortAnswersAttempt = $this->ShortAnswersAttempts->patchEntity($shortAnswersAttempt, $this->request->getData());
            if ($this->ShortAnswersAttempts->save($shortAnswersAttempt)) {
                $this->Flash->success(__('The short answers attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short answers attempt could not be saved. Please, try again.'));
        }
        $exerciseAttempts = $this->ShortAnswersAttempts->ExerciseAttempts->find('list', ['limit' => 200]);
        $questions = $this->ShortAnswersAttempts->Questions->find('list', ['limit' => 200]);
        $this->set(compact('shortAnswersAttempt', 'exerciseAttempts', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Short Answers Attempt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortAnswersAttempt = $this->ShortAnswersAttempts->get($id);
        if ($this->ShortAnswersAttempts->delete($shortAnswersAttempt)) {
            $this->Flash->success(__('The short answers attempt has been deleted.'));
        } else {
            $this->Flash->error(__('The short answers attempt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
