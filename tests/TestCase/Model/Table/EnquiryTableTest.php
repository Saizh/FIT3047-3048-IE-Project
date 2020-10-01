<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnquiryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnquiryTable Test Case
 */
class EnquiryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EnquiryTable
     */
    public $Enquiry;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.enquiry'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Enquiry') ? [] : ['className' => EnquiryTable::class];
        $this->Enquiry = TableRegistry::getTableLocator()->get('Enquiry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Enquiry);

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
