<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortAnswersAttempt[]|\Cake\Collection\CollectionInterface $shortAnswersAttempts
 */
?>
<div class="shortAnswersAttempts index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Short Answers Attempts') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('exercise_attempt_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attempted_answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shortAnswersAttempts as $shortAnswersAttempt): ?>
            <tr>
                <td><?= $shortAnswersAttempt->has('exercise_attempt') ? $this->Html->link($shortAnswersAttempt->exercise_attempt->id, ['controller' => 'ExerciseAttempts', 'action' => 'view', $shortAnswersAttempt->exercise_attempt->id]) : '' ?></td>
                <td><?= $shortAnswersAttempt->has('question') ? $this->Html->link($shortAnswersAttempt->question->question, ['controller' => 'Questions', 'action' => 'view', $shortAnswersAttempt->question->id]) : '' ?></td>
                <td><?= h($shortAnswersAttempt->attempted_answer) ?></td>
                <td><?= $this->Number->format($shortAnswersAttempt->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shortAnswersAttempt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shortAnswersAttempt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shortAnswersAttempt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortAnswersAttempt->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Short Answer Attempt'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercise Attempts'), ['controller' => 'ExerciseAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>