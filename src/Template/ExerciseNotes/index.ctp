<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseNote[]|\Cake\Collection\CollectionInterface $exerciseNotes
 */
?>
<div class="exerciseNotes index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Exercise Notes') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exercise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exerciseNotes as $exerciseNote): ?>
            <tr>
                <td><?= $exerciseNote->has('user') ? $this->Html->link($exerciseNote->user->email, ['controller' => 'Users', 'action' => 'view', $exerciseNote->user->id]) : '' ?></td>
                <td><?= $exerciseNote->has('exercise') ? $this->Html->link($exerciseNote->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $exerciseNote->exercise->id]) : '' ?></td>
                <td><?= h($exerciseNote->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exerciseNote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exerciseNote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exerciseNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseNote->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Exercise Note'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
</div>
