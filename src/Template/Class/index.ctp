<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class[]|\Cake\Collection\CollectionInterface $class
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Class'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="class index large-9 medium-8 columns content">
    <h3><?= __('Class') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($class as $class): ?>
            <tr>
                <td><?= $this->Number->format($class->class_id) ?></td>
                <td><?= h($class->class_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $class->class_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $class->class_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $class->class_id], ['confirm' => __('Are you sure you want to delete # {0}?', $class->class_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
