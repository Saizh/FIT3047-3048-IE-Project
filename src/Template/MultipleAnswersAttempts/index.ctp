<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswersAttempt[]|\Cake\Collection\CollectionInterface $multipleAnswersAttempts
 */
?>
<div class="multipleAnswersAttempts index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Multiple Answers Attempts') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('exercise_attempt_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multiple_answer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($multipleAnswersAttempts as $multipleAnswersAttempt): ?>
            <tr>
                <td><?= $multipleAnswersAttempt->has('exercise_attempt') ? $this->Html->link($multipleAnswersAttempt->exercise_attempt->id, ['controller' => 'ExerciseAttempts', 'action' => 'view', $multipleAnswersAttempt->exercise_attempt->id]) : '' ?></td>
                <td><?= $multipleAnswersAttempt->has('multiple_answer') ? $this->Html->link($multipleAnswersAttempt->multiple_answer->answer, ['controller' => 'MultipleAnswers', 'action' => 'view', $multipleAnswersAttempt->multiple_answer->id]) : '' ?></td>
                <td><?= $this->Number->format($multipleAnswersAttempt->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $multipleAnswersAttempt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $multipleAnswersAttempt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $multipleAnswersAttempt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswersAttempt->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Multiple Answer Attempt'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercise Attempts'), ['controller' => 'ExerciseAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>