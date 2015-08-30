<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ShopcartController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ShopcartController Test Case
 */
class ShopcartControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
