<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CulturalNote $culturalNote
 */
?>
<div class="culturalNotes form large-9 medium-8 columns content">
    <?= $this->Form->create($culturalNote) ?>
    <fieldset>
        <legend class="display-4" ><?= __('Add Cultural Note') ?></legend>
        <?php
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->control('note',['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
<?= $this->Html->link(__('List Cultural Notes'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
