<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExerciseTagsFixture
 *
 */
class ExerciseTagsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'exercise_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tag_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'exercise_tags_exercises_id_fk' => ['type' => 'index', 'columns' => ['exercise_id'], 'length' => []],
            'exercise_tags_tags_id_fk' => ['type' => 'index', 'columns' => ['tag_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'exercise_tags_id_uindex' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'exercise_tags_exercises_id_fk' => ['type' => 'foreign', 'columns' => ['exercise_id'], 'references' => ['exercises', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'exercise_tags_tags_id_fk' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['tags', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'exercise_id' => 1,
                'tag_id' => 1
            ],
        ];
        parent::init();
    }
}
