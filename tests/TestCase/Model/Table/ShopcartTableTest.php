<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopcartTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopcartTable Test Case
 */
class ShopcartTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shopcart',
        'app.users',
        'app.customers',
        'app.orders',
        'app.couriers',
        'app.order_details',
        'app.items',
        'app.purchase_details',
        'app.purchases',
        'app.suppliers',
        'app.shopcart_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shopcart') ? [] : ['className' => 'App\Model\Table\ShopcartTable'];
        $this->Shopcart = TableRegistry::get('Shopcart', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shopcart);

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
