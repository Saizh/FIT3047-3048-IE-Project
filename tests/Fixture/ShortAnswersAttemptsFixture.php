<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShortAnswersAttemptsFixture
 *
 */
class ShortAnswersAttemptsFixture extends TestFixture
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
        'question_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'attempted_answer' => ['type' => 'string', 'length' => 1000, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'score' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'short_answers_attempts_exercise_attempts_id_fk' => ['type' => 'index', 'columns' => ['exercise_attempt_id'], 'length' => []],
            'short_answers_attempts_questions_id_fk' => ['type' => 'index', 'columns' => ['question_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'short_answers_attempts_id_uindex' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'short_answers_attempts_exercise_attempts_id_fk' => ['type' => 'foreign', 'columns' => ['exercise_attempt_id'], 'references' => ['exercise_attempts', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'short_answers_attempts_questions_id_fk' => ['type' => 'foreign', 'columns' => ['question_id'], 'references' => ['questions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'question_id' => 1,
                'attempted_answer' => 'Lorem ipsum dolor sit amet',
                'score' => 1
            ],
        ];
        parent::init();
    }
}
