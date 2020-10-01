<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MultipleChoiceAttempt Entity
 *
 * @property int $id
 * @property int $exercise_attempt_id
 * @property int $multiple_choice_id
 * @property int $score
 *
 * @property \App\Model\Entity\ExerciseAttempt $exercise_attempt
 * @property \App\Model\Entity\MultipleChoice $multiple_choice
 */
class MultipleChoiceAttempt extends Entity
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
        'multiple_choice_id' => true,
        'score' => true,
        'exercise_attempt' => true,
        'multiple_choice' => true
    ];
}
