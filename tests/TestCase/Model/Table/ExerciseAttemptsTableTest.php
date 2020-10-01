<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseAttemptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseAttemptsTable Test Case
 */
class ExerciseAttemptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseAttemptsTable
     */
    public $ExerciseAttempts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exercise_attempts',
        'app.users',
        'app.exercises',
        'app.multiple_answers_attempts',
        'app.multiple_choice_attempts',
        'app.short_answers_attempts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ExerciseAttempts') ? [] : ['className' => ExerciseAttemptsTable::class];
        $this->ExerciseAttempts = TableRegistry::getTableLocator()->get('ExerciseAttempts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExerciseAttempts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
