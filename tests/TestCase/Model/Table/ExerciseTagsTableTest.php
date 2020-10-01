<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseTagsTable Test Case
 */
class ExerciseTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseTagsTable
     */
    public $ExerciseTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exercise_tags',
        'app.exercises',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ExerciseTags') ? [] : ['className' => ExerciseTagsTable::class];
        $this->ExerciseTags = TableRegistry::getTableLocator()->get('ExerciseTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExerciseTags);

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
