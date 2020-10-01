<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<div class="questions view large-9 medium-8 columns content">
    <table class="table table-bordered dataTable">
        <tr>
            <th scope="row"><?= __('Exercise') ?></th>
            <td><?= $question->has('exercise') ? $this->Html->link($question->exercise->name, ['controller' => 'Exercises', 'action' => 'view', $question->exercise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Of Question') ?></th>
            <td><?= $question->has('type_of_question') ? $this->Html->link($question->type_of_question->question_type, ['controller' => 'TypeOfQuestions', 'action' => 'view', $question->type_of_question->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question') ?></th>
            <td><?= h($question->question) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Feedback') ?></th>
            <td><?= h($question->feedback) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Score') ?></th>
            <td><?= $this->Number->format($question->max_score) ?></td>
        </tr>
    </table>
    <?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['class' => 'btn btn-danger ml-auto','confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
    <div class="top">
        <?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id],['class' => 'btn btn-primary ml-auto']) ?> </li>
        <?= $this->Html->link(__('List Questions'), ['action' => 'index'],['class' => 'btn btn-primary ml-auto']) ?>
        <?= $this->Html->link(__('New Question'), ['action' => 'add'],['class' => 'btn btn-primary']) ?>
    </div>

    <div class="related">
        <?php if (!empty($question->multiple_answers)): ?>
        <h4 class="display-4"><?= __('Related Multiple Answers') ?></h4>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Answer') ?></th>
                <th scope="col"><?= __('Correct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->multiple_answers as $multipleAnswers): ?>
            <tr>
                <td><?= h($multipleAnswers->question->question) ?></td>
                <td><?= h($multipleAnswers->answer) ?></td>
                <td><?= h($multipleAnswers->correct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultipleAnswers', 'action' => 'edit', $multipleAnswers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultipleAnswers', 'action' => 'delete', $multipleAnswers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleAnswers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($question->multiple_choices)): ?>
        <h4 class="display-4"><?= __('Related Multiple Choices') ?></h4>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Answer') ?></th>
                <th scope="col"><?= __('Correct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->multiple_choices as $multipleChoices): ?>
            <tr>
                <td><?= h($multipleChoices->question->question) ?></td>
                <td><?= h($multipleChoices->answer) ?></td>
                <td><?= h($multipleChoices->correct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultipleChoices', 'action' => 'edit', $multipleChoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultipleChoices', 'action' => 'delete', $multipleChoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <?php if (!empty($question->short_answers)): ?>
        <h4 class="display-4"><?= __('Related Short Answers') ?></h4>
        <table cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
            <tr>
                <th scope="col"><?= __('Question') ?></th>
                <th scope="col"><?= __('Possible Answer') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->short_answers as $shortAnswers): ?>
            <tr>
                <td><?= h($shortAnswers->question->question) ?></td>
                <td><?= h($shortAnswers->possible_answer) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ShortAnswers', 'action' => 'view', $shortAnswers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ShortAnswers', 'action' => 'edit', $shortAnswers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ShortAnswers', 'action' => 'delete', $shortAnswers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortAnswers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
