<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultipleAnswersAttemptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultipleAnswersAttemptsTable Test Case
 */
class MultipleAnswersAttemptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultipleAnswersAttemptsTable
     */
    public $MultipleAnswersAttempts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multiple_answers_attempts',
        'app.exercise_attempts',
        'app.multiple_answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MultipleAnswersAttempts') ? [] : ['className' => MultipleAnswersAttemptsTable::class];
        $this->MultipleAnswersAttempts = TableRegistry::getTableLocator()->get('MultipleAnswersAttempts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultipleAnswersAttempts);

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
