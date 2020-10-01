<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise[]|\Cake\Collection\CollectionInterface $exercises
 */
?>
<div class="exercises index large-9 medium-8 columns content">
    <h3 class="display-4"><?= __('Exercises') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exerciseAudioPath') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cultural_note_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tags') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exercises as $exercise): ?>
            <tr>
                <td><?= $exercise->has('unit') ? $this->Html->link($exercise->unit->name, ['controller' => 'Units', 'action' => 'view', $exercise->unit->id]) : '' ?></td>
                <td><?= h($exercise->name) ?></td>
                <td><?= h($exercise->exerciseAudioPath) ?></td>
                <td><?= $exercise->has('cultural_note') ? $this->Html->link($exercise->cultural_note->name, ['controller' => 'CulturalNotes', 'action' => 'view', $exercise->cultural_note->id]) : '' ?></td>
                <td><?php
                  $noOfTags = 0;
                  foreach($exercise->exercise_tags as $tags){
                    if($noOfTags != 0) echo ", ";
                    echo $this->Html->link($tags->tag->name , ['controller' => 'Tags', 'action' => 'view', $tags->tag->id]);
                    $noOfTags += 1;
                  }
                ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $exercise->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exercise->id]) ?>
                    <?= $this->Html->link(__('Tags'), ['controller' => 'Tags','action' => 'add', $exercise->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
<?= $this->Html->link(__('New Exercise'), ['action' => 'add'],['class' => 'btn btn-primary ml-auto']) ?>
<?= $this->Html->link(__('List Cultural Notes'), ['controller' => 'CulturalNotes', 'action' => 'index'],['class' => 'btn btn-success']) ?>
<?= $this->Html->link(__('List Exercise Notes'), ['controller' => 'ExerciseNotes', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
<?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
</div>
