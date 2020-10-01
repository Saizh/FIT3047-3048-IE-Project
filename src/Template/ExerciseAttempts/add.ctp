<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseAttempt $exerciseAttempt
 */
?>
<div class="exerciseAttempts form large-9 medium-8 columns content">
    <?= $this->Form->create($exerciseAttempt) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Exercise Attempt') ?></legend>
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
    <?= $this->Html->link(__('List Exercise Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
