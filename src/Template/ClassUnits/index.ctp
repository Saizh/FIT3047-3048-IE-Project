<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClassUnit[]|\Cake\Collection\CollectionInterface $classUnits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Class Unit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Class'), ['controller' => 'Class', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clas'), ['controller' => 'Class', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="classUnits index large-9 medium-8 columns content">
    <h3><?= __('Class Units') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classUnits as $classUnit): ?>
            <tr>
                <td><?= $this->Number->format($classUnit->id) ?></td>
                <td><?= $classUnit->has('clas') ? $this->Html->link($classUnit->clas->class_name, ['controller' => 'Class', 'action' => 'view', $classUnit->clas->class_id]) : '' ?></td>
                <td><?= $classUnit->has('unit') ? $this->Html->link($classUnit->unit->name, ['controller' => 'Units', 'action' => 'view', $classUnit->unit->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $classUnit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $classUnit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classUnit->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
