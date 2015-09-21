<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/*
 *   OrdersController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
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
       //Set a var with logged in user data
        $setUser = $this->request->session()->read('user');
        //set the loggedin user ID as a var
        $setID = $setUser['id'];
       
       //pull up the order for the id requested.
       $order = $this->Orders->get($id, [
            'contain' => ['Couriers', 'Customers', 'OrderDetails']
        ]);
        //store the user ID for the order requested
        $orderUserID = $order->customer->user_id;
        //debug($order->customer->user_id);
        
        //make sure the logged in user is the one who owns this data
        // or if that user is an admin then were all cool to all show data.
        if($setID == $orderUserID)
        {
            $query = TableRegistry::get('OrderDetails')->find();
            $query->where(['order_id' => $id]);
            
            //array to store names of items in
            $itemNames = array();
            
             //loop through query result
           foreach($query as $detail)
           { 
                //show the item ID for the order details
               debug($detail);
               
               
           }//end foreach query result (should only be one in this case)  
        
            $this->set('orderedItems', $itemNames);
            $this->set('order', $order);
            $this->set('_serialize', ['order']);
        }
        else if($setUser['role'] == 'admin')
        {
            //show all orders for all users as were talking to a admin
            $this->set('order', $order);
            $this->set('_serialize', ['order']);
        }
        else
        {
            $this->Flash->error("Page is not authorised for viewing, please contact an administrator if you feel this is an error.");
            
            //return the user back to their view page from their stored session userID
            return $this->redirect(['action' => 'index']);
        }
        
        
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
            
            //pre set the ordered_dates
            $order->ordered_date = date("Y-m-d");   
            $order->courier_id = ("1");
            
              
            //if the order save process is a success
            if ($this->Orders->save($order)) 
            {
                //show user it worked and redirect them back to the order listing (will soon be only their orders listed)
                $this->Flash->success('The order has been placed in our system.');
                
                return $this->redirect(['action' => 'index']);
            } 
            else //else somthing went wrong so show user a sad face message
            {
                $this->Flash->error('The order could not be saved. Please, try again.');
            }
        }
        

         //get all couriers and customers ready for linking to this new order 
         //(customer = orderie & courier = delivery choice by customer/user)
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
