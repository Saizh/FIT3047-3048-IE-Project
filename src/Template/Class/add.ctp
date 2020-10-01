<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Class'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="class form large-9 medium-8 columns content">
    <?= $this->Form->create($class) ?>
    <fieldset>
        <legend><?= __('Add Class') ?></legend>
        <?php
            echo $this->Form->control('class_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
