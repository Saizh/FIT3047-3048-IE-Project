<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 */
?>
<div class="sections form large-9 medium-8 columns content">
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Section') ?></legend>
        <?php
            echo $this->Form->control('section',['class' => 'form-control']);
            echo $this->Form->control('description',['class' => 'form-control']);
        ?>
    </fieldset>
    <div class = top2>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class = top>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $section->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $section->id)]
    )?>
    <?= $this->Html->link(__('List Sections'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>