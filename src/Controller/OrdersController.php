<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\I18n\Time;
//used for sending email
use Cake\Network\Email\Email;
//used to generate app url no matter the server
use Cake\Routing\Router;
use Cake\Core\Configure;

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
    
       if($this->request->session()->read('userRole') == 'admin')
       {
          $this->paginate = [
              'contain' => ['Couriers', 'Customers']
          ];
          
          //set viewVars for all orders.
          $this->set('orders', $this->paginate($this->Orders));
          $this->set('_serialize', ['orders']);
       }
       else
       {
          //grab all orders from the model
          $allOrds = $this->Orders->find("all");
            
          //create space for just the logged in users Orders
          $userOrders = array();
          
          //loop through all orders
           foreach($allOrds as $aOrder)
           {
                //if the logged in user id matches the stored customer-user id 
                if($this->Auth->user('id') == $aOrder['user_id'])
                {
                   //debug($aOrder);
                   
                   //push the contents onto the userCustomers array
                   array_push($userOrders, $aOrder);
                } 
           }
           //debug($userOrders);
           
            $this->paginate = [
              'contain' => ['Couriers', 'Customers']
          ];
          
          //set viewVars for all orders.
          $this->set('orders', $userOrders);
          $this->set('_serialize', ['orders']);
        }         
           $this->set('userRole', $this->Auth->user('role'));         
           //Set a variable for use on the index view to show user name / email.
           $this->set('username', $this->Auth->user('username'));
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
        
        //debug($setUser);
        
        //make sure the logged in user is the one who owns this data
        // or if that user is an admin then were all cool to all show data.
        if($setID == $orderUserID || $setUser['role'] == 'admin')
        {
            $query = TableRegistry::get('OrderDetails')->find();
            $query->where(['order_id' => $id]);
            
            //array to store names of items in
            $itemNames = array();
            
             //loop through query result
           foreach($query as $detail)
           { 
                //show the item ID for the order details
               //debug($detail['item_id']);
               
               //now find that item id's item name
               $query1 = TableRegistry::get('Items')->find();
               $query1->where(['id' => $detail['item_id']]);
               
               //loop through the items found
               foreach($query1 as $item)
               {     
                   //debug($item);
                   //store item name and photo file name
                  $name = $item['item_name'];
                  $img = $item['photo'];
                  
                  //store the name and photo in the temp 
                  // array space for use in the view
                  //this is a lazy way of getting name and image inline.
                  $detail['itemName'] = $name;
                  $detail['itemPhoto'] = $img;
                  //debug($detail);
                  
                   //push the contents onto the userCustomers array
                   array_push($itemNames, $detail);
                   
                  //now store our edited array of the orderDetails
                  // into the order variable that will be pushed to
                  //the viewVar
                  $order->orderDetail = $itemNames;
                  
                 // debug($itemNames);
                 // debug($order);
                  
               }
               
               
               
           }//end foreach query result (should only be one in this case)  
           
            //set the rest of the viewVars that are not dependant on user or orderedItems
            $this->set('order', $order);
            $this->set('_serialize', ['order']);
        }
       /*
 else if($setUser['role'] == 'admin')
        {
          debug($itemNames);
                  debug($order);
            //show all orders for all users as were talking to a admin
            $this->set('order', $order);
            $this->set('_serialize', ['order']);
        }
*/
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
            
            //pre set the ordered_date and courier id as we are not including that this build.
            $order->ordered_date = date("Y-m-d");   
            $order->courier_id = ("1");
                          
            //set gged in user id as the order user id property
            $loggedUser = $this->request->session()->read('user');
            $order->user_id = $loggedUser['id'];
            
            if($this->request->session()->read('userRole') == 'user')
            {
                //grab the users customer ID to add to the order
                $query = TableRegistry::get('Customers')->find();
                $query->where(['user_id' => $order->user_id]);
                
                foreach($query as $orderCustomer)
                {
                    //set the ordering customer id as users ID
                    $order->customer_id = $orderCustomer['id'];
                }
                
            } //otherwise we show the drop down list and select the customer ID from there, allowing for 
              //  customer selection on order creation for, 
                          
            //if the order save process is a success
            if ($this->Orders->save($order)) 
            {
                //show user it worked and redirect them back to the order listing (will soon be only their orders listed)
                $this->Flash->success('The order has been placed in our system. Your order will be processed soon.');
                
                //send an email to rick letting him know that an order was placed.
                //Send email to customer with their new reset password hashed link/url
                //create email object and set email config settings
                $orderEmail = new Email('default');
                $orderEmail->transport('default');
                
                //set the type of email format and use our custom template.
                $orderEmail->emailFormat('html');
                $orderEmail->template('order_email');

                //set the email to send to
                $orderEmail->to(Configure::read('orderRecievedEmail'));
                $orderEmail->subject('Solemate Order has been placed on ' . date("Y-m-d"));
              
                //Set the email headers.
                $orderEmail->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats Web Orders']);
                $orderEmail->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
                $orderEmail->replyTo('solemate.doormats@gmail.com');
                
                                         
              //email message and send line
              $orderEmail->send('Hi there admin this is an automated email to let you know a new order has been placed on the website ordering system, the order id is ' . $order->id . '. The customer id was ' . $order->customer_id);  
                                
                
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
        
         //check if the user is a salesRep then just show only his customers.
        if($this->request->session()->read('userRole') == 'salesRep')
        {
             //grab all customers from the model
            //$allCusts = $this->Customers->find("all");
            
           $query = TableRegistry::get('Customers')->find("all");
            
            //create space for just the logged in users customers
            $repCustomers = array();
            
            //loop through all customers
           foreach($query as $aCust)
           {
                //if the logged in user id matches the stored customer-user id 
                if($this->Auth->user('id') == $aCust['user_id'])
                {
                   //debug($aCust);
                   //push the specific contents onto the customers array for display on add order view page.
                   array_push($repCustomers, array($aCust['id'] => $aCust['first_name'] . ' ' . $aCust['last_name']));
                } 
           }
           
           
           //now set the view variable as the users customers only.
           $customers = $repCustomers;
          
           
        }
        else if($this->request->session()->read('userRole') == 'admin')
        {
          $customers = $this->Orders->Customers->find('list', ['limit' => 200]);
        } 
         
         
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
    
        //configure the date for this method only .
        Time::setToStringFormat('YYYY-MM-dd');
    
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        
        //hard code the result for the courier since we ran out of time.
        //pre set the ordered_dates
        //$order->ordered_date = date("Y-m-d");   
        $order->courier_id = ("1");
        
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            
            if ($this->Orders->save($order)) 
            {
                //show the user that the order was updated
                $this->Flash->success('The order has been saved.');
                
                //send email to rick to let him know an order has been changed, one line email call.
                
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
