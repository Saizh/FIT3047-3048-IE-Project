<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseTag $exerciseTag
 */
?>
<div class="exerciseTags view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Exercise') ?></th>
            <td><?= $exerciseTag->has('exercise') ? $this->Html->link($exerciseTag->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $exerciseTag->exercise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $exerciseTag->has('tag') ? $this->Html->link($exerciseTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $exerciseTag->tag->id]) : '' ?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $exerciseTag->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $exerciseTag->id)]
    )?>
</div>
<div class="top">
    <?= $this->Html->link(__('List Exercise Tags'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('Add Tag to Exercise'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>