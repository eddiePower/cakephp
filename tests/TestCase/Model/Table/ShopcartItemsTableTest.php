<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopcartItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopcartItemsTable Test Case
 */
class ShopcartItemsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shopcart_items',
        'app.shopcart',
        'app.users',
        'app.customers',
        'app.orders',
        'app.couriers',
        'app.order_details',
        'app.items',
        'app.purchase_details',
        'app.purchases',
        'app.suppliers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShopcartItems') ? [] : ['className' => 'App\Model\Table\ShopcartItemsTable'];
        $this->ShopcartItems = TableRegistry::get('ShopcartItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopcartItems);

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
