<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>
<div class="units form large-9 medium-8 columns content">
    <?= $this->Form->create($unit) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Unit') ?></legend>
        <?php
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->control('section_id',['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
<?= $this->Html->link(__('List Units'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
<?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
<?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-danger']) ?>
</div>
