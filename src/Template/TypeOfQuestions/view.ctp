<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeOfQuestion $typeOfQuestion
 */
?>
<div class="typeOfQuestions view large-9 medium-8 columns content">
    <h3 class="display-4"><?= h($typeOfQuestion->id) ?></h3>
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Question Type') ?></th>
            <td><?= h($typeOfQuestion->question_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($typeOfQuestion->id) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Type Of Question'), ['action' => 'delete', $typeOfQuestion->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $typeOfQuestion->id)]) ?>
<div class = top>
    <?= $this->Html->link(__('List Type Of Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>