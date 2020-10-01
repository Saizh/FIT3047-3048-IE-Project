<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleChoiceAttempt[]|\Cake\Collection\CollectionInterface $multipleChoiceAttempts
 */
?>
<div class="multipleChoiceAttempts index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Multiple Choice Attempts') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('exercise_attempt_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multiple_choice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($multipleChoiceAttempts as $multipleChoiceAttempt): ?>
            <tr>
                <td><?= $multipleChoiceAttempt->has('exercise_attempt') ? $this->Html->link($multipleChoiceAttempt->exercise_attempt->id, ['controller' => 'ExerciseAttempts', 'action' => 'view', $multipleChoiceAttempt->exercise_attempt->id]) : '' ?></td>
                <td><?= $multipleChoiceAttempt->has('multiple_choice') ? $this->Html->link($multipleChoiceAttempt->multiple_choice->answer, ['controller' => 'MultipleChoices', 'action' => 'view', $multipleChoiceAttempt->multiple_choice->id]) : '' ?></td>
                <td><?= $this->Number->format($multipleChoiceAttempt->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $multipleChoiceAttempt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $multipleChoiceAttempt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $multipleChoiceAttempt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceAttempt->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Multiple Choice Attempt'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercise Attempts'), ['controller' => 'ExerciseAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>