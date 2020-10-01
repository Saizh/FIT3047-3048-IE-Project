<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Exercises Controller
 *
 * @property \App\Model\Table\ExercisesTable $Exercises
 *
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExercisesController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if (($user['subscription'])=='full') {
            $this->Auth->allow(['get']);
        }
        if (($user['role'])=='teacher'||'admin') {
            $this->Auth->allow(['choose']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $count = $this->Exercises->find()->count();

        $this->layout='/adminhome';
        $this->paginate = [
            'contain' => ['Units', 'CulturalNotes','ExerciseTags' => 'Tags'],
            'maxLimit' => $count,
            'limit' => $count
        ];
        $exercises = $this->paginate($this->Exercises);

        $this->set(compact('exercises'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->layout='/adminhome';
        $exercise = $this->Exercises->get($id, [
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

        $this->set('exercise', $exercise);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
     public function add()
     {

         $this->layout='/adminhome';
         $exercise = $this->Exercises->newEntity();
         $oldexerciseAudio = $this->Exercises->find()->select('exerciseAudioPath');
         $oldexerciseAudio = $oldexerciseAudio->extract('exerciseAudioPath')->toArray();
         $exerciseAudio = array();
         foreach($oldexerciseAudio as $value) {
             $exerciseAudio[$value] = $value;
         }
         if ($this->request->is('post')) {
             $data = $this->request->getData();
             if($data['Exercise_Audio'] == "" && $data['Exercise_Audio_Upload']['name'] !== ""){
                 $filedata = $data['Exercise_Audio_Upload'];
                 $filename = $data['Exercise_Audio_Upload']['name'];
                 $ext = pathinfo($filename,PATHINFO_EXTENSION);
                 if( $ext !== "mp3")
                 {
                     $this->Flash->error(__('Please upload MP3 files'));
                     return $this->redirect($this->referer());
                 }

                 else{
                    move_uploaded_file($filedata['tmp_name'], WWW_ROOT . 'files' . DS . $filename);
                 }
             }
             elseif($data['Exercise_Audio'] !== "" && $data['Exercise_Audio_Upload']['name'] == ""){
                  $filename = $data['Exercise_Audio'];
              }
              else{
                  $this->Flash->error(__('The exercise could not be saved, please select only one method of choosing an audio file'));
                  return $this->redirect(['action' => 'add']);
              }
             $exercise = $this->Exercises
                 ->patchEntity($exercise,
                     ['unit_id'=> $data['unit_id'],
                         'name'=> $data['name'],
                     'exerciseAudioPath' => $filename,
                     'cultural_note_id'=> $data['cultural_note_id'],
                   'transcript_eng'=> $data['English_Transcript'],
                   'transcript_fr'=> $data['French_Transcript']]);
             if ($this->Exercises->save($exercise)) {
                 $this->Flash->success(__('The exercise has been saved.'));

                 return $this->redirect(['action' => 'index']);
             }
             $this->Flash->error(__('The exercise could not be saved. Please, try again.'));


         }
         $units = $this->Exercises->Units->find('list', ['limit' => 200]);
         $culturalNotes = $this->Exercises->CulturalNotes->find('list', ['limit' => 200]);
         $this->set(compact('exercise', 'units', 'culturalNotes','exerciseAudio'));


     }


     /**
      * Edit method
      *
      * @param string|null $id Exercise id.
      * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
      * @throws \Cake\Network\Exception\NotFoundException When record not found.
      */
     public function edit($id = null)
     {
         $this->layout='/adminhome';
         $exercise = $this->Exercises->get($id, [
             'contain' => []
         ]);
         $oldexerciseAudio = $this->Exercises->find()->select('exerciseAudioPath');
         $oldexerciseAudio = $oldexerciseAudio->extract('exerciseAudioPath')->toArray();
         $exerciseAudio = array();
         foreach($oldexerciseAudio as $value) {
             $exerciseAudio[$value] = $value;
         }
         if ($this->request->is(['patch', 'post', 'put'])) {
             $data = $this->request->getData();
             if($data['Exercise_Audio'] == "" && $data['Exercise_Audio_Upload']['name'] !== "") {
                 $filedata = $data['Exercise_Audio_Upload'];
                 $filename = $data['Exercise_Audio_Upload']['name'];
                 $ext = pathinfo($filename,PATHINFO_EXTENSION);
                 if( $ext !== "mp3")
                 {
                     $this->Flash->error(__('Please upload MP3 files'));
                     return $this->redirect($this->referer());
                 }

                 else{
                     move_uploaded_file($filedata['tmp_name'], WWW_ROOT . 'files' . DS . $filename);
                 }
             }
             elseif($data['Exercise_Audio'] !== "" && $data['Exercise_Audio_Upload']['name'] == ""){
                 $filename = $data['Exercise_Audio'];
             }
             else{
                 $this->Flash->error(__('The exercise could not be saved, please select only one method of choosing an audo file'));
                 return $this->redirect($this->referer());
             }
             $exercise = $this->Exercises->patchEntity($exercise, ['unit_id'=> $data['unit_id'],'name'=> $data['name'],'exerciseAudioPath' => $filename,'cultural_note_id'=> $data['cultural_note_id']]);
             if ($this->Exercises->save($exercise)) {
                 $this->Flash->success(__('The exercise has been saved.'));

                 return $this->redirect(['action' => 'index']);
             }
             $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
         }
         $units = $this->Exercises->Units->find('list', ['limit' => 200]);
         $culturalNotes = $this->Exercises->CulturalNotes->find('list', ['limit' => 200]);
         $this->set(compact('exercise', 'units', 'culturalNotes','exerciseAudio'));
     }


    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->layout='/adminhome';
        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercises->get($id);
        if ($this->Exercises->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Get method
     *
     * @param string|null $id Exercise id.
     */
    public function get($id = null){
      $session = $this->getRequest()->getSession();
      $user_id = $session->read('Auth.User.id');
      $class_id =  $session->read('Auth.User.class_id');

      //Gets the exercise
      $exercises = $this->Exercises->find('All')->limit(1)
          ->where(['id'=>$id])
          ->contain(['questions'=>[
            //'sort' => ['questions.id' => 'ASC'],
            'typeOfQuestions','multipleChoices', 'shortAnswers', 'multipleAnswers']]);

      $unit_id = 0;
      foreach($exercises as $exercise){ $unit_id = $exercise->unit_id;}

      //Gets all the units belonging to the user
      $this->loadModel("UserUnits");
      $tickets = $this->UserUnits->find('All')
        ->where(["user_id" => $user_id])->where(["unit_id" => $unit_id]);

      //Gets user details so we can find their class:
      $this->loadModel("Users");
      $user = $this->Users->get($user_id);
      $class_id = $user->class_id;
      $user_role = $session->read('Auth.User.role');

      //Gets all the units belonging to the user's class
      $this->loadModel("ClassUnits");
      $class_tickets = $this->ClassUnits->find('All')
        ->where(["class_id" => $class_id])->where(["unit_id" => $unit_id]);;



      if(($user_role == 'student' || $user_role == 'unverified') && $tickets->count() == 0 && $class_tickets->count() == 0 ){
        return $this->redirect(['controller' => 'user_units', 'action' => 'confirm/'.h($id)]);
      }


      else {
        $this->set('exercises',$exercises);

          //Gets all the techniquesg
          $this->loadModel("Techniques");
          $techniques = $this->Techniques->find('All');

          $counter = 1;
          foreach($techniques as $technique){
              $this->set('tech'.h($counter), $technique->technique);
              $counter = $counter + 1;
          }

          //Gets the Current Notes for the user
          $this->loadModel("Exercise_notes");

          $session = $this->getRequest()->getSession();
          $user_id = $session->read('Auth.User.id');

          $currentNote = $this->Exercise_notes->find("All")->limit(1)
              ->where(['user_id' => $user_id, 'exercise_id' => $id]);

          if($currentNote->count() == 0){
              $this->set('exerciseNotes', "");
          } else{
              foreach($currentNote as $aNote)
                  $this->set('exerciseNotes', $aNote->note);
          }

          //Gets the cultural notes
          $this->loadModel("Cultural_notes");


          foreach ($exercises as $exercise){
              $culturalNotes = $this->Cultural_notes->find('All')->limit(1);
              $this->set('culturalNotes', $culturalNotes);
          }

      }
    }

    public function choose($id = null,$class_id =null ){
        $this->loadModel('Units');
        $this->loadModel('Class');
        $this->set(compact('units', 'class'));
        $session = $this->getRequest()->getSession();



        //Gets the exercise
//        $exercises = $this->Exercises->find('All')->limit(1)
//            ->where(['id'=>$id])
//            ->contain(['questions'=>[
//                //'sort' => ['questions.id' => 'ASC'],
//                'typeOfQuestions','multipleChoices', 'shortAnswers', 'multipleAnswers']]);

//        $unit_id = 0;
//        foreach($exercises as $exercise){ $unit_id = $exercise->unit_id;}
        $unit = $this->Units->get($id);
        $unit_id = $unit->id;
        $this->loadModel("ClassUnits");
        $tickets = $this->ClassUnits->find('All')
            ->where(["class_id" => $class_id])->where(["unit_id" => $unit_id]);


        if($tickets->count() == 0){
            return $this->redirect(['controller' => 'teacher', 'action' => 'confirm/'.h($id), h($class_id)]);
            // return $this->redirect(['controller' => 'student', 'action' => 'dashboard']);
        } else {

            $this->Flash->success(__('You have selected this unit already'));
        }
    }
}
