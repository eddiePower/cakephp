<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Couriers', 'Customers']
        ];
        $this->set('orders', $this->paginate($this->Orders));
        $this->set('_serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Couriers', 'Customers', 'OrderDetails']
        ]);
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add a new order method
     *
     * This is to let customers(users) start a new order and will probably be automated by the shopping cart
     * in all cases unless an admin user is generating an order manually.
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //create a new order entity in the database
        $order = $this->Orders->newEntity();
        
        //if the http request is of type post then
        if ($this->request->is('post')) 
        {
            //use the data in the add order form to update the new order Database entry
            $order = $this->Orders->patchEntity($order, $this->request->data);
            
            //if the order save process is a success
            if ($this->Orders->save($order)) 
            {
                //show user it worked and redirect them back to the order listing (will soon be only their orders listed)
                $this->Flash->success('The order has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else //else somthing went wrong so show user a sad face message
            {
                $this->Flash->error('The order could not be saved. Please, try again.');
            }
        }
        
        //get all couriers and customers ready for linking to this new order 
        //      (customer = orderie & courier = delivery choice by customer/user)
        $couriers = $this->Orders->Couriers->find('list', ['limit' => 200]);
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        
        //set the ViewVars for the view page add.
        $this->set(compact('order', 'couriers', 'customers'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            
            if ($this->Orders->save($order)) 
            {
                $this->Flash->success('The order has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The order could not be saved. Please, try again.');
            }
        }
        
        $couriers = $this->Orders->Couriers->find('list', ['limit' => 200]);
        $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        
        $this->set(compact('order', 'couriers', 'customers'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        
        if ($this->Orders->delete($order)) 
        {
            $this->Flash->success('The order has been deleted.');
        } 
        else 
        {
            $this->Flash->error('The order could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
