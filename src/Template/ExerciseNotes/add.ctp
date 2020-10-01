<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseNote $exerciseNote
 */
?>
<div class="exerciseNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($exerciseNote) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Exercise Note') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['class' => 'form-control','options' => $users, 'empty' => true]);
            echo $this->Form->control('exercise_id', ['class' => 'form-control','options' => $exercises]);
            echo $this->Form->control('note',['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
    <?= $this->Html->link(__('List Exercise Notes'), ['controller' => 'ExerciseNotes', 'action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises',
        'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>