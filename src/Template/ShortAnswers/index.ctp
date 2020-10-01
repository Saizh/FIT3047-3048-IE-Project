<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortAnswer[]|\Cake\Collection\CollectionInterface $shortAnswers
 */
?>
<div class="shortAnswers index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Short Answers') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('possible_answer') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shortAnswers as $shortAnswer): ?>
            <tr>
                <td><?= $shortAnswer->has('question') ? $this->Html->link($shortAnswer->question->question, ['controller' => 'Questions', 'action' => 'view', $shortAnswer->question->id]) : '' ?></td>
                <td><?= h($shortAnswer->possible_answer) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shortAnswer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shortAnswer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shortAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortAnswer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="top">
    <?= $this->Html->link(__('New Question'), ['controller' => 'Questions','action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Multiple Choices'), ['controller' => 'MultipleChoices', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Multiple Answers'), ['controller' => 'MultipleAnswers', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>