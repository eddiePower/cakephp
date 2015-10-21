<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/*
 *   ShopcartItemsController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class ShopcartItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Shopcart', 'Items']
        ];
        $this->set('shopcartItems', $this->paginate($this->ShopcartItems));
        $this->set('_serialize', ['shopcartItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Shopcart Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopcartItem = $this->ShopcartItems->get($id, [
            'contain' => ['Shopcart', 'Items']
        ]);
        $this->set('shopcartItem', $shopcartItem);
        $this->set('_serialize', ['shopcartItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($uId = null, $itemID = null)
    {   
        

        //debug($uId);
        //debug($itemID);
        
        //if the 2 passed in variables are not = to null then
        //we will pull up item image, name and display this to
        //the user with a input for quantity when this form is
        //submitted to this method then we will store that data
        // into the users cart item space with a quantity as well.
        
        if($uId != null && $itemID != null)
        {
            //pull out all item data for this item
            $aQuery = TableRegistry::get('Items')->find();
            $aQuery->where(['id' => $itemID]);
            $theItem;
            
            foreach($aQuery as $item)
            {
                //debug($item);
                $theItem = $item;
            }
            
            //now we have all the relavant item data we export some 
            //to the add item view like image, name and qty
            $this->set('itemPic', $item->photo);
            $this->set('itemName', $item->item_name);
            $this->set('itemCost', $item->base_price); 
            $this->set('itemID', $itemID); 
            
            
        }
        
        
        
        //if the add item form has been submitted then we want to add this item to the users
        //shopcart Items storage space, this will add it to the users shopping cart space.
        if(isset($_POST['QtyToOrder']) && $_POST['QtyToOrder'] != '')
        {
            //debug("The qty ordered is now " . $_POST['QtyToOrder']);
            
            
           //create empty database entity
           $shopcartItem = $this->ShopcartItems->newEntity();
           
           //debug($shopcartItem);
           $query = TableRegistry::get('Shopcart')->find();
           $query->where(['user_id' => $uId]);
           $aCart;
           
            //loop through query result
            foreach($query as $cart)
            {
               $aCart = $cart;
               //debug($aCart);  
            }  
           
           //if the request sent is of type post
           if ($this->request->is(['patch', 'post', 'put'])) 
           {
               //set the shopcartItems to the data in the form
               //debug($this->request->data);
               //set the shopping cart ID to the users cart ID;
          
               $shopcartItem->user_id = $uId;
               $shopcartItem->item_id = $itemID;
               $shopcartItem->quantity = $_POST['QtyToOrder'];
               $shopcartItem->shopcart_id = $aCart->id;
               
               //debug($shopcartItem);
                       
               //if the shopcartItem save is ok
               if ($this->ShopcartItems->save($shopcartItem)) 
               {
                   $this->Flash->success(__('The item has been added to your cart.'));
                   
                   return $this->redirect(['controller' => 'items', 'action' => 'index']);
                   
               }
               else 
               {
                   $this->Flash->error(__('The shopcart item could not be saved. Please, try again.'));
               }
           }
           
           $shopcart = $this->ShopcartItems->Shopcart->find('list', ['limit' => 200]);
           $items = $this->ShopcartItems->Items->find('list', ['limit' => 200]);
           $this->set(compact('shopcartItem', 'shopcart', 'items'));
           $this->set('_serialize', ['shopcartItem']);
               
               
        }//end of if post vars are set.
        
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Shopcart Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopcartItem = $this->ShopcartItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopcartItem = $this->ShopcartItems->patchEntity($shopcartItem, $this->request->data);
            if ($this->ShopcartItems->save($shopcartItem)) {
                $this->Flash->success(__('The shopcart item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shopcart item could not be saved. Please, try again.'));
            }
        }
        $shopcart = $this->ShopcartItems->Shopcart->find('list', ['limit' => 200]);
        $items = $this->ShopcartItems->Items->find('list', ['limit' => 200]);
        $this->set(compact('shopcartItem', 'shopcart', 'items'));
        $this->set('_serialize', ['shopcartItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shopcart Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $shopcartItem = $this->ShopcartItems->get($id);
        
        if ($this->ShopcartItems->delete($shopcartItem)) 
        {
            $this->Flash->success(__('The shopcart item has been deleted.'));
        } 
        else 
        {
            $this->Flash->error(__('The shopcart item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Items', 'action' => 'index']);
    }
}












