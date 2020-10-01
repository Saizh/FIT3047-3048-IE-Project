<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * TypeOfQuestions Controller
 *
 * @property \App\Model\Table\TypeOfQuestionsTable $TypeOfQuestions
 *
 * @method \App\Model\Entity\TypeOfQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeOfQuestionsController extends AppController
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
        $count = $this->TypeOfQuestions->find()->count();

        $this->paginate = [
            'maxLimit' => $count,
            'limit' => $count
        ];
        $typeOfQuestions = $this->paginate($this->TypeOfQuestions);

        $this->set(compact('typeOfQuestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Type Of Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeOfQuestion = $this->TypeOfQuestions->get($id, [
            'contain' => []
        ]);

        $this->set('typeOfQuestion', $typeOfQuestion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeOfQuestion = $this->TypeOfQuestions->newEntity();
        if ($this->request->is('post')) {
            $typeOfQuestion = $this->TypeOfQuestions->patchEntity($typeOfQuestion, $this->request->getData());
            if ($this->TypeOfQuestions->save($typeOfQuestion)) {
                $this->Flash->success(__('The type of question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type of question could not be saved. Please, try again.'));
        }
        $this->set(compact('typeOfQuestion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Of Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeOfQuestion = $this->TypeOfQuestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeOfQuestion = $this->TypeOfQuestions->patchEntity($typeOfQuestion, $this->request->getData());
            if ($this->TypeOfQuestions->save($typeOfQuestion)) {
                $this->Flash->success(__('The type of question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type of question could not be saved. Please, try again.'));
        }
        $this->set(compact('typeOfQuestion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Of Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeOfQuestion = $this->TypeOfQuestions->get($id);
        if ($this->TypeOfQuestions->delete($typeOfQuestion)) {
            $this->Flash->success(__('The type of question has been deleted.'));
        } else {
            $this->Flash->error(__('The type of question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
