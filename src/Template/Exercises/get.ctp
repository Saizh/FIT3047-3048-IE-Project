<html>
  <head>
    <?= $this->Html->css('ecoutezbienstyles') ?>

    <title>Exercise Page</title>
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

        <?php foreach($exercises as $exercise): ?>

            <div class='right-col'>

            <div id="questionBlock">

            <h2><?= h($exercise->name) ?></h2>

             <p>Ecoutez le texte deux fois en laissant une courte pause entre (30 secondes).
             <br/>Choisissez la meilleure réponse pour chaque question.
             <br/>Lisez les questions pendant que le texte est chargé.
             </p><p>Listen to the text twice, leaving a short break between each playing (30 seconds).
             <br/>Choose the best answer for each question.<br/>Read the questions while the text is loading.
             </p><p></p>
             <?= $this->Html->media(h($exercise->exerciseAudioPath), ['controls','controlsList="nodownload"','id'=>'audioplayer']) ?>


            <?= $this->Form->create(null,[
              'url' => ['controller' => 'ExerciseAttempts',
              'action' => 'attempt/'.h($exercise->id)]]); ?>

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
                     <a id="frLabel" class="french selected" href = "#" onclick="toFrench(); return false;" style = "opacity: 0.8;"> French </a>
                     -
                     <a id="engLabel" class="english" href="#" onclick="toEnglish(); return false;" style="opacity: 0.8;"> English </a>
                     -
                     <a id="bothLabel" class="both" href="#" onclick="toBoth(); return false;" style="opacity:0.8;">View Both </a>

                     <div class = "scrollpane">
                       <div id="english-pane" class="english-pane" style="display:none;" >
                         <p><?= nl2br(h($exercise->transcript_eng));?></p>
                       </div>
                       <div id="french-pane" class="french-pane" style="display:block;">
                         <p><?= nl2br(h($exercise->transcript_fr)); ?></p>
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

              <!-- This will be used to give each question a question number -->
              <?php $x = 1; ?>

              <?php foreach($exercise->questions as $question): ?>

                  <?php if($question->type_of_question_id == 1): ?>

                    <!-- if it is a multiple choice question -->

                    <div class='question-wrapper'>

                        <div class='questions'> <b><?= $x.". ".h($question->question)?> </b> </div>
                        <fieldset class="fieldset">
                          <?php foreach($question->multiple_choices as $multiple_choice): ?>


                              <label for="multiple_choice_<?= h($question->id)?>">
                                <input type="radio" name="multiple_choice_<?= h($question->id)?>" value = "<?= h($multiple_choice->id)?>" />
                                <?= h($multiple_choice->answer) ?>
                              </label>

                          <?php endforeach; ?>
                        </fieldset>

                     <div class='marks'><span class='mark'><?= h($question->max_score)?> <?php if($question->max_score == 1){ echo " mark"; } else { echo " marks"; } ?> </span></div>
                    </div>
                  <?php endif; ?>

                  <?php if($question->type_of_question_id == 3): ?>
                    <!-- If it is a short answer question -->

                    <div class = "question-wrapper">

                      <div class='questions'>
                        <p><b><?= $x.". ".h($question->question) ?> </b></p></div>
                      <label>
                        <textarea style="resize: none" class='shortAnswerTextbox' cols='50' rows='3' maxlength="1000" type="text" name ='short_answer_<?= h($question->id)?>'></textarea>
                      </label>
                        <div class='marks'><span class='mark'><?= h($question->max_score)?> <?php if($question->max_score == 1){ echo " mark"; } else { echo " marks"; } ?></span></div>
                    </div>

                  <?php endif; ?>

                  <?php if($question->type_of_question_id == 4): ?>
                    <!-- If it is a multiple answer question -->

                    <div class = "question-wrapper">

                      <div class='questions'><p><b><?= $x.". ".h($question->question) ?> </b></p></div>
                        <fieldset class="fieldset">
                          <?php foreach($question->multiple_answers as $multiple_answer): ?>
                            <div>

                              <label for="multiple_answer_<?= h($question->id)?>[]">
                              <input type="checkbox" name="multiple_answer_<?= h($question->id)?>[]" value="<?= h($multiple_answer->id)?>" />
                              <?= h($multiple_answer->answer) ?>
                              </label>

                            </div>

                          <?php endforeach; ?>
                        </fieldset>
                      <div class='marks'><span class='mark'><?= h($question->max_score)?> <?php if($question->max_score == 1){ echo " mark"; } else { echo " marks"; } ?></span></div>

                    </div>

                  <?php endif;
                  $x++;
                  ?>

              <?php endforeach; ?>

              <p></p>


              <button type="submit" onclick="return submitForm()"><?=$this->Html->image('submit-answers.png', ['alt' => 'submit'])?>

              </button>

              <?= $this->Form->end(); ?>

            </form>

           </div>

           </div>
          <?php endforeach; ?>

        </div>

        <?= $this->Html->script('exercise-panel') ?>
        <?= $this->Html->script('submission') ?>

  </body>

 </html>
<script>
    $(document).ready(function(){
        $('#audioplayer').bind('contextmenu',function() { return false; });
    });
</script>