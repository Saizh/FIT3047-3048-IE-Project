<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseTag $exerciseTag
 */
?>
<div class="exerciseTags form large-9 medium-8 columns content">
    <?= $this->Form->create($exerciseTag) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Exercise Tag') ?></legend>
        <?php
            echo $this->Form->control('exercise_id', ['class' => 'form-control','options' => $exercises]);
            echo $this->Form->control('tag_id', ['class' => 'form-control','options' => $tags]);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
    <?= $this->Html->link(__('List Exercise Tags'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>