<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/*
 *   OrderDetailsController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class OrderDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items', 'Orders']
        ];
        $this->set('orderDetails', $this->paginate($this->OrderDetails));
        $this->set('_serialize', ['orderDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Order Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => ['Items', 'Orders']
        ]);
        $this->set('orderDetail', $orderDetail);
        $this->set('_serialize', ['orderDetail']);

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //create a new database entity in the OrderDetails table
        $orderDetail = $this->OrderDetails->newEntity();
        
        //if the http_request is a post then
        if ($this->request->is('post')) 
        {
            /*
             *  Eddies Check Warehoused Quantity and update Warehouse stock levels.
             * this area of the logic is used to check the current levels of the selected item to ensure the
             * amount required is available for the client, if not ask the user would the like to backOrder(Ricks requested feature)
             *  or would they like to change the amount to a lower value
             * next We will update the item quantity on hand level to deduct the ordered amount and store that new value in Dbase.
             * 
            */
          
            //Check the current qty of the item selected and if the onHandQty - order qty is not a negative number
            // on all items in orderDetails then add the orderdetail
            $orderedItemID = $this->request->data['item_id'];
            
            if(isset($orderedItemID))
            {
                //debug($orderedItemID);

                //lookup item details for quantity on hand in warehouse                
                $query = TableRegistry::get('Items')->find();
                $query->where(['id' => $orderedItemID]);
                
                
                //loop through query result
                foreach($query as $orderedItem)
                {
                   //debug($orderedItem->base_price);  
                   //store this items price as the orderedItems price.
                   $orderDetail->per_unit = $orderedItem->base_price;
                   //debug($orderDetail->per_unit);
                   
                }//end foreach query result (should only be one in this case)           
           
                //add ajax to this call!!
                $this->set('stockPrice', $orderDetail->per_unit);
                
                //store the new item quantity in the warehouse by subtracting the quantity ordered.                
                $newQtyOnHand = $orderedItem->quantity_on_hand - $this->request->data['quantity_ordered'];
                
                 //check that the ordered amount of this item can be filled
                //check the newQtyOnHand is a positive number i.e < 0 = error or backorder at later date.
                if($newQtyOnHand < 0)
                {
                    //do some warning about stock not bieng available and return to previous page
                    $this->Flash->error('This Item does not have enough stock at this time,');
                    
                    //this will stop the rest of the function running in case of values at or below 0
                    return $this->redirect(['action' => 'add']);
                    
                    //future entry point for prompt user to backorder goods,
                    
                    //if user selects yes to backorder then email rick
                    
                }
                else if($newQtyOnHand == 0)
                {
                    //!!!!!!!!!!!!!email Rick to let him know the item is now out of stock
                    
                    //save the new stock levels to the items table.
                    $query2 = TableRegistry::get('Items')->find();
                    $query2->update('Items')
                      ->set(['quantity_on_hand' => $newQtyOnHand])
                      ->where(['id' => $orderedItemID]);
                    $stmt = $query2->execute();
                    
                    //go forward with creating the order
                    
                }
                else
                {
                    //no problems with order so continue adding this item
                    
                    //save the new stock levels to the items table.
                    $query2 = TableRegistry::get('Items')->find();
                    $query2->update('Items')
                      ->set(['quantity_on_hand' => $newQtyOnHand])
                      ->where(['id' => $orderedItemID]);
                    $stmt = $query2->execute();
                    
                    //go forward with creating the order
                    
                   
                    
                }
                    
                //store the new orderDetails from the data entered in the addOrderDetail form
                $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->data);
                
                
                //debug($orderDetail);
                //if the save of the new entity in database works then
                if ($this->OrderDetails->save($orderDetail)) 
                {
                    //flash the yay message and redirect back to list of all orderDetails
                    $this->Flash->success('The order detail has been saved.');
                    return $this->redirect(['action' => 'index']);
                } 
                else 
                {
                    //otherwise use the sad face message.
                    $this->Flash->error('The order detail could not be saved. Please, try again.');
                }
                
            }
            
            
            
        }
        
        //pull out all the items linked to the orderDetails 
        $items = $this->OrderDetails->Items->find('list', ['limit' => 200]);
        
        //pull out all the Orders linked to orderDetails
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        
        //set some viewVars from the above details for use on the view files (*.ctp)
        $this->set(compact('orderDetail', 'items', 'orders'));
        $this->set('_serialize', ['orderDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $orderDetail = $this->OrderDetails->get($id, [
            'contain' => []
        ]);
        
        //we need to store the current qty ordered and compare this before save to
        // adjust stock + or - accordingly
        $currentQtyOrdered = $orderDetail->quantity_ordered;
        //debug($currentQtyOrdered);
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            //manipulate the item stock levels or qty_on_hand in Items table.
             //first store the new qtyOrdered value
             $newQtyOrdered = $this->request->data['quantity_ordered'];
             //debug($newQtyOrdered);
             
             //now compare the two values
             //if the new(edited) quantity to be ordered is > the old qty to be ordered
             //then we need to subtract more from the qty on hand in warehouse.
             if($newQtyOrdered > $currentQtyOrdered)
             {
                 //subtract the difference in the two amounts to be deducted to the warehouse stock levels.
                 $updatedQtyOnHand = $newQtyOrdered - $currentQtyOrdered;
                // debug($updatedQtyOnHand);
                 
                 //now update the database or qty on hand in warehouse by subtracting the updatedQtyOnHand
                 $myQuery = TableRegistry::get('Items')->find();
                 $myQuery->where(['id' => $orderDetail->item_id]);
                 
                //debug($orderDetail->item_id);
                
                foreach($myQuery as $item)
                {
                   // debug($item);
                }
                
                //store the new warehouse(database) qty_on_hand value
                $finalQtyOnHand = $item->quantity_on_hand - $updatedQtyOnHand;
                //debug($finalQtyOnHand);
               
                //better check that the new order qty is not going to break the warehouse stock levels
                //if the soon to be updated stock levels will go below 0 then warn user
                if($finalQtyOnHand < 0)
                {
                    //flash the yay message and redirect back to list of all orderDetails
                    $this->Flash->error('The new order detail quantity is too high for our current stock levels, sorry please try again.');
                    
                    return $this->redirect(['action' => 'edit', $id]);
                    
                    //entry point to check with user for a back order deal-e-o
                    
                }
               
                //send the new value to the database.
                //save the new stock levels to the items table.
                $query = TableRegistry::get('Items')->find();
                $query->update('Items')
                       ->set(['quantity_on_hand' => $finalQtyOnHand])
                       ->where(['id' => $item->id]);
                $stmt = $query->execute();
                 
             }
             //else if the edited qty to be ordered is less then the previous amount then add it back 
             // to the stock or qty_on_hand in the warehouse(database)
             else if($newQtyOrdered < $currentQtyOrdered)
             {
                 //subtract the difference in the two amounts to be deducted to the warehouse stock levels.
                 $updatedQtyOnHand = $currentQtyOrdered - $newQtyOrdered;
                 //debug($updatedQtyOnHand);
                 
                 //now update the database or qty on hand in warehouse by subtracting the updatedQtyOnHand
                 $myQuery = TableRegistry::get('Items')->find();
                 $myQuery->where(['id' => $orderDetail->item_id]);
                 
                //debug($orderDetail->item_id);
                
                foreach($myQuery as $item)
                {
                   // debug($item);
                }
                
                //store the new warehouse(database) qty_on_hand value
                $finalQtyOnHand = $item->quantity_on_hand + $updatedQtyOnHand;
                //debug($finalQtyOnHand);
               
                //send the new value to the database.
                //save the new stock levels to the items table.
                $query = TableRegistry::get('Items')->find();
                $query->update('Items')
                       ->set(['quantity_on_hand' => $finalQtyOnHand])
                       ->where(['id' => $item->id]);
                $stmt = $query->execute();
             } 
        
            //save the new edited orderDetail data in the edit form
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->data);
            
            //if the orderDetail edit is saved successfully
            if ($this->OrderDetails->save($orderDetail)) 
            {
                //give the user the pat on the head message and return them to detail page.
                $this->Flash->success('The order detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The order detail could not be saved. Please, try again.');
            }
        }
        
        $items = $this->OrderDetails->Items->find('list', ['limit' => 200]);
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
        
        $this->set(compact('orderDetail', 'items', 'orders'));
        $this->set('_serialize', ['orderDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Detail id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $orderDetail = $this->OrderDetails->get($id);
        
        //add back the qty_ordered to the warehouse stock levels by getting the item
        // from the database and adding the value to its current levels
        
        //now update the database or qty on hand in warehouse by subtracting the updatedQtyOnHand
        $myQuery = TableRegistry::get('Items')->find();
        $myQuery->where(['id' => $orderDetail->item_id]);
         
        //debug($orderDetail->item_id);
        
        foreach($myQuery as $item)
        {
           // debug($item);
        }
        
        //we now have current warehouse level in $item and amount to add to it in $orderDetail
        // or newStock = 0 + 300 = saved to database 
        $newStockLevel = $item->quantity_on_hand + $orderDetail->quantity_ordered;
        //send the new value to the database.
        //save the new stock levels to the items table.
        $query = TableRegistry::get('Items')->find();
        $query->update('Items')
               ->set(['quantity_on_hand' => $newStockLevel])
               ->where(['id' => $item->id]);
        $stmt = $query->execute();
        
        //now run the delete on the orderDetails and all is right with the world and warehouse stock levels.
        if ($this->OrderDetails->delete($orderDetail)) 
        {
            $this->Flash->success('The order detail has been deleted.');
        } 
        else 
        {
            $this->Flash->error('The order detail could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
