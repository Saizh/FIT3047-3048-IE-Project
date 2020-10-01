<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MultipleAnswer $multipleAnswer
 */
?>
<div class="multipleAnswers form large-9 medium-8 columns content">
    <?= $this->Form->create($multipleAnswer) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Multiple Answer') ?></legend>
        <?php
            echo $this->Form->control('question_id', ['class' => 'form-control','options' => $questions]);
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
        ['action' => 'delete', $multipleAnswer->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswer->id)]
    )?>
    <?= $this->Html->link(__('List Multiple Answer Questions'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>