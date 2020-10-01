<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technique $technique
 */
?>
<div class="techniques view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Technique') ?></th>
            <td><?= h($technique->technique) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(__('Delete Technique'), ['action' => 'delete', $technique->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $technique->id)]) ?>
<div class="top">
    <?= $this->Html->link(__('List Techniques'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>