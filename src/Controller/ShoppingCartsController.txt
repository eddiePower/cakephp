<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

class ShoppingCartsController extends AppController
{
    
    public function index()
    {
              
    }
    
    public function addItem($id = null)
    {    
        //Get the item details for the selected Item.
        $query = TableRegistry::get('Items')->find();
        $query->where(['id' => $id]);
        
        //loop through query result
        foreach($query as $item)
        {
          //debug($item);
          $selectedItem = $item;
        }
   
        if(!isset($_SESSION['shoppingCart']))
        {
        
            $this->request->session()->write('shoppingCart', array($selectedItem->id));
            debug($_SESSION['shoppingCart']);
        }
        else
        {
            if (array_search($selectedItem->id, $_SESSION['shoppingCart'])) 
            {
               debug("selected Item " . $selectedItem->id);
            }
            
            array_push($_SESSION['shoppingCart'], $selectedItem->id);
            debug($_SESSION['shoppingCart']);
        }

   
    }
    
    public function removeItem($id = null)
    {
        //try somthing like this may be send the array index of item not itemID.
        unset($_SERVER['shoppingCart'][$id]);
    }
    
    
    public function checkoutCart($id = null)
    {
        
    }
    
    
    /*
    
        //Will be added when the shopping cart is working in its 
        // simple form of just a session cart destroyed when user logs out.
        
        
        public function saveShopCart($id = null)
        {
            //add the cart to the shoppingCart table  -- UserId, CartID
            
            
            
            //add all items to cart_items table -- cart ID & itemIDs
        }
        
        
    */
    
    
}