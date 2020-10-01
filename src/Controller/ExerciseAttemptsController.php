<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\ExerciseAttempts;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * ExerciseAttempts Controller
 *
 * @property \App\Model\Table\ExerciseAttemptsTable $ExerciseAttempts
 *
 * @method \App\Model\Entity\ExerciseAttempt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExerciseAttemptsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if (isset($user['role'])) {
            $this->Auth->allow(['attempt']);
            $this->Auth->allow(['show']);
            $this->Auth->allow(['submitMarks']);
            $this->Auth->allow(['allAttempts']);
            $this->Auth->allow(['pastAttempt']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->layout='/adminhome';

        $count = $this->ExerciseAttempts->find()->count();

        $this->paginate = [
            'contain' => ['Users', 'Exercises'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $exerciseAttempts = $this->paginate($this->ExerciseAttempts);

        $this->set(compact('exerciseAttempts'));
    }
    public function studentindex($id = null)
    {
        $this->layout='/adminhome';

        $count = $this->ExerciseAttempts->find()->count();

        $this->paginate = [
            'contain' => ['Users', 'Exercises'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $query = $this->ExerciseAttempts->find()->where(['user_id' => $id]);

        $exerciseAttempts = $this->paginate($query);

        $this->set(compact('exerciseAttempts'));
    }
    /**
     * View method
     *
     * @param string|null $id Exercise Attempt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout='/adminhome';

        $exerciseAttempt = $this->ExerciseAttempts->get($id, [
            'contain' => ['Users', 'Exercises',
                'MultipleAnswersAttempts' => ['ExerciseAttempts' =>'Exercises', 'MultipleAnswers'],
                'MultipleChoiceAttempts' => ['ExerciseAttempts' =>'Exercises', 'MultipleChoices'],
                'ShortAnswersAttempts' => ['ExerciseAttempts' =>'Exercises', 'Questions']]
        ]);

        $this->set('exerciseAttempt', $exerciseAttempt);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->layout='/adminhome';

        $exerciseAttempt = $this->ExerciseAttempts->newEntity();
        if ($this->request->is('post')) {
            $exerciseAttempt = $this->ExerciseAttempts->patchEntity($exerciseAttempt, $this->request->getData());
            if ($this->ExerciseAttempts->save($exerciseAttempt)) {
                $this->Flash->success(__('The exercise attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
        }
            $this->Flash->error(__('The exercise attempt could not be saved. Please, try again.'));
        }
        $users = $this->ExerciseAttempts->Users->find('list', ['limit' => 200]);
        $exercises = $this->ExerciseAttempts->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('exerciseAttempt', 'users', 'exercises'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise Attempt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->layout='/adminhome';

        $exerciseAttempt = $this->ExerciseAttempts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exerciseAttempt = $this->ExerciseAttempts->patchEntity($exerciseAttempt, $this->request->getData());
            if ($this->ExerciseAttempts->save($exerciseAttempt)) {
                $this->Flash->success(__('The exercise attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise attempt could not be saved. Please, try again.'));
        }
        $users = $this->ExerciseAttempts->Users->find('list', ['limit' => 200]);
        $exercises = $this->ExerciseAttempts->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('exerciseAttempt', 'users', 'exercises'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise Attempt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exerciseAttempt = $this->ExerciseAttempts->get($id);
        if ($this->ExerciseAttempts->delete($exerciseAttempt)) {
            $this->Flash->success(__('The exercise attempt has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise attempt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    * A method to submit an exercise Attempt
    *
    *@param int|null $id is the exercise id
    */
    public function attempt($id = null){

      $this->loadModel('Exercises');
      $this->loadModel('Exercise_notes');

        $session = $this->getRequest()->getSession();
        $user_id = $session->read('Auth.User.id');

        $array = array();

      if($this->request->is('post')){
        $exercises = $this->Exercises->find('All')->limit(1)
            ->where(['id'=>$id])
            ->contain(['questions'=>['typeOfQuestions','multipleChoices', 'shortAnswers', 'multipleAnswers']]);

        $connection = ConnectionManager::get('default');

        $date = date("Y-m-d H:i:s");

        $updatedNotes = $this->Exercise_notes->find('All')->limit(1)
            ->where(['user_id'=>$user_id, 'exercise_id'=>$id]);

        if($updatedNotes->count() != 0 ){
          $updatedNotes->note = $_POST["my-notes"];
          foreach ($updatedNotes as $updatedNote){
            $connection->update('exercise_notes', ['note' => $_POST['my-notes']],['id' => $updatedNote->id]);
          }
        } else{
            $connection->insert('exercise_notes', [
                'user_id' => $user_id,
                'exercise_id' => $id,
                'note' => $_POST['my-notes']
            ]);
        }

        $connection->insert('exercise_attempts', [
            'attempt_date' => $date,
            'user_id' => $user_id,
            'exercise_id' => $id,
            'score' => null
        ]);

        $lastResult = $this->ExerciseAttempts->find('All')
          ->where(['user_id' => $user_id])
          ->orderDesc('id')
          ->first();

        //The final score
        $finalScore = 0;

        foreach($exercises as $exercise){
            foreach($exercise->questions as $question){

              //The next few if-statements will store the data into their respective databases
              if($question->type_of_question_id == 1){
                  //if it is a multiple choice question

                  $score = 0;

                  foreach ($question->multiple_choices as $choices){

                      if($_POST["multiple_choice_".h($question->id)] == $choices->id){
                        if($choices->correct == true){
                          $score = 1;
                          $finalScore += 1;
                        }
                      }
                  }

                $connection->insert('multiple_choice_attempts', [
                    'exercise_attempt_id' => $lastResult->id,
                    'multiple_choice_id' => $_POST["multiple_choice_".h($question->id)],
                    'score' => $score
                ]);

                  array_push($array,$_POST["multiple_choice_".h($question->id)]);
              }

              else if($question->type_of_question_id == 3){
                  //if it is a short answer question

                  $connection->insert('short_answers_attempts',[
                      'exercise_attempt_id' => $lastResult->id,
                      'question_id' => $question->id,
                      'attempted_answer' => $_POST["short_answer_".h($question->id)],
                      'score' => 0
                  ]);

                  array_push($array,$_POST["short_answer_".h($question->id)]);
              }

              else if($question->type_of_question_id == 4){
                  //if it is a multiple answer question

                  array_push($array, $_POST["multiple_answer_".h($question->id)]);
                  foreach($_POST["multiple_answer_".h($question->id)] as $multiple_answer){
                      $score = 0;
                      foreach ($question->multiple_answers as $mAnswer) {

                          if ($multiple_answer == $mAnswer->id) {
                              if($mAnswer->correct == true){
                                $score = 1;
                                $finalScore += 1;
                              }
                          }
                      }

                      $connection->insert('multiple_answers_attempts',[
                          'exercise_attempt_id' => $lastResult->id,
                          'multiple_answer_id' => $multiple_answer,
                          'score' => $score
                      ]);
                      //array_push($array, $multiple_answer);
                  }
              }
            }
        }

        $connection->update('exercise_attempts', ['score' => $finalScore],['id' => $lastResult->id]);

        //This is an array of all the attempted values (id)
        $this->set('ValueArray', $array);

        return $this->redirect(['action' => 'show/'.h($lastResult->id)]);
      }
    }

    /**
     * A method to submit the marks after a student has 'self marked' their exam (Mainly for the short answered questions)
     *
     */
    public function submitMarks(){
        $this->loadModel('ShortAnswersAttempts');
        $this->loadModel('ExerciseAttempts');

        if($this->request->is('post')) {
          $connection = ConnectionManager::get('default');

          $session = $this->getRequest()->getSession();
          $user_id = $session->read('Auth.User.id');

          $currentlyMarking = $this->ShortAnswersAttempts->find('All')
              ->where(['exercise_attempt_id' => $_POST['AttemptID']]);

          $ShortAnswersAttemptsTable = TableRegistry::get('ShortAnswersAttempts');

          //Total additional marks
          $addScore = 0;

          foreach ($currentlyMarking as $current) {
              //Go through each short answer attempt and mark it
              $update = $ShortAnswersAttemptsTable->get($current->id);
              $tempScore = $_POST['score_'.h($current->id)];

              if($tempScore == null || $tempScore == ""){
                  $update->score = 0;
              } else {
                  $update->score = $tempScore;
                  $addScore += $tempScore;
              }

              $ShortAnswersAttemptsTable->save($update);
          }
        }

        //Get the current attempt and update the score
        $theAttempts = $this->ExerciseAttempts->find('All')
          ->where(['id' => $_POST['AttemptID']]);

        //Update score here
        $oldScore;
        $e_id;
        foreach($theAttempts as $attempt){
          $oldScore = $attempt->score;
          $e_id = $attempt->exercise_id;
        }

        $connection->update('exercise_attempts', ['score' => ($addScore + $oldScore)],['id' => $_POST['AttemptID']]);

        //Save exercise notes too
        $this->loadModel('Exercise_notes');

        $updatedNotes = $this->Exercise_notes->find('All')->limit(1)
            ->where(['user_id'=>$user_id, 'exercise_id'=>$e_id]);

        if($updatedNotes->count() != 0 ){
          $updatedNotes->note = $_POST["my-notes"];
          foreach ($updatedNotes as $updatedNote){
            $connection->update('exercise_notes', ['note' => $_POST['my-notes']],['id' => $updatedNote->id]);
          }
        } else{
            $connection->insert('exercise_notes', [
                'user_id' => $user_id,
                'exercise_id' => $e_id,
                'note' => $_POST['my-notes']
            ]);
        }

        //Gotta send them back to the sections page
        return $this->redirect(['controller'=>'student', 'action' => 'dashboard']);
    }

    /**
     * A method to show the results of an exercise
     *
     * @param int|null $id is the id of the attempt you want to show
     */
    public function show($id = null){

        $this->loadModel('Exercises');

        $attempts = $this->ExerciseAttempts->find('All')->limit(1)
            ->where(['id'=>$id])
            ->contain(['multipleChoiceAttempts','multipleAnswersAttempts','shortAnswersAttempts']);


        $this->set('attemptId', $id);

        //Passes the attempts for the selected attempt
        $this->set('attempts', $attempts);

        $e_id = 0;
        foreach($attempts as $attempt){
            $e_id = $attempt->exercise_id;
        }

        $exercises = $this->Exercises->find('All')->limit(1)
            ->where(['id'=>$e_id])
            ->contain(['questions'=>['typeOfQuestions','multipleChoices', 'shortAnswers', 'multipleAnswers']]);

        //The exercises to be shown on the page
        $this->set('exercises',$exercises);

        $this->loadModel("Exercise_notes");

        $session = $this->getRequest()->getSession();
        $user_id = $session->read('Auth.User.id');

        //Get the exercise note of the user
        $currentNote = $this->Exercise_notes->find("All")->limit(1)
            ->where(['user_id' => $user_id, 'exercise_id' => $e_id]);

        if($currentNote->count() == 0){
            $this->set('exerciseNotes', "");
        } else{
          foreach($currentNote as $aNote)
            $this->set('exerciseNotes', $aNote->note);
        }

        //Gets all the techniques
        $this->loadModel("Techniques");
        $techniques = $this->Techniques->find('All');

        $counter = 1;
        foreach($techniques as $technique){
            $this->set('tech'.h($counter), $technique->technique);
            $counter = $counter + 1;
        }

        //Gets the cultural notes
        $this->loadModel("Cultural_notes");


        foreach ($exercises as $exercise){
            $culturalNotes = $this->Cultural_notes->find('All')->limit(1);
            $this->set('culturalNotes', $culturalNotes);
        }
    }

    /**
     * A way to view the past attempts (without being able to rescore!)
     *
     * @param int|null $id is the id of the attempt you want to show
     */
    public function pastAttempt($id = null){

        $this->loadModel('Exercises');

        $attempts = $this->ExerciseAttempts->find('All')->limit(1)
            ->where(['id'=>$id])
            ->contain(['multipleChoiceAttempts','multipleAnswersAttempts','shortAnswersAttempts']);

        $this->set('attemptId', $id);

        //Passes the attempts for the selected attempt
        $this->set('attempts', $attempts);

        $e_id = 0;
        foreach($attempts as $attempt){
            $e_id = $attempt->exercise_id;
        }

        $exercises = $this->Exercises->find('All')->limit(1)
            ->where(['id'=>$e_id])
            ->contain(['questions'=>['typeOfQuestions','multipleChoices', 'shortAnswers', 'multipleAnswers']]);

        //The exercises to be shown on the page
        $this->set('exercises',$exercises);

        $this->loadModel("Exercise_notes");

        $session = $this->getRequest()->getSession();
        $user_id = $session->read('Auth.User.id');

        //Get the exercise note of the user
        $currentNote = $this->Exercise_notes->find("All")->limit(1)
            ->where(['user_id' => $user_id, 'exercise_id' => $e_id]);

        if($currentNote->count() == 0){
            $this->set('exerciseNotes', "");
        } else{
          foreach($currentNote as $aNote)
            $this->set('exerciseNotes', $aNote->note);
        }

        //Gets all the techniques
        $this->loadModel("Techniques");
        $techniques = $this->Techniques->find('All');

        $counter = 1;
        foreach($techniques as $technique){
            $this->set('tech'.h($counter), $technique->technique);
            $counter = $counter + 1;
        }

        //Gets the cultural notes
        $this->loadModel("Cultural_notes");


        foreach ($exercises as $exercise){
            $culturalNotes = $this->Cultural_notes->find('All')->limit(1);
            $this->set('culturalNotes', $culturalNotes);
        }
    }

    /**
     * Gets all previous attempts made by the user
     *
     */
    public function allAttempts(){
      //gets session ID
      $session = $this->getRequest()->getSession();
      $user_id = $session->read('Auth.User.id');

      $allAttempts = $this->ExerciseAttempts->find('All')
        ->where(['user_id' => $user_id])
        ->contain(['exercises']);

      $this->set("all_attempts", $allAttempts);

      //To get data of all sections
      $this->loadModel('Sections');
      $sections = $this->Sections->find('all');

      //The name of the sections
      $counter = 1;
      foreach ($sections as $section){
        $this->set('section'.h($counter), $section->section);
        $counter++;
      }

      //Need data of all units
      $this->loadModel('Units');
      $units = $this->Units->find('all')
          ->contain(['Sections', 'Exercises']);
      $this->set('units', $units);
    }

}
