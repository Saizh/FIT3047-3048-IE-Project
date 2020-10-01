<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $count = $this->Questions->find()->count();

        $this->layout='/adminhome';
        $this->paginate = [
            'contain' => ['Exercises', 'TypeOfQuestions'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout='/adminhome';
        $question = $this->Questions->get($id, [
            'contain' => ['Exercises',
                'TypeOfQuestions',
                'MultipleAnswers' => 'Questions',
                'MultipleChoices' => 'Questions',
                'ShortAnswers' => 'Questions']
        ]);

        $this->set('question', $question);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout='/adminhome';
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $data = $this->request->getData();
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

            }
            $lastResult = $this->Questions->find('All')
                ->orderDesc('id')
                ->first();
            $question_id = $lastResult->id;

            if($data['type_of_question_id'] == 1){
                for($x = 0; $x <=4; $x++){
                    $y = $x +1;
                    $answer = "answer_$y";
                    $correct = "correct $y";
                    if($data[$answer] != ""){
                        if($data["correct"] == $correct){
                            $connection->insert('multiple_choices', [
                                'question_id' => $question_id,
                                'answer' => $data[$answer],
                                'correct' => "1",
                            ]);
                        }
                        else{
                            $connection->insert('multiple_choices', [
                                'question_id' => $question_id,
                                'answer' => $data[$answer],
                                'correct' => "0",
                            ]);
                        }
                    }
                }
                return $this->redirect(['action' => 'index']);
            }
            elseif($data['type_of_question_id'] == 3){
                if($data['possible_answer'] != ""){
                    $connection->insert('short_answers', [
                        'question_id' => $question_id,
                        'possible_answer' => $data['possible_answer']
                    ]);
                }
                return $this->redirect(['action' => 'index']);
            }
            elseif($data['type_of_question_id'] == 4){
                for($x = 0; $x <=4; $x++){
                    $y = $x +1;
                    $answer = "answer_$y";
                    $correct = "correct_$y";
                    if($data[$answer] != ""){
                        $connection->insert('multiple_answers', [
                            'question_id' => $question_id,
                            'answer' => $data[$answer],
                            'correct' => $data[$correct],
                        ]);
                    }
                }
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $exercises = $this->Questions->Exercises->find('list', ['limit' => 200, 'valueField' => 'name']);
        $typeOfQuestions = $this->Questions->TypeOfQuestions->find('list', ['limit' => 200, 'valueField' => 'question_type']);
        $this->set(compact('question', 'exercises', 'typeOfQuestions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout='/adminhome';
        $question = $this->Questions->get($id, [
            'contain' => [
                'ShortAnswers',
                'MultipleAnswers',
                'MultipleChoices'
                ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData(), [
                'associated' => [
                    'MultipleChoices',
                    'MultipleAnswers',
                    'ShortAnswers'
                ]]);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $exercises = $this->Questions->Exercises->find('list', ['limit' => 200]);
        $typeOfQuestions = $this->Questions->TypeOfQuestions->find('list', ['limit' => 200]);
        $this->set(compact('question', 'exercises', 'typeOfQuestions','multipleChoice','shortAnwser','multipleAnwser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
