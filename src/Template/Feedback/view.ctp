<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feedback $feedback
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Feedback'), ['action' => 'edit', $feedback->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Feedback'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Feedback'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="feedback view large-9 medium-8 columns content">
    <h3><?= h($feedback->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Exercise') ?></th>
            <td><?= $feedback->has('exercise') ? $this->Html->link($feedback->exercise->id, ['controller' => 'Exercises', 'action' => 'view', $feedback->exercise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Context') ?></th>
            <td><?= h($feedback->context) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feedback->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score Of Question') ?></th>
            <td><?= $this->Number->format($feedback->score_of_question) ?></td>
        </tr>
    </table>
</div>
