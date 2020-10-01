<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultipleChoiceAttemptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultipleChoiceAttemptsTable Test Case
 */
class MultipleChoiceAttemptsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultipleChoiceAttemptsTable
     */
    public $MultipleChoiceAttempts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multiple_choice_attempts',
        'app.exercise_attempts',
        'app.multiple_choices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MultipleChoiceAttempts') ? [] : ['className' => MultipleChoiceAttemptsTable::class];
        $this->MultipleChoiceAttempts = TableRegistry::getTableLocator()->get('MultipleChoiceAttempts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultipleChoiceAttempts);

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
