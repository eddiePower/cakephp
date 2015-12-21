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
            
            //declare this here to persist outside of scope of foreach
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
               //debug($cart);  
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
               
                //debug($aCart);               
                
                //before we save the cart item, we need to check the cartItems for the users cart.
                //to do this we need to find the users cart by sql with user id
                    //debug($shopcartItem);
                    $query = TableRegistry::get('Shopcart')->find();
                    $query->where(['user_id' => $uId]);
                    $tmpCart;
                    
                    //loop through cart for user query result
                    foreach($query as $cart)
                    {
                       $tmpCart = $cart;
                       //debug($tmpCart['id']);  
                    } 

                //next we will pull all items for that cart id and store in an array,
                $query = TableRegistry::get('ShopcartItems')->find();
                $query->where(['shopcart_id' => $tmpCart['id']]);
                
                $tmpItems = array();
                
                //loop through query result
                foreach($query as $cartItem)
                {
                   //add the item from the cart to our items array for checking
                   //if the new item is already in the cart.                   
                   array_push($tmpItems, $cartItem);
                   //debug($cartItem);  
                } 
                
                //loop over the current items in the cart, splitting them into searchable indexes.
                foreach ($tmpItems as $key => $val)
                {
                    //if the value in the item_id matches the one we are trying to add
                    //then we dont want to duplicate it, just update the qty ordered.
                    if($val['item_id'] == $itemID)
                    {
                       //store the new or updated qty to write to the database
                       $newQty = ($val['quantity'] + $_POST['QtyToOrder']);
                        
                       //store the shopping cart item id number for easy updates
                       $tmpID = $val['id'];
                        
                       //Use a custom query to save our new quantity ordered into the shoppingCartItem db entry 
                       
                       $query2 = TableRegistry::get('Shopcart_Items')->find();
                       $query2->update('Shopcart_Items')
                               ->set(['quantity' => $newQty])
                               ->where(['id' => $tmpID]);
                       $stmt = $query2->execute();
                                                
                        //if success re direct back to items page with success message.
                        $this->Flash->success(__('The Item quantity has been updated.'));

                        return $this->redirect(['controller' => 'Shopcart', 'action' => 'index']);                        
                    }
                }         
                       
               //if the code progresses this far then we check shopcartItem save is ok
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
        
        
        //get the item details for this shop cart item
        //pull out all item data for this item
        $query = TableRegistry::get('Items')->find();
        $query->where(['id' => $shopcartItem['item_id']]);
        
        //create an array to store data in
        $itemDetail = array();
        
        //now loop through the one item found at this id
        foreach($query as $aItem)
        {
            //debug($aItem);
           //push the contents onto the item details array
           array_push($itemDetail, $aItem);
           
           //debug($itemDetail);
        }
        
        //set the viewVar of the itemDetail Array for use on edit page
        $this->set('itemDetails', $itemDetail);
        
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $shopcartItem = $this->ShopcartItems->patchEntity($shopcartItem, $this->request->data);
            
            if ($this->ShopcartItems->save($shopcartItem)) 
            {
                $this->Flash->success(__('The shopcart item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error(__('The shopcart item could not be saved. Please, try again.'));
            }
        }
        
        $shopcart = $this->ShopcartItems->Shopcart->find('list', ['limit' => 200]);
        
        $shopcartItem = $this->ShopcartItems->find('list', ['limit' => 200]);
        
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
        //as long as this function is called via a post or delete call go on.
        $this->request->allowMethod(['post', 'delete']);
        
        //grab out our cart item from the dbase.
        $shopcartItem = $this->ShopcartItems->get($id);
        
        //store cart id this item came from so we can go back
        // to the cart view.
        
        $query = TableRegistry::get('Items')->find();
        $query->where(['id' => $shopcartItem['item_id']]);
        
        $item;
        
        foreach($query as $aItem)
        {
            //debug($aItem);
            $item = $aItem;
        }
        
        $cartID = $shopcartItem['shopcart_id'];
        $tmpName = $item['item_name'];
        
        //debug($item);
        
        if ($this->ShopcartItems->delete($shopcartItem)) 
        {
            $this->Flash->success(__('The item: <b><i>'. $tmpName . '</b></i> has been removed from your cart.'));
        } 
        else 
        {
            $this->Flash->error(__('The shopcart item could not be deleted. Please, try again.'));
        }
        
        //now return to the cart view that we deleted this item rom
        return $this->redirect(['controller' => 'Shopcart', 'action' => 'view', $cartID]);
    }
}












