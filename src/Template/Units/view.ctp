<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<div class="units view large-9 medium-8 columns content">
    <h3 class="display-4"><?= h($unit->name) ?></h3>
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Unit Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section') ?></th>
            <td><?=h($unit->section->section)?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $unit->id],
                    ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]
                )?>
    <div class="top">
    <?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Units'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Add Units'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-danger']) ?>
    </div>
    <div class="related">
        <h4 class="display-4"><?= __('Related Exercises') ?></h4>
        <?php if (!empty($unit->exercises)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Unit') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('ExerciseAudioPath') ?></th>
                <th scope="col"><?= __('Cultural Note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($unit->exercises as $exercises): ?>
            <tr>
                <td><?= h($exercises->unit->name) ?></td>
                <td><?= h($exercises->name) ?></td>
                <td><?= h($exercises->exerciseAudioPath) ?></td>
                <td><?= h($exercises->cultural_note->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Exercises', 'action' => 'view', $exercises->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Exercises', 'action' => 'edit', $exercises->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercises', 'action' => 'delete', $exercises->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercises->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
