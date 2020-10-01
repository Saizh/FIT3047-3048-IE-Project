<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswer[]|\Cake\Collection\CollectionInterface $multipleAnswers
 */
?>
<div class="multipleAnswers index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Multiple Answers') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($multipleAnswers as $multipleAnswer): ?>
            <tr>
                <td><?= $multipleAnswer->has('question') ? $this->Html->link($multipleAnswer->question->question, ['controller' => 'Questions', 'action' => 'view', $multipleAnswer->question->id]) : '' ?></td>
                <td><?= h($multipleAnswer->answer) ?></td>
                <td><?= h($multipleAnswer->correct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $multipleAnswer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $multipleAnswer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $multipleAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="top">
    <?= $this->Html->link(__('New Question'), ['controller' => 'Questions','action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Multiple Choices'), ['controller' => 'MultipleChoices', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Short Answers'), ['controller' => 'ShortAnswers', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>