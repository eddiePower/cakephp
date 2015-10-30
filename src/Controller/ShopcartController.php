<?php
namespace App\Controller;

use App\Controller\AppController;
//used for db table queries
use Cake\ORM\TableRegistry;
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
            $shopcart = $this->Shopcart->patchEntity($shopcart, $this->request->data);
            
            if ($this->Shopcart->save($shopcart)) 
            {
                $this->Flash->success(__('The shopcart has been saved.'));
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
        debug($shopcart['items']);
        
        
        // calculate and show the cost for this order,
        
        //either send data to add order and add order items,
        
        // or create an order and orderDetails objects and populate them from here.
        
        //calculate the order total by adding up the item base prices and make note that 
        
        //set some ViewVars for the checkout view page.
        $this->set('shopcart', $shopcart);
        $this->set('_serialize', ['shopcart']);
    

    }
    
    
}
