<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseNote $exerciseNote
 */
?>
<div class="exerciseNotes view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $exerciseNote->has('user') ? $this->Html->link($exerciseNote->user->email, ['controller' => 'Users', 'action' => 'view', $exerciseNote->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exercise') ?></th>
            <td><?= $exerciseNote->has('exercise') ? $this->Html->link($exerciseNote->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $exerciseNote->exercise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($exerciseNote->note) ?></td>
        </tr>
    </table>
</div>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $exerciseNote->id],
    ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $exerciseNote->id)]
)
?>
<div class="top">
    <?= $this->Html->link(__('List Exercise Notes'), ['controller' => 'ExerciseNotes', 'action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('New Exercise Note'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Edit Exercise Note'),
        ['action' => 'edit', $exerciseNote->id],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises',
        'action' => 'index'],['class' => 'btn btn-success']) ?>
</div>