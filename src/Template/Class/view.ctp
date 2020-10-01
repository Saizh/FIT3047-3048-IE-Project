<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clas $clas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Class'), ['action' => 'edit', $class->class_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Class'), ['action' => 'delete', $class->class_id], ['confirm' => __('Are you sure you want to delete # {0}?', $class->class_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Class'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="class view large-9 medium-8 columns content">
    <h3><?= h($class->class_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Class Name') ?></th>
            <td><?= h($class->class_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Id') ?></th>
            <td><?= $this->Number->format($class->class_id) ?></td>
        </tr>
    </table>
</div>
