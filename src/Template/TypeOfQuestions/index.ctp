<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeOfQuestion[]|\Cake\Collection\CollectionInterface $typeOfQuestions
 */
?>
<div class="typeOfQuestions index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Type Of Questions') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('question_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeOfQuestions as $typeOfQuestion): ?>
            <tr>
                <td><?= h($typeOfQuestion->question_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typeOfQuestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeOfQuestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeOfQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeOfQuestion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class = top>
    <?= $this->Html->link(__('New Type Of Question'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
