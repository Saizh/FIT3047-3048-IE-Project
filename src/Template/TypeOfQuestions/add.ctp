<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeOfQuestion $typeOfQuestion
 */
?>
<div class="typeOfQuestions form large-9 medium-8 columns content">
    <?= $this->Form->create($typeOfQuestion) ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Type Of Question') ?></legend>
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
    <?= $this->Html->link(__('List Type Of Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
</div>