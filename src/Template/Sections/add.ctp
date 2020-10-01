<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 */
?>
<div class="sections form large-9 medium-8 columns content">
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Section') ?></legend>
        <?php
            echo $this->Form->control('section',['class' => 'form-control']);
            echo $this->Form->control('description',['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class = top>
    <?= $this->Html->link(__('List Sections'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>
