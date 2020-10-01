<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseTable Test Case
 */
class ExerciseTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseTable
     */
    public $Exercise;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exercise'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Exercise') ? [] : ['className' => ExerciseTable::class];
        $this->Exercise = TableRegistry::getTableLocator()->get('Exercise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exercise);

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
