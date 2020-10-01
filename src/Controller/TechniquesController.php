<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;

/**
 * Techniques Controller
 *
 * @property \App\Model\Table\TechniquesTable $Techniques
 *
 * @method \App\Model\Entity\Technique[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TechniquesController extends AppController
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
        $count = $this->Techniques->find()->count();

        $this->paginate = [
            'maxLimit' => $count,
            'limit' => $count
        ];

        $techniques = $this->paginate($this->Techniques);

        $this->set(compact('techniques'));
    }

    /**
     * View method
     *
     * @param string|null $id Technique id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $technique = $this->Techniques->get($id, [
            'contain' => []
        ]);

        $this->set('technique', $technique);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $technique = $this->Techniques->newEntity();
        if ($this->request->is('post')) {
            $technique = $this->Techniques->patchEntity($technique, $this->request->getData());
            if ($this->Techniques->save($technique)) {
                $this->Flash->success(__('The technique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technique could not be saved. Please, try again.'));
        }
        $this->set(compact('technique'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Technique id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $technique = $this->Techniques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $technique = $this->Techniques->patchEntity($technique, $this->request->getData());
            if ($this->Techniques->save($technique)) {
                $this->Flash->success(__('The technique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technique could not be saved. Please, try again.'));
        }
        $this->set(compact('technique'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Technique id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $technique = $this->Techniques->get($id);
        if ($this->Techniques->delete($technique)) {
            $this->Flash->success(__('The technique has been deleted.'));
        } else {
            $this->Flash->error(__('The technique could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
