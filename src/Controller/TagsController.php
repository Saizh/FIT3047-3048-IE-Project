<?php
namespace App\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 *
 * @method \App\Model\Entity\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
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
        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['ExerciseTags'=> ['Exercises','Tags']]
        ]);

        $this->set('tag', $tag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($exid = null)
    {

        $this->layout='/adminhome';
        $exercise = $this->Tags->ExerciseTags->Exercises->get($exid, [
            'contain' => [
                'Units',
                'CulturalNotes',
                'Questions' => [
                    'TypeOfQuestions',
                    'Exercises'
                ],
                'ExerciseTags' => 'Tags'
            ]
        ]);
        $tagarray = array();
        foreach($exercise->exercise_tags as $tags){
            array_push($tagarray,$tags->tag->name);
        }
        $exercisetag = $this->Tags->ExerciseTags->newEntity();
        $alltags= $this->Tags->find('all');
        $tagCount = $this->Tags->find('all')->count();
        $tag = $this->Tags->newEntity();

        if ($this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $data = $this->request->getData();
            if($data["formid"] == "1"){
                $this->Tags->ExerciseTags->deleteAll(['exercise_id'=>$exid]);
                array_shift($data);
                foreach($alltags as $tags){
                    if(isset($data[$tags['name']])){
                        $connection->insert("exercise_tags",[
                            'exercise_id' => $exid,
                            'tag_id' => $data[$tags['name']]
                        ]);
                    }

                }
                $this->Flash->success(__('Tags have been modified'));
                return $this->redirect(['controller'=> 'Exercises','action' => 'index']);
            }
            elseif($data["formid"] == "2"){
                array_shift($data);
                $tag = $this->Tags->patchEntity($tag, $this->request->getData());
                if ($this->Tags->save($tag)) {
                    $this->Flash->success(__('The tag has been saved.'));

                    return $this->redirect($this->referer());
                }
            }
            elseif($data["formid"] == "4"){
                array_shift($data);
                foreach($alltags as $tags){
                    if(isset($data[$tags['name']])){
                        $connection->delete("tags",[
                            'id' => $data[$tags['name']]
                        ]);
                    }
                }
                $this->Flash->success(__('Tags have been removed'));
                return $this->redirect($this->referer());
            }

            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $this->set(compact('tag','alltags','exercisetag','tagCount','tagarray'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout='/adminhome';
        $tag = $this->Tags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $this->set(compact('tag'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
