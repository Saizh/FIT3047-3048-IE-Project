<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * CulturalNotes Controller
 *
 * @property \App\Model\Table\CulturalNotesTable $CulturalNotes
 *
 * @method \App\Model\Entity\CulturalNote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CulturalNotesController extends AppController
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
        $count = $this->CulturalNotes->find()->count();

        $this->paginate = [
            'maxLimit' => $count,
            'limit' => $count
        ];

        $culturalNotes = $this->paginate($this->CulturalNotes);

        $this->set(compact('culturalNotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cultural Note id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $culturalNote = $this->CulturalNotes->get($id, [
            'contain' => []
        ]);

        $this->set('culturalNote', $culturalNote);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $culturalNote = $this->CulturalNotes->newEntity();
        if ($this->request->is('post')) {
            $culturalNote = $this->CulturalNotes->patchEntity($culturalNote, $this->request->getData());
            if ($this->CulturalNotes->save($culturalNote)) {
                $this->Flash->success(__('The cultural note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cultural note could not be saved. Please, try again.'));
        }
        $this->set(compact('culturalNote'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cultural Note id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $culturalNote = $this->CulturalNotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $culturalNote = $this->CulturalNotes->patchEntity($culturalNote, $this->request->getData());
            if ($this->CulturalNotes->save($culturalNote)) {
                $this->Flash->success(__('The cultural note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cultural note could not be saved. Please, try again.'));
        }
        $this->set(compact('culturalNote'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cultural Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $culturalNote = $this->CulturalNotes->get($id);
        if ($this->CulturalNotes->delete($culturalNote)) {
            $this->Flash->success(__('The cultural note has been deleted.'));
        } else {
            $this->Flash->error(__('The cultural note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
