<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassUnitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassUnitsTable Test Case
 */
class ClassUnitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassUnitsTable
     */
    public $ClassUnits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.class_units',
        'app.class',
        'app.units'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ClassUnits') ? [] : ['className' => ClassUnitsTable::class];
        $this->ClassUnits = TableRegistry::getTableLocator()->get('ClassUnits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClassUnits);

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
