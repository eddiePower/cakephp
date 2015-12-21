<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;  //used for db table queries
use Cake\Routing\Router;  //used to generate full urls
use Cake\Core\Configure;  //used to store and retrieve global data.
use Cake\Network\Email\Email;  //used for sending email
/*
 *   ShopcartController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class ShopcartController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        
        if($this->request->session()->read('userRole') == 'admin')
        {
           $this->set('shopcart', $this->paginate($this->Shopcart));
           $this->set('_serialize', ['shopcart']);
        }
        else  //MAY CHANGE THIS TO IF NOT ADMIN GO TO THE VIEW OF ANY CART SPACE.
        {
           //store the current logged in user session var
           $loggedUser = $this->request->session()->read('user');
           
           //run sql on shopcart to get user's carts
           $query = TableRegistry::get('Shopcart')->find();
           $query->where(['user_id' => $loggedUser['id']]);
           
           
           //find the users cart and run the view cart func with the cart_id
           foreach($query as $uCart)
           {
              //debug($uCart);
              $id = $uCart['id'];
              return $this->redirect(['action' => 'view', $id]);            

           }
        }
    }

    /**
     * View method
     *
     * @param string|null $id Shopcart id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopcart = $this->Shopcart->get($id, [
            'contain' => ['Users', 'Items']
        ]);
        $this->set('shopcart', $shopcart);
        $this->set('_serialize', ['shopcart']);
        
        //create a var to store the cart total in
        $cTotal = 0.00;
        
        //for every item calculate its base cost * no ordered and
        // add it to the running total.
        foreach($shopcart['items'] as $item)
        {
            //debug($item->base_price);
            //debug($item['_joinData']['quantity']);
            $cTotal += ($item->base_price * $item['_joinData']['quantity']);
            //debug($cTotal);     

        }
        
        //add GST to value;
        $auTax = $cTotal / 10;
        
        //send viewVars of total and AU Tax to the view page
        $this->set('cartTotal', $cTotal);
        $this->set('gst', $auTax);

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     *    Use:  used to creat a new shopping cart for users, this is normally
     *          ran automatically from the login function and creates a space for
     *          items to be saved as cartItems by a seperate controller.
     */
    public function add()
    {
                
        $aUser = $this->request->session()->read('user');
        
        //store the user id to autoset the users shopping cart.
        $usersID = $aUser['id'];
        
        $shopcart = $this->Shopcart->newEntity();

        $shopcart->user_id = $usersID;  
        //debug($shopcart);
        
        if ($this->Shopcart->save($shopcart)) 
        {
            //$this->Flash->success(__('The shopcart has been saved.'));
            return $this->redirect(['controller' => 'Items', 'action' => 'index']);
        } 
        else 
        {
            $this->Flash->error(__('The shopcart could not be saved. Please, try again.'));
        }
        
        $users = $this->Shopcart->Users->find('list', ['limit' => 200]);
        $items = $this->Shopcart->Items->find('list', ['limit' => 200]);
        
        $this->set(compact('shopcart', 'users', 'items'));
        $this->set('_serialize', ['shopcart']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shopcart id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopcart = $this->Shopcart->get($id, [
            'contain' => ['Items']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
           
           // debug($id);
           // debug($this->request->data['quantity']);
           
            $shopcart = $this->Shopcart->patchEntity($shopcart, $this->request->data);            
            
            if ($this->Shopcart->save($shopcart)) 
            {
                $this->Flash->success(__('Your shopping Cart has been updated.'));
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error(__('The shopcart could not be saved. Please, try again.'));
            }
        }
        
        $users = $this->Shopcart->Users->find('list', ['limit' => 200]);
        $items = $this->Shopcart->Items->find('list', ['limit' => 200]);
        $this->set(compact('shopcart', 'users', 'items'));
        $this->set('_serialize', ['shopcart']);
    }

    /**
     * Delete shoppingCart method
     *
     * @param string|null $id Shopcart id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $shopcart = $this->Shopcart->get($id);
        
        if ($this->Shopcart->delete($shopcart)) 
        {
            $this->Flash->success(__('The shopping cart has been deleted.'));
        } 
        else 
        {
            $this->Flash->error(__('The shopping cart could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['controller' => 'Items', 'action' => 'index']);
    }
    
    public function checkout($id = null)
    {
        //grab the shopping cart,
        $shopcart = $this->Shopcart->get($id, [
            'contain' => ['Users', 'Items']
        ]);
        
        //add items to an array
        //debug($shopcart['items']);
        
        if(isset($shopcart['items']))
        {  
        
            if($this->request->is(array('post', 'put'))) 
            {
               
               //either send data to add order and add order items,
               //load order and orderDetails model for use here              
               $this->loadmodel('Orders');
               $this->loadmodel('OrderDetails');
               
               
               $ordersTable = TableRegistry::get('Orders');
               $order = $ordersTable->newEntity();
               
               //pre set the ordered_date and courier id as we are not including that this build.
               $order->ordered_date = date("Y-m-d");   
               $order->courier_id = ("1");
            
               //set gged in user id as the order user id property
               $loggedUser = $this->request->session()->read('user');
               $order->user_id = $loggedUser['id'];
               
               //get and set the customer id for the logged in user.
               $query = TableRegistry::get('Customers')->find();
               $query->where(['user_id' => $loggedUser['id']]); 
               
               //find the users cart and run the view cart func with the cart_id
               foreach($query as $aCust)
               {
                  //debug($uCart);
                  $custID = $aCust['id'];
                  $OrderingCustomer = $aCust;     
               }
               
               $order->customer_id = $custID;
               $order->customer_comments = "Ordered by User: " . $loggedUser['username'] . " from the Solemate shopping cart system.";
               $order->required_date = date("Y-m-d");
               
               if ($ordersTable->save($order)) 
               {
                   // The $article entity contains the id now
                   $orderID = $order->id;
               }
               else
               {
                   //display error flash message for order did not save
               }
               
               
               $orderTotal = 0;
               
                //debug($orderID);
                //now create order_Details for each item in the cart.
                foreach($shopcart['items'] as $orderedItem)
                {
                    //debug($orderedItem);
                    
                    //create a orderDetail for each of the ordered Items
                    $orderDetailsTable = TableRegistry::get('OrderDetails');
                    $orderDetail = $orderDetailsTable->newEntity();
                    
                    //set the new entity's properties from our cart list
                    $orderDetail->item_id = $orderedItem['id'];
                    $orderDetail->order_id = $orderID;
                    $orderDetail->quantity_ordered = $orderedItem['_joinData']['quantity'];
                    $orderDetail->per_unit = $orderedItem['base_price'];
                    $orderDetail->discount = 0.00;
                    
                    //set a orderTotal for use in email data.
                    $orderTotal += ($orderDetail->per_unit * $orderDetail->quantity_ordered);
                    //Add GST TO TOTAL
                    $orderTotal += ($orderTotal / 10);
                    
                    //debug($orderDetail);
                    
                    //now save the orderDetail to the database
                    if ($orderDetailsTable->save($orderDetail)) 
                    {
                       //do nothing
                    }//end of if orderDetail saved ok check
                    else
                    {
                        //display error flash message for order detail did not save
                    }
                    
                }//end of for loop to store every item in the shop cart


               //choose to send email for new orders from here as well. with item list, customer details,
               //send an email to rick letting him know that an order was placed.
               //Send email to customer with their new reset password hashed link/url
               //create email object and set email config settings
               ShopcartController::_generateEmails($loggedUser, $OrderingCustomer, $orderTotal, $order, $shopcart['items']);
                
               //empty the shopping cart via the dbase.
               //run sql on shopcart to get user's carts
               $query = TableRegistry::get('Shopcart')->find();
               $query->where(['user_id' => $loggedUser['id']]);
               
               //now we will remove all items from this cart.
               //find the users cart and run the view cart func with the cart_id
               foreach($query as $uCart)
               {
                  // debug($uCart);
                   $id = $uCart['id'];
                   
                   //save time delete cart
                   $result = $this->Shopcart->delete($uCart);
                   
                   //create new cart for user as we did in login  
                   //***NOTE TO DEV's This is bad practice as it runs a new db query every order and
                   //    will run the id value for cart id's way up high very quickly, if possible work out
                   // how to change this to remove each and every cart item.
                  
                   //create a new database entity 
                   $cart = $this->Shopcart->newEntity();
                  
                   //store the userID into the shopping cart to tie it to 
                   // logged in user.
                   $cart->user_id = $loggedUser['id'];                 
                  
                   //now save this shopping cart to the database for later use.
                   $this->Shopcart->save($cart);  

               }
               
               //Now Set Flash message addition and redirect the users if need be this may happen from the order placement.
               $this->Flash->success('Your order has been placed and we will contact you with payment process / invoice');
               
               //redirect the successfull users back to their order history page.... MAY CHANGE THIS TO OTHER PAGE
              return $this->redirect(['controller' => 'Orders', 'action' => 'index']); 

           } //end of is the request a post or put request.
        }//end is there any items check
        
        //set some ViewVars for the checkout view page.
        $this->set('shopcart', $shopcart);
        $this->set('_serialize', ['shopcart']);
    

    }
    
    
    private function _generateEmails($loggedUser = null, $OrderingCustomer = null, $orderTotal = null, $order = null, $shopcart = null)
    {
                //choose to send email for new orders from here as well. with item list, customer details,
               //send an email to rick letting him know that an order was placed.
                //Send email to customer with their new reset password hashed link/url
                //create email object and set email config settings
                $orderEmail = new Email('default');
                $orderEmail->transport('default');
                
                //set the type of email format and use our custom template.
                $orderEmail->emailFormat('html');
                $orderEmail->template('order_email');
              
                //Set the email headers.
                $orderEmail->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats Web Orders']);
                $orderEmail->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
                $orderEmail->replyTo('solemate.doormats@gmail.com');
                
                $fullOrderUrl = Router::url(array('controller' => 'Orders', 'action' => 'view', $order->id), true);                    

                
                //send the administrator order created email with listing of items, weights, totals etc
                //set the email to send to
                $orderEmail->to(Configure::read('orderRecievedEmail'));
                $orderEmail->subject('Solemate Order has been placed on ' . date("Y-m-d"));
                
                
                $message = "<table id='orderEmailTable' style='border: 1'><tr><th>Item Name</th><th>Item Cost (per Unit)</th><th>Base Weight (per Unit)</th>";
                $message .= "<th>Total Wieght Ordered</th><th>Number of Bales</th></tr>";

                
                foreach($shopcart as $item)
                {
                   $message .= "<tr><td>" . $item['item_name'] . "</td>"
                    . "<td>" . $item['base_price'] . "</td><td>" . $item['matt_weight'];
                   $message .= "</td><td>" . h(($item['matt_weight'] * $item['_joinData']['quantity'])) . "</td><td>" . h(($item['_joinData']['quantity'] / $item['matt_bale_count'])) . "</td>";
                }
                $message .= "</tr></table>";
               
                //send email with body message of
                $orderEmail->send('Hi there Solemate Admin, this is an automated email to let you know a new order has been placed on the website ordering system,' 
                  . ' the order id is ' . $order->id . '. The customer placing the order was ' . $OrderingCustomer['first_name'] . ' ' . $OrderingCustomer['last_name'] 
                  . ', and was placed by the user: ' . $loggedUser['username'] . ' who has the role of ' . $this->request->session()->read('userRole') . ' user type. '
                  . ' The url to view to this order is <a href="' . $fullOrderUrl . '">'. $OrderingCustomer['first_name'] . ' ' . $OrderingCustomer['last_name'] 
                  .'\'s New Order</a> you will need to log in if you have not already done so recently. The invoice total will be (inc GST)$' . $orderTotal . '<br />'
                  . $message);
              
                  
                //set the email touser letting them know of their order items and total.
                $orderEmail1 = new Email('default');
                $orderEmail1->transport('default');
                
                //set the type of email format and use our custom template.
                $orderEmail1->emailFormat('html');
                $orderEmail1->template('order_email');
              
                //Set the email headers.
                $orderEmail1->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats Web Orders']);
                $orderEmail1->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
                $orderEmail1->replyTo('solemate.doormats@gmail.com');
                
                $orderEmail1->to($loggedUser['email']);
                $orderEmail1->subject('Your Solemate Order was placed on ' . date("Y-m-d"));
                
                //send email with body message of
                $orderEmail1->send('Hi there ' . $loggedUser['username'] . ', this is an automated email to let you know your order has been placed on the Solemate ordering system and our sales team will be in touch with the invoice and payment details.' 
                  . '<br />Order id is ' . $order->id . ', and was placed by the user: ' . $loggedUser['username'] . ' who has the role of ' . $this->request->session()->read('userRole') . ' user type. '
                  . ' The url to view to view details of this order is <a href="' . $fullOrderUrl . '">'. $OrderingCustomer['first_name'] . ' ' . $OrderingCustomer['last_name'] 
                  .'\'s New Order</a> you will need to log in if you have not already done so recently. The invoice total will be (inc GST)' . $orderTotal . '.');
                  
                  return true;
                  
    } //end of private function

}
