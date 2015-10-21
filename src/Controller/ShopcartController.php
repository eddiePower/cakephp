<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $this->set('shopcart', $this->paginate($this->Shopcart));
        $this->set('_serialize', ['shopcart']);
        
        
        
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
        
        //set a viewVar for the items in the cart being viewed.
        // this saves space and time rather then each display 
        //having $shopcart.'shopcartItems' every line
        
        //$this->set('cartItems', $shopcart);        

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
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
        
        // calculate and show the cost for this order,
        
        //either send data to add order and add order items,
        
        // or create an order and orderDetails objects and populate them from here.
        
        //calculate the order total by adding up the item base prices and make note that 
        
        //set some ViewVars for the checkout view page.
        $this->set('shopcart', $shopcart);
        $this->set('_serialize', ['shopcart']);
    

    }
    
    
}
