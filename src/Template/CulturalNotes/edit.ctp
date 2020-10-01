<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CulturalNote $culturalNote
 */
?>
<div class="culturalNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($culturalNote) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Cultural Note') ?></legend>
        <?php
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->control('note',['type' => 'textarea','class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
<?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $culturalNote->id],
                ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $culturalNote->id)]
            )
        ?>
<?= $this->Html->link(__('List Cultural Note'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>