<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeOfQuestion $typeOfQuestion
 */
?>
<div class="typeOfQuestions form large-9 medium-8 columns content">
    <?= $this->Form->create($typeOfQuestion) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Type Of Question') ?></legend>
        <?php
            echo $this->Form->control('question_type', ['class' => 'form-control']);
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
        ['action' => 'delete', $typeOfQuestion->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $typeOfQuestion->id)]
    )?>
    <?= $this->Html->link(__('List Type Of Questions'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>