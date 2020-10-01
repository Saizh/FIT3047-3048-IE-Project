<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserUnit $userUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Units'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userUnits form large-9 medium-8 columns content">
    <?= $this->Form->create($userUnit) ?>
    <fieldset>
        <legend><?= __('Add User Unit') ?></legend>
        <?php
            echo $this->Form->control('unit_id', ['type' => 'select','multiple' => 'checkbox',
    'options' => $units
    ]);
        ?>



    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>