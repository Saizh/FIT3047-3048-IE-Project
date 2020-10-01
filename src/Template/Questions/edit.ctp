<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Question') ?></legend>
        <?php
            $countMC = count($question["multiple_choices"]);
            $countMA = count($question["multiple_answers"]);
            $countSA = count($question["short_answers"]);
            echo $this->Form->control('exercise_id', ['class' => 'form-control','options' => $exercises]);?>
            <div style="display: none;">
        <?php echo $this->Form->control('type_of_question_id', ['class' => 'form-control','options' => $typeOfQuestions]); ?>
            </div>
        <?php
            echo $this->Form->control('question',['class' => 'form-control']);
            echo $this->Form->control('feedback',['class'=> 'form-control']);
            if($countMA != 0){
                $count = 0;
                for ($count; $count <$countMA; $count++){
                    $name = "multiple_answers.$count.answer";
                    $name2 = "multiple_answers.$count.correct";
                    $name3 = "multiple_answers.$count.id";
                    $count2 = $count + 1;
                    echo $this->Form->control($name3);
                    echo $this->Form->control($name,['class' => 'form-control','label' => 'Answer '.$count2]);
                    echo $this->Form->control($name2);
                }
            }?>
            <div id="radiocb" onclick="cbclick(event)"><?php
            if($countMC != 0){
                $count = 0;
                for ($count; $count <$countMC; $count++){
                    $name = "multiple_choices.$count.answer";
                    $name2 = "multiple_choices.$count.id";
                    $name3 = "multiple_choices.$count.correct";
                    $count2 = $count + 1;
                    echo $this->Form->control($name2);
                    echo $this->Form->control($name,['class' => 'form-control','label' => 'Answer '.$count2]);
                    echo $this->Form->control($name3);
                }
            }?>
            </div><?php
             if($countSA != 0){
                 $count = 0;
                 for ($count; $count <$countSA; $count++){
                     $name = "short_answers.$count.possible_answer";
                     $name2 = "short_answers.$count.id";
                     echo $this->Form->control($name2);
                     echo $this->Form->control($name,['class' => 'form-control']);
                 }

            }?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class = top>
    <?php
    if($countMC != 0){
        $count = 0;
        for ($count; $count <$countMC; $count++){
            $count2 = $count +1;
            echo $this->Form->postLink("Delete Answer $count2",
                ['controller' => 'MultipleChoices','action' => 'delete', $question["multiple_choices"][$count]["id"]],
                ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete {0}?', $question["multiple_choices"][$count]["answer"])]
            );
        }
    }

    elseif($countMA != 0){
        $count = 0;
        for ($count; $count <$countMA; $count++){
            $count2 = $count +1;
            echo $this->Form->postLink("Delete Answer $count2",
                ['controller' => 'MultipleAnswers','action' => 'delete', $question["multiple_answers"][$count]["id"]],
                ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete {0}?', $question["multiple_answers"][$count]["answer"])]
            );
        }
    }

    elseif($countSA != 0) {
        $count = 0;
        for ($count; $count < $countSA; $count++) {
            $count2 = $count + 1;
            echo $this->Form->postLink("Delete Answer $count2",
                ['controller' => 'ShortAnswers', 'action' => 'delete', $question["short_answers"][$count]["id"]],
                ['class' => 'btn btn-danger ml-auto', 'confirm' => __('Are you sure you want to delete {0}?', $question["short_answers"][$count]["possible_answer"])]
            );
        }
    }

    ?>


    <?= $this->Form->postLink(
        __('Delete Question'),
        ['action' => 'delete', $question->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
    )?>
    <?= $this->Html->link(__('List Questions'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>
<script type="text/javascript">
    function cbclick(e){
        e = e || event;
        var cb = e.srcElement || e.target;
        if (cb.type !== 'checkbox') {return true;}
        var cbxs = document.getElementById('radiocb').getElementsByTagName('input'), i=cbxs.length;
        while(i--) {
            if (cbxs[i].type && cbxs[i].type == 'checkbox' && cbxs[i].id !== cb.id) {
                cbxs[i].checked = false;
            }
        }
    }
    $(document).ready(function () {
        $('#checkBtn').click(function() {
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("You must make at least one answer correct");
                return false;
            }

        });
        $('#checkBtn2').click(function() {
            checked = $("input[type=checkbox]:checked").length;

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

    })
</script>
