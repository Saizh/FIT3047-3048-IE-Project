<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="tags index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Tags') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag): ?>
            <tr>
                <td><?= h($tag->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Tag'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
</div>