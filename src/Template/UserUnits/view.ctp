<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserUnit $userUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Unit'), ['action' => 'edit', $userUnit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Unit'), ['action' => 'delete', $userUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userUnit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Unit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userUnits view large-9 medium-8 columns content">
    <h3><?= h($userUnit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $userUnit->has('unit') ? $this->Html->link($userUnit->unit->name, ['controller' => 'Units', 'action' => 'view', $userUnit->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userUnit->has('user') ? $this->Html->link($userUnit->user->id, ['controller' => 'Users', 'action' => 'view', $userUnit->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userUnit->id) ?></td>
        </tr>
    </table>
</div>
