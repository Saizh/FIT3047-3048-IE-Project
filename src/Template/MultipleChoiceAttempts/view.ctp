<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleChoiceAttempt $multipleChoiceAttempt
 */
?>
<div class="multipleChoiceAttempts view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Exercise Attempt') ?></th>
            <td><?= $multipleChoiceAttempt->has('exercise_attempt') ? $this->Html->link($multipleChoiceAttempt->exercise_attempt->exercise->name, ['controller' => 'ExerciseAttempts', 'action' => 'view', $multipleChoiceAttempt->exercise_attempt->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multiple Choice') ?></th>
            <td><?= $multipleChoiceAttempt->has('multiple_choice') ? $this->Html->link($multipleChoiceAttempt->multiple_choice->answer, ['controller' => 'MultipleChoices', 'action' => 'view', $multipleChoiceAttempt->multiple_choice->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($multipleChoiceAttempt->score) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Multiple Choice Attempt'), ['action' => 'delete', $multipleChoiceAttempt->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceAttempt->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Multiple Choice Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
