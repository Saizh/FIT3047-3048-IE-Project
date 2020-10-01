<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseAttempt $exerciseAttempt
 */
?>
<div class="exerciseAttempts form large-9 medium-8 columns content">
    <?= $this->Form->create($exerciseAttempt) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Exercise Attempt') ?></legend>
        <?php
            echo $this->Form->control('attempt_date',['class' => 'form-control']);
            echo $this->Form->control('user_id', ['class' => 'form-control','options' => $users]);
            echo $this->Form->control('exercise_id', ['class' => 'form-control','options' => $exercises]);
            echo $this->Form->control('score',['class' => 'form-control']);
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
        ['action' => 'delete', $exerciseAttempt->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $exerciseAttempt->id)]
    )?>
    <?= $this->Html->link(__('List Exercise Attempts'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>