<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ShortAnswers Controller
 *
 * @property \App\Model\Table\ShortAnswersTable $ShortAnswers
 *
 * @method \App\Model\Entity\ShortAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShortAnswersController extends AppController
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
        $count = $this->ShortAnswers->find()->count();

        $this->paginate = [
            'contain' => ['Questions'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $shortAnswers = $this->paginate($this->ShortAnswers);

        $this->set(compact('shortAnswers'));
    }

    /**
     * View method
     *
     * @param string|null $id Short Answer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shortAnswer = $this->ShortAnswers->get($id, [
            'contain' => ['Questions']
        ]);

        $this->set('shortAnswer', $shortAnswer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortAnswer = $this->ShortAnswers->newEntity();
        if ($this->request->is('post')) {
            $shortAnswer = $this->ShortAnswers->patchEntity($shortAnswer, $this->request->getData());
            if ($this->ShortAnswers->save($shortAnswer)) {
                $this->Flash->success(__('The short answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short answer could not be saved. Please, try again.'));
        }
        $questions = $this->ShortAnswers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('shortAnswer', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Short Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shortAnswer = $this->ShortAnswers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shortAnswer = $this->ShortAnswers->patchEntity($shortAnswer, $this->request->getData());
            if ($this->ShortAnswers->save($shortAnswer)) {
                $this->Flash->success(__('The short answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short answer could not be saved. Please, try again.'));
        }
        $questions = $this->ShortAnswers->Questions->find('list', ['limit' => 200]);
        $this->set(compact('shortAnswer', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Short Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortAnswer = $this->ShortAnswers->get($id);
        if ($this->ShortAnswers->delete($shortAnswer)) {
            $this->Flash->success(__('The short answer has been deleted.'));
        } else {
            $this->Flash->error(__('The short answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
