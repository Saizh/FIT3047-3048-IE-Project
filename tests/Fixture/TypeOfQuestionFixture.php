<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TypeOfQuestionFixture
 *
 */
class TypeOfQuestionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'type_of_question';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'questionType' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'type_of_question_id_uindex' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'type_of_question_questionType_uindex' => ['type' => 'unique', 'columns' => ['questionType'], 'length' => []],
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
                'questionType' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
