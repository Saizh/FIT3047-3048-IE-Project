<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserUnitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserUnitsTable Test Case
 */
class UserUnitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserUnitsTable
     */
    public $UserUnits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_units',
        'app.units',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserUnits') ? [] : ['className' => UserUnitsTable::class];
        $this->UserUnits = TableRegistry::getTableLocator()->get('UserUnits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserUnits);

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
