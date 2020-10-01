<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswer $multipleAnswer
 */
?>
<div class="multipleAnswers view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $multipleAnswer->has('question') ? $this->Html->link($multipleAnswer->question->question, ['controller' => 'Questions', 'action' => 'view', $multipleAnswer->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer') ?></th>
            <td><?= h($multipleAnswer->answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correct') ?></th>
            <td><?= $multipleAnswer->correct ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Multiple Answer Question'), ['action' => 'delete', $multipleAnswer->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswer->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Multiple Answer Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
