<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClassUnit Entity
 *
 * @property int $id
 * @property int|null $class_id
 * @property int|null $unit_id
 *
 * @property \App\Model\Entity\Clas $clas
 * @property \App\Model\Entity\Unit $unit
 */
class ClassUnit extends Entity
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
        'class_id' => true,
        'unit_id' => true,
        'class' => true,
        'unit' => true
    ];
}
