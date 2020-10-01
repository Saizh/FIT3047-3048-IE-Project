<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MultipleAnswersAttempt Entity
 *
 * @property int $id
 * @property int $exercise_attempt_id
 * @property int $multiple_answer_id
 * @property int $score
 *
 * @property \App\Model\Entity\ExerciseAttempt $exercise_attempt
 * @property \App\Model\Entity\MultipleAnswer $multiple_answer
 */
class MultipleAnswersAttempt extends Entity
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
        'exercise_attempt_id' => true,
        'multiple_answer_id' => true,
        'score' => true,
        'exercise_attempt' => true,
        'multiple_answer' => true
    ];
}
