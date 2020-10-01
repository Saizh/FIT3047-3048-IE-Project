<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeOfQuestionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeOfQuestionTable Test Case
 */
class TypeOfQuestionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeOfQuestionTable
     */
    public $TypeOfQuestion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_of_question'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeOfQuestion') ? [] : ['className' => TypeOfQuestionTable::class];
        $this->TypeOfQuestion = TableRegistry::getTableLocator()->get('TypeOfQuestion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeOfQuestion);

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
