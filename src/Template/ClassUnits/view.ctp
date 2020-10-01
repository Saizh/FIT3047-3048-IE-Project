<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassUnit $classUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Class Unit'), ['action' => 'edit', $classUnit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Class Unit'), ['action' => 'delete', $classUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classUnit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Class Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Class'), ['controller' => 'Class', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clas'), ['controller' => 'Class', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="classUnits view large-9 medium-8 columns content">
    <h3><?= h($classUnit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clas') ?></th>
            <td><?= $classUnit->has('clas') ? $this->Html->link($classUnit->clas->class_name, ['controller' => 'Class', 'action' => 'view', $classUnit->clas->class_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $classUnit->has('unit') ? $this->Html->link($classUnit->unit->name, ['controller' => 'Units', 'action' => 'view', $classUnit->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($classUnit->id) ?></td>
        </tr>
    </table>
</div>
