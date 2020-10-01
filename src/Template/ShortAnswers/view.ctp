<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortAnswer $shortAnswer
 */
?>
<div class="shortAnswers view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= $shortAnswer->has('question') ? $this->Html->link($shortAnswer->question->question, ['controller' => 'Questions', 'action' => 'view', $shortAnswer->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Possible Answer') ?></th>
            <td><?= h($shortAnswer->possible_answer) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Short Answer Question'), ['action' => 'delete', $shortAnswer->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $shortAnswer->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Short Answer Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
