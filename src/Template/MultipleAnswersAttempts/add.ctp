<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswersAttempt $multipleAnswersAttempt
 */
?>
<div class="multipleAnswersAttempts form large-9 medium-8 columns content">
    <?= $this->Form->create($multipleAnswersAttempt) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Multiple Answers Attempt') ?></legend>
        <?php
            echo $this->Form->control('exercise_attempt_id', ['class' => 'form-control','options' => $exerciseAttempts]);
            echo $this->Form->control('multiple_answer_id', ['class' => 'form-control','options' => $multipleAnswers]);
            echo $this->Form->control('score', ['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class = top>
    <?= $this->Html->link(__('List Multiple Answer Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>