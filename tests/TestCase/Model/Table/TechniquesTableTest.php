<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TechniquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TechniquesTable Test Case
 */
class TechniquesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TechniquesTable
     */
    public $Techniques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.techniques'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Techniques') ? [] : ['className' => TechniquesTable::class];
        $this->Techniques = TableRegistry::getTableLocator()->get('Techniques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Techniques);

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
