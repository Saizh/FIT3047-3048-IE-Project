<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortAnswersAttempt $shortAnswersAttempt
 */
?>
<div class="shortAnswersAttempts form large-9 medium-8 columns content">
    <?= $this->Form->create($shortAnswersAttempt) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Short Answers Attempt') ?></legend>
        <?php
            echo $this->Form->control('exercise_attempt_id', ['class' => 'form-control','options' => $exerciseAttempts]);
            echo $this->Form->control('question_id', ['class' => 'form-control','options' => $questions]);
            echo $this->Form->control('attempted_answer', ['class' => 'form-control']);
            echo $this->Form->control('score', ['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class = top>
    <?= $this->Html->link(__('List Short Answer Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>