<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Technique $technique
 */
?>
<div class="techniques form large-9 medium-8 columns content">
    <?= $this->Form->create($technique) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Technique') ?></legend>
        <?php
            echo $this->Form->control('technique', ['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class = top>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $technique->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $technique->id)]
    )?>
    <?= $this->Html->link(__('List Techniques'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>