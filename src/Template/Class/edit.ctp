<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $class->class_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $class->class_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Class'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="class form large-9 medium-8 columns content">
    <?= $this->Form->create($class) ?>
    <fieldset>
        <legend><?= __('Edit Class') ?></legend>
        <?php
            echo $this->Form->control('class_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
