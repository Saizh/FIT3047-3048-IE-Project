<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 */
?>
<?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>
<div class="exercises form large-9 medium-8 columns content">
   <?= $this->Form->create($exercise,['type' => 'file'])  ?>
    <fieldset>
        <legend class="display-4"><?= __('Add Exercise') ?></legend>
<?php
            echo $this->Form->control('unit_id', ['options' => $units,'class' => 'form-control']);
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->control('Exercise Audio',
            ['options' => $exerciseAudio,
            'class' => 'form-control',
            'empty'=> 'If audio already exists, please select it from the list']);
            echo $this->Form->control('Exercise Audio Upload',['class' => 'form-control','type' => 'file', 'accept' => 'audio/mp3']);
            echo $this->Form->control('cultural_note_id', ['options' => $culturalNotes, 'empty' => true,'class' => 'form-control']);
            echo $this->Form->control('English_Transcript', ['class' => 'form-control']);
            echo $this->Form->control('French_Transcript', ['class' => 'form-control']);
 ?>


    </fieldset>
    <div class = top2>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="top">
<?= $this->Html->link(__('List Exercise'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
<?= $this->Html->link(__('List Cultural Notes'), ['controller' => 'CulturalNotes', 'action' => 'index'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('New Cultural Notes'), ['controller' => 'CulturalNotes', 'action' => 'add'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
<?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add'],['class' => 'btn btn-danger']) ?>
<?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
<?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
</div>
