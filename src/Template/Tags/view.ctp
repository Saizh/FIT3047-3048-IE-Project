<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="tags view large-9 medium-8 columns content">
    <h3 class="display-4"><?= h($tag->name) ?></h3>
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tag->name) ?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $tag->id],
        ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]
    )?>
    <div class = top>
        <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info ml-auto']) ?>
        <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
    </div>
    <div class="related">
        <h4 class="display-4"><?= __('Related Exercise Tags') ?></h4>
        <?php if (!empty($tag->exercise_tags)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Exercise') ?></th>
                <th scope="col"><?= __('Tag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->exercise_tags as $exerciseTags): ?>
            <tr>
                <td><?= h($exerciseTags->exercise->name) ?></td>
                <td><?= h($exerciseTags->tag->name) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExerciseTags', 'action' => 'delete', $exerciseTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciseTags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
