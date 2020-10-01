<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * MultipleAnswers Controller
 *
 * @property \App\Model\Table\MultipleAnswersTable $MultipleAnswers
 *
 * @method \App\Model\Entity\MultipleAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MultipleAnswersController extends AppController
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
        $count = $this->MultipleAnswers->find()->count();

        $this->paginate = [
            'contain' => ['Questions'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $multipleAnswers = $this->paginate($this->MultipleAnswers);

        $this->set(compact('multipleAnswers'));
    }

    /**
     * View method
     *
     * @param string|null $id Multiple Answer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multipleAnswer = $this->MultipleAnswers->get($id, [
            'contain' => ['Questions']
        ]);

        $this->set('multipleAnswer', $multipleAnswer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $multipleAnswer = $this->MultipleAnswers->newEntity();
        if ($this->request->is('post')) {
            $multipleAnswer = $this->MultipleAnswers->patchEntity($multipleAnswer, $this->request->getData());
            if ($this->MultipleAnswers->save($multipleAnswer)) {
                $this->Flash->success(__('The multiple answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple answer could not be saved. Please, try again.'));
        }
        $questions = $this->MultipleAnswers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('multipleAnswer', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Multiple Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multipleAnswer = $this->MultipleAnswers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multipleAnswer = $this->MultipleAnswers->patchEntity($multipleAnswer, $this->request->getData());
            if ($this->MultipleAnswers->save($multipleAnswer)) {
                $this->Flash->success(__('The multiple answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple answer could not be saved. Please, try again.'));
        }
        $questions = $this->MultipleAnswers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('multipleAnswer', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Multiple Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multipleAnswer = $this->MultipleAnswers->get($id);
        if ($this->MultipleAnswers->delete($multipleAnswer)) {
            $this->Flash->success(__('The multiple answer has been deleted.'));
        } else {
            $this->Flash->error(__('The multiple answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
