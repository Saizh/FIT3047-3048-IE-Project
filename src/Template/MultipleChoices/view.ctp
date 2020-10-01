<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleChoice $multipleChoice
 */
?>
<div class="multipleChoices view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Answer') ?></th>
            <td><?= h($multipleChoice->answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $multipleChoice->has('question') ? $this->Html->link($multipleChoice->question->question, ['controller' => 'Questions', 'action' => 'view', $multipleChoice->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correct') ?></th>
            <td><?= $multipleChoice->correct ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Multiple Choice Attempt'), ['action' => 'delete', $multipleChoice->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleChoice->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Multiple Choice Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
