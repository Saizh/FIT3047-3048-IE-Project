<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="float: none">
    <li class="nav-item">
        <a class="nav-link active" id="pills-shorta-tab" data-toggle="pill" href="#pills-shorta" role="tab" aria-controls="pills-shorta" aria-selected="true">Add Short Answer Question</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-mula-tab" data-toggle="pill" href="#pills-mula" role="tab" aria-controls="pills-mula" aria-selected="false">Add Multiple Answer Question</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-mulc-tab" data-toggle="pill" href="#pills-mulc" role="tab" aria-controls="pills-mulc" aria-selected="false">Add Multiple Choice Question</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane show active" id="pills-shorta" role="tabpanel" aria-labelledby="pills-shorta-tab">
        <div class="questions form large-9 medium-8 columns content">
            <?= $this->Form->create($question) ?>
            <fieldset>
                <legend><?= __('Add Short Answer Question') ?></legend>
                <?php
                echo $this->Form->control('exercise_id', ['options' => $exercises, 'class'=> 'form-control']);
                echo $this->Form->hidden('type_of_question_id', ['value' => '3']);
                echo $this->Form->control('question',['class'=> 'form-control']);
                echo $this->Form->control('possible_answer',['class'=> 'form-control','maxlength' => '255']);
                echo $this->Form->control('max_score',['class'=> 'form-control', 'min' => '1', 'max' => '20']);
                echo $this->Form->control('feedback',['class'=> 'form-control']);
                ?>
            </fieldset>
            <div class = top2>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top', 'id'=>'checkBtn3']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="tab-pane" id="pills-mula" role="tabpanel" aria-labelledby="pills-mula-tab">
        <div class="questions form large-9 medium-8 columns content">
            <?= $this->Form->create($question) ?>
            <fieldset>
                <legend><?= __('Add Multiple Answer Question') ?></legend>
                <?php
                echo $this->Form->control('exercise_id', ['options' => $exercises, 'class'=> 'form-control']);
                echo $this->Form->hidden('type_of_question_id', ['value' => '4']);
                echo $this->Form->control('question',['class'=> 'form-control']);
                echo $this->Form->control('answer 1',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 1" value="0"/>
                    <label for="correct 1"><input type="checkbox" name="correct 1" value="1"  style="float: none" id="correct 1">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 2',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 2" value="0"/>
                    <label for="correct 2"><input type="checkbox" name="correct 2" value="1" style="float: none" id="correct 2">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 3',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 3" value="0"/>
                    <label for="correct 3"><input type="checkbox" name="correct 3" value="1" style="float: none" id="correct 3">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 4',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 4" value="0"/>
                    <label for="correct 4"><input type="checkbox" name="correct 4" value="1" style="float: none" id="correct 4">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 5',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 5" value="0"/>
                    <label for="correct 5"><input type="checkbox" name="correct 5" value="1" style="float: none" id="correct 5">
                        Correct
                    </label>
                </div>
                <?php
                echo $this->Form->control('max_score',['class'=> 'form-control', 'min' => '1', 'max' => '20']);
                echo $this->Form->control('feedback',['class'=> 'form-control']);
                ?>
            </fieldset>
            <div class = top2>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top', 'id'=>'checkBtn']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="tab-pane" id="pills-mulc" role="tabpanel" aria-labelledby="pills-mulc-tab">
        <div class="questions form large-9 medium-8 columns content">
            <?= $this->Form->create($question) ?>
            <fieldset>
                <legend><?= __('Add Multiple Choice Question') ?></legend>
                <?php
                echo $this->Form->control('exercise_id', ['options' => $exercises, 'class'=> 'form-control']);
                echo $this->Form->hidden('type_of_question_id', ['value' => '1']);
                echo $this->Form->control('question',['class'=> 'form-control']);
                echo $this->Form->control('answer 1',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 1" value="0"/>
                    <label for="correct 1"><input type="radio" name="correct" value="correct 1" id="correct 1">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 2',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 2" value="0"/>
                    <label for="correct 2"><input type="radio" name="correct" value="correct 2" id="correct 2">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 3',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 3" value="0"/>
                    <label for="correct 3"><input type="radio" name="correct" value="correct 3" id="correct 3">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 4',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 4" value="0"/>
                    <label for="correct 4"><input type="radio" name="correct" value="correct 4" id="correct 4">
                        Correct
                    </label>
                </div>
                <?php echo $this->Form->control('answer 5',['class'=> 'form-control','maxlength' => '255']);?>
                <div class= "input checkbox form-control">
                    <input type="hidden" name="correct 5" value="0"/>
                    <label for="correct 5"><input type="radio" name="correct" value="correct 5" id="correct 5">
                        Correct
                    </label>
                </div>
                <?php
                echo $this->Form->control('max_score',['class'=> 'form-control', 'min' => '1', 'max' => '20']);
                echo $this->Form->control('feedback',['class'=> 'form-control']);
                ?>
            </fieldset>
            <div class = top2>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top', 'id'=>'checkBtn2']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must make at least one answer correct");
                return false;
            }

        });
        $('#checkBtn2').click(function() {
            checked = $("input[type=radio]:checked").length;

            if(!checked) {
                alert("You must make at least one answer correct");
                return false;
            }

        });
        $('#checkBtn3').click(function() {
            if ($.trim($('#possible-answer').val()).length==0){
                alert("You must make at least one possible answer");
                return false;
            }

        });

    });

</script>
<div class="top">
    <?= $this->Html->link(__('List Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Multiple Choices'), ['controller' => 'MultipleChoices', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Multiple Answers'), ['controller' => 'MultipleAnswers', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Short Answers'), ['controller' => 'ShortAnswers', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>
