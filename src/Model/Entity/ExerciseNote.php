<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExerciseNote Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $exercise_id
 * @property string $note
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Exercise $exercise
 */
class ExerciseNote extends Entity
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
        'user_id' => true,
        'exercise_id' => true,
        'note' => true,
        'user' => true,
        'exercise' => true
    ];
}
