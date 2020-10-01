<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * ExerciseTags Controller
 *
 * @property \App\Model\Table\ExerciseTagsTable $ExerciseTags
 *
 * @method \App\Model\Entity\ExerciseTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExerciseTagsController extends AppController
{

    public function beforeRender(Event $event) {
        parent::beforeFilter($event);
        $this->layout='/adminhome';
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exercises', 'Tags']
        ];
        $exerciseTags = $this->paginate($this->ExerciseTags);

        $this->set(compact('exerciseTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercise Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exerciseTag = $this->ExerciseTags->get($id, [
            'contain' => ['Exercises', 'Tags']
        ]);

        $this->set('exerciseTag', $exerciseTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exerciseTag = $this->ExerciseTags->newEntity();
        if ($this->request->is('post')) {
            $exerciseTag = $this->ExerciseTags->patchEntity($exerciseTag, $this->request->getData());
            if ($this->ExerciseTags->save($exerciseTag)) {
                $this->Flash->success(__('The exercise tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise tag could not be saved. Please, try again.'));
        }
        $exercises = $this->ExerciseTags->Exercises->find('list', ['limit' => 200]);
        $tags = $this->ExerciseTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('exerciseTag', 'exercises', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exerciseTag = $this->ExerciseTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exerciseTag = $this->ExerciseTags->patchEntity($exerciseTag, $this->request->getData());
            if ($this->ExerciseTags->save($exerciseTag)) {
                $this->Flash->success(__('The exercise tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise tag could not be saved. Please, try again.'));
        }
        $exercises = $this->ExerciseTags->Exercises->find('list', ['limit' => 200]);
        $tags = $this->ExerciseTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('exerciseTag', 'exercises', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exerciseTag = $this->ExerciseTags->get($id);
        if ($this->ExerciseTags->delete($exerciseTag)) {
            $this->Flash->success(__('The exercise tag has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
