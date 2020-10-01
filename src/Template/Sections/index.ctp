<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section[]|\Cake\Collection\CollectionInterface $sections
 */
?>
<div class="sections index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Sections') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('section') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $section): ?>
            <tr>
                <td><?= h($section->section) ?></td>
                <td><?= h($section->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $section->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $section->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
<?= $this->Html->link(__('Add Section'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
</div>