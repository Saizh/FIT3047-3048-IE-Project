<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciseAttempt $exerciseAttempt
 */
?>
<div class="exerciseAttempts view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $exerciseAttempt->has('user') ? $this->Html->link($exerciseAttempt->user->email, ['controller' => 'Users', 'action' => 'view', $exerciseAttempt->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exercise') ?></th>
            <td><?= $exerciseAttempt->has('exercise') ? $this->Html->link($exerciseAttempt->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $exerciseAttempt->exercise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($exerciseAttempt->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attempt Date') ?></th>
            <td><?= h($exerciseAttempt->attempt_date) ?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(__('Delete Exercise Attempt'), ['action' => 'delete', $exerciseAttempt->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $exerciseAttempt->id)]) ?>
    <div class="top">
        <?= $this->Html->link(__('List Exercise Attempts'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
        <?= $this->Html->link(__('List Multiple Choice Attempts'), ['controller' => 'MultipleChoiceAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('List Multiple Answer Attempts'), ['controller' => 'MultipleAnswersAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('List Short Answer Attempts'), ['controller' => 'ShortAnswerAttempts', 'action' => 'index'],['class' => 'btn btn-success']) ?>
    </div>
    <div class="related">
        <?php if (!empty($exerciseAttempt->multiple_answers_attempts)): ?>
        <h4 class="display-4"><?= __('Related Multiple Answers Attempts') ?></h4>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Exercise') ?></th>
                <th scope="col"><?= __('Multiple Answer') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exerciseAttempt->multiple_answers_attempts as $multipleAnswersAttempts): ?>
            <tr>
                <td><?= h($multipleAnswersAttempts->exercise_attempt->exercise->name) ?></td>
                <td><?= h($multipleAnswersAttempts->multiple_answer->answer) ?></td>
                <td><?= h($multipleAnswersAttempts->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MultipleAnswersAttempts', 'action' => 'view', $multipleAnswersAttempts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultipleAnswersAttempts', 'action' => 'edit', $multipleAnswersAttempts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultipleAnswersAttempts', 'action' => 'delete', $multipleAnswersAttempts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswersAttempts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($exerciseAttempt->multiple_choice_attempts)): ?>
        <h4 class="display-4"><?= __('Related Multiple Choice Attempts') ?></h4>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Exercise') ?></th>
                <th scope="col"><?= __('Multiple Choice') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exerciseAttempt->multiple_choice_attempts as $multipleChoiceAttempts): ?>
            <tr>
                <td><?= h($multipleChoiceAttempts->exercise_attempt->exercise->name) ?></td>
                <td><?= h($multipleChoiceAttempts->multiple_choice->answer) ?></td>
                <td><?= h($multipleChoiceAttempts->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MultipleChoiceAttempts', 'action' => 'view', $multipleChoiceAttempts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultipleChoiceAttempts', 'action' => 'edit', $multipleChoiceAttempts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultipleChoiceAttempts', 'action' => 'delete', $multipleChoiceAttempts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceAttempts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($exerciseAttempt->short_answers_attempts)): ?>
        <h4 class="display-4"><?= __('Related Short Answers Attempts') ?></h4>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Exercise') ?></th>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Attempted Answer') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exerciseAttempt->short_answers_attempts as $shortAnswersAttempts): ?>
            <tr>
                <td><?= h($shortAnswersAttempts->exercise_attempt->exercise->name) ?></td>
                <td><?= h($shortAnswersAttempts->question->question) ?></td>
                <td><?= h($shortAnswersAttempts->attempted_answer) ?></td>
                <td><?= h($shortAnswersAttempts->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ShortAnswersAttempts', 'action' => 'view', $shortAnswersAttempts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ShortAnswersAttempts', 'action' => 'edit', $shortAnswersAttempts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShortAnswersAttempts', 'action' => 'delete', $shortAnswersAttempts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortAnswersAttempts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
