<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exercise Entity
 *
 * @property int $id
 * @property int $unit_id
 * @property string $name
 * @property string $exerciseAudioPath
 * @property int $cultural_note_id
 * @property string $transcript_eng
 * @property string $transcript_fr
 *
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\CulturalNote $cultural_note
 * @property \App\Model\Entity\ExerciseAttempt[] $exercise_attempts
 * @property \App\Model\Entity\ExerciseNote[] $exercise_notes
 * @property \App\Model\Entity\ExerciseTag[] $exercise_tags
 * @property \App\Model\Entity\Question[] $questions
 */
class Exercise extends Entity
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
        'unit_id' => true,
        'name' => true,
        'exerciseAudioPath' => true,
        'cultural_note_id' => true,
        'transcript_eng' => true,
        'transcript_fr' => true,
        'unit' => true,
        'cultural_note' => true,
        'exercise_attempts' => true,
        'exercise_notes' => true,
        'exercise_tags' => true,
        'questions' => true
    ];
}
