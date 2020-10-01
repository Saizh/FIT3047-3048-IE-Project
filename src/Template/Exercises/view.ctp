<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 */
?>
<div class="exercises view large-9 medium-8 columns content">
    <h3 class="display-4"><?= h($exercise->name) ?></h3>
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $exercise->has('unit') ? $this->Html->link($exercise->unit->name, ['controller' => 'Units', 'action' => 'view', $exercise->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($exercise->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ExerciseAudioPath') ?></th>
            <td><?= h($exercise->exerciseAudioPath) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cultural Note') ?></th>
            <td><?= $exercise->has('cultural_note') ? $this->Html->link($exercise->cultural_note->name, ['controller' => 'CulturalNotes', 'action' => 'view', $exercise->cultural_note->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('English_Transcripts') ?></th>
            <td><?= h($exercise->transcript_eng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('French_Transcripts') ?></th>
            <td><?= h($exercise->transcript_fr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tags') ?></th>
            <td><?php
                $noOfTags = 0;
                foreach($exercise->exercise_tags as $tags){
                    if($noOfTags != 0) echo ", ";
                    echo $this->Html->link($tags->tag->name , ['controller' => 'Tags', 'action' => 'view', $tags->tag->id]);
                    $noOfTags += 1;
                }
                ?></td></td>
        </tr>

    </table>
    <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $exercise->id],
                    ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]
                )?>
    <div class="top">
    <?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id],['class' => 'btn btn-primary ml-auto']) ?>
    <?= $this->Html->link(__('List Exercise'), ['action' => 'index'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('New Exercise'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Cultural Notes'), ['controller' => 'CulturalNotes', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('New Cultural Notes'), ['controller' => 'CulturalNotes', 'action' => 'add'],['class' => 'btn btn-success']) ?>
    <?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index'],['class' => 'btn btn-danger']) ?>
    <?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add'],['class' => 'btn btn-danger']) ?>
    <?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index'],['class' => 'btn btn-warning']) ?>
    <?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add'],['class' => 'btn btn-warning']) ?>
    </div>

    <div class="related">
        <h4 class="display-4"><?= __('Related Questions') ?></h4>
        <?php if (!empty($exercise->questions)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Exercise') ?></th>
                <th scope="col"><?= __('Type Of Question') ?></th>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Max Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exercise->questions as $question): ?>
            <tr>
                <td><?= h($question->exercise->name) ?></td>
                <td><?= h($question->type_of_question-> question_type)?></td>
                <td><?= h($question->question) ?></td>
                <td><?= h($question->max_score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $question->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $question->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
