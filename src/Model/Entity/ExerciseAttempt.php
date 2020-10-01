<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExerciseAttempt Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $attempt_date
 * @property int $user_id
 * @property int $exercise_id
 * @property int $score
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Exercise $exercise
 * @property \App\Model\Entity\MultipleAnswersAttempt[] $multiple_answers_attempts
 * @property \App\Model\Entity\MultipleChoiceAttempt[] $multiple_choice_attempts
 * @property \App\Model\Entity\ShortAnswersAttempt[] $short_answers_attempts
 */
class ExerciseAttempt extends Entity
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
        'attempt_date' => true,
        'user_id' => true,
        'exercise_id' => true,
        'score' => true,
        'user' => true,
        'exercise' => true,
        'multiple_answers_attempts' => true,
        'multiple_choice_attempts' => true,
        'short_answers_attempts' => true
    ];
}
