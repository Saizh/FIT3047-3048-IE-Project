<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feedback Entity
 *
 * @property int $id
 * @property int $score_of_question
 * @property int $exercise_id
 * @property string $context
 *
 * @property \App\Model\Entity\Exercise $exercise
 */
class Feedback extends Entity
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
        'score_of_question' => true,
        'exercise_id' => true,
        'context' => true,
        'exercise' => true
    ];
}
