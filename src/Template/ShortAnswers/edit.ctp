<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortAnswer $shortAnswer
 */
?>
<div class="shortAnswers form large-9 medium-8 columns content">
    <?= $this->Form->create($shortAnswer) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Short Answer') ?></legend>
        <?php
            echo $this->Form->control('question_id', ['class' => 'form-control','options' => $questions]);
            echo $this->Form->control('possible_answer', ['class' => 'form-control']);
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
        ['action' => 'delete', $shortAnswer->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $shortAnswer->id)]
    )?>
    <?= $this->Html->link(__('List Short Answer Questions'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
</div>