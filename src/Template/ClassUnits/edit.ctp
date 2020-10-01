<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassUnit $classUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $classUnit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $classUnit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Class Units'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Class'), ['controller' => 'Class', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clas'), ['controller' => 'Class', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="classUnits form large-9 medium-8 columns content">
    <?= $this->Form->create($classUnit) ?>
    <fieldset>
        <legend><?= __('Edit Class Unit') ?></legend>
        <?php
            echo $this->Form->control('class_id', ['options' => $class, 'empty' => true]);
            echo $this->Form->control('unit_id', ['options' => $units, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
