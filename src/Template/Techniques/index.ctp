<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technique[]|\Cake\Collection\CollectionInterface $techniques
 */
?>
<div class="techniques index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Techniques') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('technique') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($techniques as $technique): ?>
            <tr>
                <td><?= nl2br(h($technique->technique)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $technique->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $technique->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $technique->id], ['confirm' => __('Are you sure you want to delete # {0}?', $technique->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('New Technique'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
</div>