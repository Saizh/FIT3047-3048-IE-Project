<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CulturalNote[]|\Cake\Collection\CollectionInterface $culturalNotes
 */
?>
<div class="culturalNotes index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Cultural Notes') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($culturalNotes as $culturalNote): ?>
            <tr>
                <td><?= h($culturalNote->name) ?></td>
                <td><?= mb_strimwidth(h($culturalNote->note), 0, 50, "..."); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $culturalNote->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $culturalNote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $culturalNote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $culturalNote->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
<?= $this->Html->link(__('New Cultural Note'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
