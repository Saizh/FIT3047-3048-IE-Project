<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultipleChoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultipleChoicesTable Test Case
 */
class MultipleChoicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultipleChoicesTable
     */
    public $MultipleChoices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multiple_choices',
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
        $config = TableRegistry::getTableLocator()->exists('MultipleChoices') ? [] : ['className' => MultipleChoicesTable::class];
        $this->MultipleChoices = TableRegistry::getTableLocator()->get('MultipleChoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultipleChoices);

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
