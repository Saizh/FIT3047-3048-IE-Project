<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleChoice $multipleChoice
 */
?>
<div class="multipleChoices form large-9 medium-8 columns content">
    <?= $this->Form->create($multipleChoice) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Multiple Choice') ?></legend>
        <?php
            echo $this->Form->control('question_id', ['class' => 'form-control']);
            echo $this->Form->control('answer', ['class' => 'form-control']);
            echo $this->Form->control('correct');
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
        ['action' => 'delete', $multipleChoice->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleChoice->id)]
    )?>
    <?= $this->Html->link(__('List Multiple Choice Questions'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>