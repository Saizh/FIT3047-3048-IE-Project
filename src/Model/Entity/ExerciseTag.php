<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExerciseTag Entity
 *
 * @property int $id
 * @property int $exercise_id
 * @property int $tag_id
 *
 * @property \App\Model\Entity\Exercise $exercise
 * @property \App\Model\Entity\Tag $tag
 */
class ExerciseTag extends Entity
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
        'tag_id' => true,
        'exercise' => true,
        'tag' => true
    ];
}
