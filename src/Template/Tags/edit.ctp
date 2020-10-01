<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>

<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend class="display-4"><?= __('Edit Tag') ?></legend>
        <?php
            echo $this->Form->control('name', ['class' => 'form-control']);
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
        ['action' => 'delete', $tag->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]
    )?>
    <?= $this->Html->link(__('List Tags'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
</div>