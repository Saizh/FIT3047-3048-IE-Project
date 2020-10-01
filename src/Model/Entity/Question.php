<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property int $exercise_id
 * @property int $type_of_question_id
 * @property string $question
 * @property int $max_score
 * @property string $feedback
 *
 * @property \App\Model\Entity\Exercise $exercise
 * @property \App\Model\Entity\TypeOfQuestion $type_of_question
 * @property \App\Model\Entity\MultipleAnswer[] $multiple_answers
 * @property \App\Model\Entity\MultipleChoice[] $multiple_choices
 * @property \App\Model\Entity\ShortAnswer[] $short_answers
 * @property \App\Model\Entity\ShortAnswersAttempt[] $short_answers_attempts
 */
class Question extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'exercise_id' => true,
        'type_of_question_id' => true,
        'question' => true,
        'max_score' => true,
        'feedback' => true,
        'exercise' => true,
        'type_of_question' => true,
        'multiple_answers' => true,
        'multiple_choices' => true,
        'short_answers' => true,
        'short_answers_attempts' => true
    ];
}
