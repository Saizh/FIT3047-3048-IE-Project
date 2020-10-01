<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswersAttempt $multipleAnswersAttempt
 */
?>
<div class="multipleAnswersAttempts view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Exercise Attempt') ?></th>
            <td><?= $multipleAnswersAttempt->has('exercise_attempt') ? $this->Html->link($multipleAnswersAttempt->exercise_attempt->exercise->name, ['controller' => 'ExerciseAttempts', 'action' => 'view', $multipleAnswersAttempt->exercise_attempt->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multiple Answer') ?></th>
            <td><?= $multipleAnswersAttempt->has('multiple_answer') ? $this->Html->link($multipleAnswersAttempt->multiple_answer->answer, ['controller' => 'MultipleAnswers', 'action' => 'view', $multipleAnswersAttempt->multiple_answer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($multipleAnswersAttempt->score) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Multiple Answer Attempt'), ['action' => 'delete', $multipleAnswersAttempt->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswersAttempt->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Multiple Answer Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
