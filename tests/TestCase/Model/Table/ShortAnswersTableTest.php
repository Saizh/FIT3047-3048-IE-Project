<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShortAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShortAnswersTable Test Case
 */
class ShortAnswersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShortAnswersTable
     */
    public $ShortAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.short_answers',
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
        $config = TableRegistry::getTableLocator()->exists('ShortAnswers') ? [] : ['className' => ShortAnswersTable::class];
        $this->ShortAnswers = TableRegistry::getTableLocator()->get('ShortAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShortAnswers);

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
