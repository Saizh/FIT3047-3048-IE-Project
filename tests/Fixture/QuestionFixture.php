<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuestionFixture
 *
 */
class QuestionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'question';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'exerciseId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'questionTypeId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'question' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'maxScore' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ExerciseID' => ['type' => 'index', 'columns' => ['exerciseId'], 'length' => []],
            'QuestionType' => ['type' => 'index', 'columns' => ['questionTypeId'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'QUESTION_id_uindex' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'ExerciseID' => ['type' => 'foreign', 'columns' => ['exerciseId'], 'references' => ['exercise', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'QuestionType' => ['type' => 'foreign', 'columns' => ['questionTypeId'], 'references' => ['type_of_question', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'exerciseId' => 1,
                'questionTypeId' => 1,
                'question' => 'Lorem ipsum dolor sit amet',
                'maxScore' => 1
            ],
        ];
        parent::init();
    }
}
