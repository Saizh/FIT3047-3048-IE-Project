  <html>
    <head>
      <?= $this->Html->css('ecoutezbienstyles') ?>

        <title>Feedback Page</title>
    </head>
  <body>


    <div class='center'>

         <div class='left-col'>
           <div class="back-button">
             <?php echo $this->Html->image('back-arrow.png', ['alt' => 'Back']); ?>
             <?php echo "<a ".$this->Html->link("Back to Dashboard", ['controller' => "Student", 'action' => 'dashboard'])."</a>"; ?>
           </div>

             <ul class="welcome-nav"></ul>
         </div>

         <!-- This form is for updating the scores of each short answered questions (if there are any) -->
         <?= $this->Form->create(null,[
           'url' => ['controller' => 'ExerciseAttempts',
           'action' => 'submitMarks/']]); ?>

           <div id="popout" class="popouts" style="right: -618px;transition: 0.3s">
                <ul class="buttons">
                    <li><button type="button" onclick="toggleMenu(1)" class="t1"><?=$this->Html->image('t1-icon.png', ['alt' => 't1'])?></button></li>
                    <li><button type="button" onclick="toggleMenu(2)" class="t2"><?=$this->Html->image('t2-icon.png', ['alt' => 't2'])?></button></li>
                    <li><button type="button" onclick="toggleMenu(3)" class="t3"><?=$this->Html->image('t3-icon.png', ['alt' => 't3'])?></button></li>
                    <li><button type="button" onclick="toggleMenu(4)" class="notes"><?=$this->Html->image('mynotes-icon.png', ['alt' => 'mynotes'])?></button></li>
                    <li><button type="button" onclick="toggleMenu(5)" class="script"><?=$this->Html->image('script-icon.png', ['alt' => 'script'])?></button></li>
                    <li><button type="button" onclick="toggleMenu(6)" class="cultural">  <?=$this->Html->image('cultural-icon.png', ['alt' => 'cultural'])?>> </button></li>
                </ul>

                <div class = "panel" id = "t1-panel" style="z-index:-1; display: none;">
                  <h3>Technique 1</h3>
                  <div class = "scrollpane">
                    <p><?= nl2br(h($tech1)); ?></p>
                  </div>
                </div>

                <div class = "panel" id = "t2-panel" style="z-index:-1; display: none;">
                  <h3>Technique 2</h3>
                  <div class = "scrollpane">
                    <p> <?= nl2br(h($tech2)); ?></p>
                  </div>
                </div>

                <div class = "panel" id = "t3-panel" style="z-index:-1; display: none;">
                  <h3>Technique 3</h3>
                  <div class = "scrollpane">
                    <p><?= nl2br(h($tech3)); ?></p>
                  </div>
                </div>

                <div class = "panel" id = "notes-panel" style="z-index:-1; display: none;">
                  <h3>My Notes</h3>
                  <textarea name="my-notes" id="my-notes"><?= nl2br(h($exerciseNotes)) ?></textarea>
                </div>

                <div class = "panel" id = "transcript-panel" style="z-index:-1; display: none;">
                  <h3>Transcript</h3>
                  <a class="french" href = "#" style = "opacity: 0.8;"> View French </a>
                  -
                  <a class="english" href="#" style="opacity: 0.8;">View English </a>
                  -
                  <a class="both selected" href="#" style="opacity:0.8;">View Both </a>

                  <div class = "scrollpane">
                    <div class="english-pane" style="display:block;" >
                      <p><?php if($exercise->transcript_eng == null){
                        echo " "; } else {
                          echo nl2br(h($exercise->transcript_eng));
                        }
                        ?></p>
                    </div>
                    <div class="french-pane" style="display:none;">
                      <p><?php if($exercise->transcript_fr == null){
                        echo " "; } else {
                          echo nl2br(h($exercise->transcript_fr));
                        }
                        ?></p>
                    </div>
                  </div>
                </div>

                <div class = "panel", id = "cultural-notes-panel" style="z-index:-1; display: none;">
                  <h3>Cultural Notes</h3>
                  <div class = "scrollpane">
                    <p><?php foreach ($culturalNotes as $culturalNote){echo nl2br(h($culturalNote->note));} ?></p>
                  </div>
                </div>
           </div>

        <input name="AttemptID" value='<?= h($attemptId); ?>' style='display: none'>

        <?php foreach($exercises as $exercise): ?>

          <?= $this->Html->media(h($exercise->exerciseAudioPath), ['controls','controlsList="nodownload"']) ?>

            <div class='right-col'>

            <div id="questionBlock">

            <h2><?= h($exercise->name) ?></h2>

            <p>Ecoutez le texte deux fois en laissant une courte pause entre (30 secondes).
            <br/>Choisissez la meilleure réponse pour chaque question.
            <br/>Lisez les questions pendant que le texte est chargé.
            </p><p>Listen to the text twice, leaving a short break between each playing (30 seconds).
            <br/>Choose the best answer for each question.<br/>Read the questions while the text is loading.
            </p><p></p>

            <!-- Question Numbers -->
            <?php $questionNo = 1; ?>
            <?php foreach($exercise->questions as $question): ?>

                <?php if($question->type_of_question_id == 1): ?>

                  <!-- if it is a multiple choice question -->
                  <div class='question-wrapper'>

                      <div class='questions'> <b><?= $questionNo++.". ".h($question->question)?> </b> </div>

                      <p><b>Your answer was: </b></p>

                        <?php foreach($question->multiple_choices as $multiple_choice): ?>
                          <?php foreach($attempts as $attempt):?>
                            <?php foreach($attempt->multiple_choice_attempts as $multiple_choice_attempt): ?>
                              <?php if ($multiple_choice->id == $multiple_choice_attempt->multiple_choice_id): ?>
                                <?php if ($multiple_choice->correct == true): ?>
                                  <!-- If it is a correct answer -->
                                  <p style="color: #32CD32"><?= h($multiple_choice->answer) ?></p>
                                <?php else: ?>
                                  <!-- If it is a wrong answer -->
                                  <p style="color: #FF0000"><?= h($multiple_choice->answer) ?></p>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endforeach; ?>
                        <?php endforeach; ?>

                      <div class='marks'><span class='mark'><?= h($question->max_score)?> <?php if($question->max_score == 1){ echo " mark"; } else { echo " marks"; } ?></span></div>
                      <p><i> <?= h($question->feedback) ?></i></p>

                  </div>
                <?php endif; ?>

                <?php if($question->type_of_question_id == 3): ?>
                  <!-- If it is a short answer question -->

                  <div class='question-wrapper'>

                    <div class='questions'><b><?= $questionNo++.". ".h($question->question) ?> </b></div>
                    <?php $currentID = 0; ?>
                    <p><b>Your answer was:</b></p>
                    <?php foreach ($attempts as $attempt): ?>
                      <?php foreach ($attempt->short_answers_attempts as $short_answer_attempt): ?>
                        <?php if($short_answer_attempt->question_id == $question->id): ?>
                          <p style="color: #FF8C00"> <?= h($short_answer_attempt->attempted_answer) ?> </p>
                          <?php $currentID = $short_answer_attempt->id; ?>
                        <?php endif?>
                      <?php endforeach; ?>
                      <p><b>Possible answers: </b></p>
                      <?php foreach ($question->short_answers as $short_answer): ?>
                        <p> <?= h($short_answer->possible_answer) ?> </p>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                    <div class='marks'><span class='mark'><b>Score:</b> Please enter your score <select name='score_<?= h($currentID)?>'>
                      <?php for($x = 0; $x <= $question->max_score; $x++){
                        echo '<option value="'.h($x).'">'.h($x).'</option>';
                      }; ?>
                    </select></span></div>
                    <div class='marks'><span class='mark'><?= h($question->max_score)?> <?php if($question->max_score == 1){ echo " mark"; } else { echo " marks"; } ?></span></div>
                    <p><i> <?= h($question->feedback) ?></i></p>

                  </div>

                <?php endif; ?>

                <?php if($question->type_of_question_id == 4): ?>
                  <!-- If it is a multiple answer question -->

                  <div class='question-wrapper'>

                    <div class='questions'><b><?= $questionNo++.". ".h($question->question) ?> </b></div>

                    <p><b>Your answer was:</b></p>

                    <?php foreach($question->multiple_answers as $multiple_answer): ?>
                      <?php foreach($attempts as $attempt): ?>
                        <?php foreach($attempt->multiple_answers_attempts as $multiple_answers_attempt): ?>
                          <?php if($multiple_answer->id == $multiple_answers_attempt->multiple_answer_id): ?>
                            <?php if($multiple_answer->correct == true): ?>
                              <p style="color: #32CD32"><?= h($multiple_answer->answer) ?></p>
                            <?php else: ?>
                              <p style="color: #FF0000"><?= h($multiple_answer->answer) ?></p>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                    <div class='marks'><span class='mark'><?= h($question->max_score)?> <?php if($question->max_score == 1){ echo " mark"; } else { echo " marks"; } ?></span></div>
                    <p><i> <?= h($question->feedback) ?></i></p>
                  </div>

                <?php endif;  ?>
            <?php endforeach; ?>
            <p></p>

            <button type="submit"><?=$this->Html->image('submit-scores.png', ['alt' => 'submit'])?>

            </button>
          </div>
          </div>
        <?php endforeach; ?>
    </div>

    <?= $this->Form->end(); ?>

    <?= $this->Html->script('exercise-panel') ?>
    <?= $this->Html->script('exercise-notes') ?>
  </body>
  </html>
