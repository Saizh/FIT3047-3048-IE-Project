<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CulturalNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CulturalNotesTable Test Case
 */
class CulturalNotesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CulturalNotesTable
     */
    public $CulturalNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cultural_notes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CulturalNotes') ? [] : ['className' => CulturalNotesTable::class];
        $this->CulturalNotes = TableRegistry::getTableLocator()->get('CulturalNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CulturalNotes);

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
