<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleChoice[]|\Cake\Collection\CollectionInterface $multipleChoices
 */
?>
<div class="multipleChoices index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Multiple Choices') ?></h3>
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
            <?php foreach ($multipleChoices as $multipleChoice): ?>
            <tr>
                <td><?= $multipleChoice->has('question') ? $this->Html->link($multipleChoice->question->question, ['controller' => 'Questions', 'action' => 'view', $multipleChoice->question->id]) : '' ?></td>
                <td><?= h($multipleChoice->answer) ?></td>
                <td><?= h($multipleChoice->correct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $multipleChoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $multipleChoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $multipleChoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoice->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="top">
    <?= $this->Html->link(__('New Question'), ['controller' => 'Questions','action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Multiple Answers'), ['controller' => 'MultipleAnswers', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Short Answers'), ['controller' => 'ShortAnswers', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>
