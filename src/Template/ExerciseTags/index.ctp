<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseTag[]|\Cake\Collection\CollectionInterface $exerciseTags
 */
?>
<div class="exerciseTags index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Exercise Tags') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('exercise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exerciseTags as $exerciseTag): ?>
            <tr>
                <td><?= $exerciseTag->has('exercise') ? $this->Html->link($exerciseTag->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $exerciseTag->exercise->id]) : '' ?></td>
                <td><?= $exerciseTag->has('tag') ? $this->Html->link($exerciseTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $exerciseTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exerciseTag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exerciseTag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exerciseTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseTag->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('Add Tag to Exercise'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>