<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShortAnswersAttemptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShortAnswersAttemptsTable Test Case
 */
class ShortAnswersAttemptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShortAnswersAttemptsTable
     */
    public $ShortAnswersAttempts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.short_answers_attempts',
        'app.exercise_attempts',
        'app.questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ShortAnswersAttempts') ? [] : ['className' => ShortAnswersAttemptsTable::class];
        $this->ShortAnswersAttempts = TableRegistry::getTableLocator()->get('ShortAnswersAttempts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShortAnswersAttempts);

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
