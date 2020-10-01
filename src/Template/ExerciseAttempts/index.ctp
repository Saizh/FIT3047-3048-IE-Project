<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseAttempt[]|\Cake\Collection\CollectionInterface $exerciseAttempts
 */
?>
<div class="exerciseAttempts index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Exercise Attempts') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('attempt_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exercise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exerciseAttempts as $exerciseAttempt): ?>
            <tr>
                <td><?= h($exerciseAttempt->attempt_date) ?></td>
                <td><?= $exerciseAttempt->has('user') ? $this->Html->link($exerciseAttempt->user->email, ['controller' => 'Users', 'action' => 'view', $exerciseAttempt->user->id]) : '' ?></td>
                <td><?= $exerciseAttempt->has('exercise') ? $this->Html->link($exerciseAttempt->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $exerciseAttempt->exercise->id]) : '' ?></td>
                <td><?= $this->Number->format($exerciseAttempt->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exerciseAttempt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exerciseAttempt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exerciseAttempt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseAttempt->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Exercise Attempt'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Multiple Choice Attempts'), ['controller' => 'MultipleChoiceAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Multiple Answer Attempts'), ['controller' => 'MultipleAnswersAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Short Answer Attempts'), ['controller' => 'ShortAnswersAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>