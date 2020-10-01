<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseNotesTable Test Case
 */
class ExerciseNotesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseNotesTable
     */
    public $ExerciseNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exercise_notes',
        'app.users',
        'app.exercises'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ExerciseNotes') ? [] : ['className' => ExerciseNotesTable::class];
        $this->ExerciseNotes = TableRegistry::getTableLocator()->get('ExerciseNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExerciseNotes);

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
