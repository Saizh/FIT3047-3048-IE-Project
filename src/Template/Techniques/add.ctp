<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technique $technique
 */
?>
<div class="techniques form large-9 medium-8 columns content">
    <?= $this->Form->create($technique) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Technique') ?></legend>
        <?php
            echo $this->Form->control('technique', ['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
    <?= $this->Html->link(__('List Techniques'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>