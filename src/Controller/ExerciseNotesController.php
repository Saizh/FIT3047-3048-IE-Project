<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * ExerciseNotes Controller
 *
 * @property \App\Model\Table\ExerciseNotesTable $ExerciseNotes
 *
 * @method \App\Model\Entity\ExerciseNote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExerciseNotesController extends AppController
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
        $count = $this->ExerciseNotes->find()->count();

        $this->paginate = [
            'contain' => ['Users', 'Exercises'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $exerciseNotes = $this->paginate($this->ExerciseNotes);

        $this->set(compact('exerciseNotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercise Note id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exerciseNote = $this->ExerciseNotes->get($id, [
            'contain' => ['Users', 'Exercises']
        ]);

        $this->set('exerciseNote', $exerciseNote);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exerciseNote = $this->ExerciseNotes->newEntity();
        if ($this->request->is('post')) {
            $exerciseNote = $this->ExerciseNotes->patchEntity($exerciseNote, $this->request->getData());
            if ($this->ExerciseNotes->save($exerciseNote)) {
                $this->Flash->success(__('The exercise note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise note could not be saved. Please, try again.'));
        }
        $users = $this->ExerciseNotes->Users->find('list', ['limit' => 200]);
        $exercises = $this->ExerciseNotes->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('exerciseNote', 'users', 'exercises'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise Note id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exerciseNote = $this->ExerciseNotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exerciseNote = $this->ExerciseNotes->patchEntity($exerciseNote, $this->request->getData());
            if ($this->ExerciseNotes->save($exerciseNote)) {
                $this->Flash->success(__('The exercise note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise note could not be saved. Please, try again.'));
        }
        $users = $this->ExerciseNotes->Users->find('list', ['limit' => 200]);
        $exercises = $this->ExerciseNotes->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('exerciseNote', 'users', 'exercises'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exerciseNote = $this->ExerciseNotes->get($id);
        if ($this->ExerciseNotes->delete($exerciseNote)) {
            $this->Flash->success(__('The exercise note has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
