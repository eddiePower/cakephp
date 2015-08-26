<?php
namespace App\Controller;

use App\Controller\AppController;

class ShoppingCartsController extends AppController
{
    
    public function index()
    {
        
    }
    
    public function addItem($id = null)
    {
        //get the item id and pull details from db
        $item = $this->Items->get($id, ['contain' => []]);
        
        //add items to the shopCart array in the session 
        $this->request->session()->write('shoppingCart[]', $item);
        
        debug("The session is now holding item " . $this->request->session()->read('shoppingCart'));
        
    }
    
    public function removeItem($id = null)
    {
        
    }
    
    public function checkoutCart($id = null)
    {
        
    }
    
    
    /*
    
        //Will be added when the shopping cart is working in its 
        // simple form of just a session cart destroyed when user logs out.
        
        
        public function saveShopCart($id = null)
        {
        
        
        }
        
        
    */
    
    
}