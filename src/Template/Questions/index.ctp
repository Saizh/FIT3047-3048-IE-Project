<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<div class="questions index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Questions') ?></h3>
    <table cellpadding="0" cellspacing="0" id = 'tableid' class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('exercise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_of_question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('question') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $question->has('exercise') ? $this->Html->link($question->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $question->exercise->id]) : '' ?></td>
                <td><?= $question->has('type_of_question') ? $this->Html->link($question->type_of_question->question_type, ['controller' => 'TypeOfQuestions', 'action' => 'view', $question->type_of_question->id]) : '' ?></td>
                <td><?= nl2br(h($question->question)) ?></td>
                <td><?= $this->Number->format($question->max_score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="top">
    <?= $this->Html->link(__('New Question'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link('List All Types Of Questions', ['controller' => 'TypeOfQuestions', 'action' => 'index'],['class' => 'btn btn-success'])?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
</div>