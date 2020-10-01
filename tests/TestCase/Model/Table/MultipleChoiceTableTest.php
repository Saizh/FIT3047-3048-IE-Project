<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultipleChoiceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultipleChoiceTable Test Case
 */
class MultipleChoiceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultipleChoiceTable
     */
    public $MultipleChoice;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multiple_choice'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MultipleChoice') ? [] : ['className' => MultipleChoiceTable::class];
        $this->MultipleChoice = TableRegistry::getTableLocator()->get('MultipleChoice', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultipleChoice);

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
