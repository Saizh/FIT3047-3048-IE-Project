<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultipleAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultipleAnswersTable Test Case
 */
class MultipleAnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultipleAnswersTable
     */
    public $MultipleAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multiple_answers',
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
        $config = TableRegistry::getTableLocator()->exists('MultipleAnswers') ? [] : ['className' => MultipleAnswersTable::class];
        $this->MultipleAnswers = TableRegistry::getTableLocator()->get('MultipleAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultipleAnswers);

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
