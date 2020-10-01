<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 */
?>
<div class="sections view large-9 medium-8 columns content">
    <h3 class="display-4"><?= h($section->section) ?></h3>
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Section') ?></th>
            <td><?= h($section->section) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($section->description) ?></td>
        </tr>
    </table>
</div>
    <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $section->id],
                    ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $section->id)]
                )?>
<div class="top">
<?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id],['class' => 'btn btn-primary ml-auto']) ?>
<?= $this->Html->link(__('List Sections'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('Add Sections'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
</div>
    <div class="related">
        <h4 class="display-4"><?= __('Related Units') ?></h4>
        <?php if (!empty($section->units)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Unit Name') ?></th>
                <th scope="col"><?= __('Section') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($section->units as $units): ?>
            <tr>
                <td><?= h($units->name) ?></td>
                <td><?= h($units->section->section) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Units', 'action' => 'view', $units->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Units', 'action' => 'edit', $units->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Units', 'action' => 'delete', $units->id], ['confirm' => __('Are you sure you want to delete # {0}?', $units->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>