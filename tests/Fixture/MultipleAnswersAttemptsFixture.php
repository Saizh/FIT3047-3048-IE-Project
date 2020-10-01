<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MultipleAnswersAttemptsFixture
 *
 */
class MultipleAnswersAttemptsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'exercise_attempt_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'multiple_answer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'score' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'multiple_answers_attempts_exercise_attempts_id_fk' => ['type' => 'index', 'columns' => ['exercise_attempt_id'], 'length' => []],
            'multiple_answers_attempts_multiple_answers_id_fk' => ['type' => 'index', 'columns' => ['multiple_answer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'multiple_answers_attempts_id_uindex' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'multiple_answers_attempts_exercise_attempts_id_fk' => ['type' => 'foreign', 'columns' => ['exercise_attempt_id'], 'references' => ['exercise_attempts', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'multiple_answers_attempts_multiple_answers_id_fk' => ['type' => 'foreign', 'columns' => ['multiple_answer_id'], 'references' => ['multiple_answers', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'exercise_attempt_id' => 1,
                'multiple_answer_id' => 1,
                'score' => 1
            ],
        ];
        parent::init();
    }
}
