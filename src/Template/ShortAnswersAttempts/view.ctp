<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortAnswersAttempt $shortAnswersAttempt
 */
?>
<div class="shortAnswersAttempts view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Exercise Attempt') ?></th>
            <td><?= $shortAnswersAttempt->has('exercise_attempt') ? $this->Html->link($shortAnswersAttempt->exercise_attempt->exercise->name, ['controller' => 'ExerciseAttempts', 'action' => 'view', $shortAnswersAttempt->exercise_attempt->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $shortAnswersAttempt->has('question') ? $this->Html->link($shortAnswersAttempt->question->question, ['controller' => 'Questions', 'action' => 'view', $shortAnswersAttempt->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attempted Answer') ?></th>
            <td><?= h($shortAnswersAttempt->attempted_answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($shortAnswersAttempt->score) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Short Answer Attempt'), ['action' => 'delete', $shortAnswersAttempt->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $shortAnswersAttempt->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Short Answer Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>