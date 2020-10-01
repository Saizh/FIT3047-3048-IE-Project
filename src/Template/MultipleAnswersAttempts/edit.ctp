<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswersAttempt $multipleAnswersAttempt
 */
?>
<div class="multipleAnswersAttempts form large-9 medium-8 columns content">
    <?= $this->Form->create($multipleAnswersAttempt) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Multiple Answers Attempt') ?></legend>
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
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $multipleAnswersAttempt->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswersAttempt->id)]
    )?>
    <?= $this->Html->link(__('List Multiple Answer Attempts'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>