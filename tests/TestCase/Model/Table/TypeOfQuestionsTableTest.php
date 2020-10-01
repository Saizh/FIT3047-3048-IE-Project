<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeOfQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeOfQuestionsTable Test Case
 */
class TypeOfQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeOfQuestionsTable
     */
    public $TypeOfQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_of_questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeOfQuestions') ? [] : ['className' => TypeOfQuestionsTable::class];
        $this->TypeOfQuestions = TableRegistry::getTableLocator()->get('TypeOfQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeOfQuestions);

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
