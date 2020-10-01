<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleChoiceAttempt $multipleChoiceAttempt
 */
?>
<div class="multipleChoiceAttempts form large-9 medium-8 columns content">
    <?= $this->Form->create($multipleChoiceAttempt) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Multiple Choice Attempt') ?></legend>
        <?php
            echo $this->Form->control('exercise_attempt_id', ['class' => 'form-control','options' => $exerciseAttempts]);
            echo $this->Form->control('multiple_choice_id', ['class' => 'form-control','options' => $multipleChoices]);
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
        ['action' => 'delete', $multipleChoiceAttempt->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceAttempt->id)]
    )?>
    <?= $this->Html->link(__('List Multiple Choice Attempts'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>
