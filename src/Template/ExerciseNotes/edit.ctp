<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseNote $exerciseNote
 */
?>
<div class="exerciseNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($exerciseNote) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Exercise Note') ?></legend>
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
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $exerciseNote->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $exerciseNote->id)]
    )
    ?>
    <?= $this->Html->link(__('List Exercise Notes'),
        ['controller' => 'ExerciseNotes', 'action' => 'index'],
        ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Add Exercise Notes'),
        ['controller' => 'ExerciseNotes', 'action' => 'add'],
        ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises',
        'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>