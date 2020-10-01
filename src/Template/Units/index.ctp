<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit[]|\Cake\Collection\CollectionInterface $units
 */
?>
<div class="units index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Units') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($units as $unit): ?>
            <tr>
                <td><?= h($unit->name) ?></td>
                <td><?= $unit->has('section') ? $this->Html->link($unit->section->section, ['controller' => 'Sections', 'action' => 'view', $unit->section->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $unit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
<?= $this->Html->link(__('Add Unit'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
<?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
<?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-danger']) ?>
</div>
