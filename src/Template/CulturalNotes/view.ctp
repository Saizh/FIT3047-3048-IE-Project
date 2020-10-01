<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CulturalNote $culturalNote
 */
?>
<div class="culturalNotes view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($culturalNote->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($culturalNote->note) ?></td>
        </tr>
    </table>
        <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $culturalNote->id],
                        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $culturalNote->id)]
                    )?>
        <div class="top">
        <?= $this->Html->link(__('Edit Cultural Note'), ['action' => 'edit', $culturalNote->id],['class' => 'btn btn-primary ml-auto']) ?>
        <?= $this->Html->link(__('List Cultural Note'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('New Cultural Note'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
        </div>
</div>
