<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/*
 *   ItemsController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class ItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('items', $this->paginate($this->Items));
        $this->set('_serialize', ['items']);
        
        //SESSION TESTING.
        //create a test variables from the session array that is set on login & index actions.
        $name = $this->request->session()->read('username');
        $role = $this->request->session()->read('userrole');

        $aUser = $this->request->session()->read('user');
        $this->set('aUser', $aUser);
        
        $userCart = TableRegistry::get('Shopcart');

        // Start a new query.
        $query = $userCart->find();
        $query->where(['user_id' => $aUser['id']]);
        
        foreach ($query as $cart) 
        {
            $this->set('userCartID', $cart->id);
            //debug($cart->id);
        }
                
        
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['OrderDetails', 'PurchaseDetails']
        ]);
        
        $this->set('item', $item);
        $this->set('_serialize', ['item']);
        
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {    
        $item = $this->Items->newEntity();
    
        if ($this->request->is('post')) 
        {

            if (isset($this->request->data['Cancel']))
            {
                $this->Flash->error('Add Item was cancelled');
                return $this->redirect(['action' => 'index']);
            }
            //upload image if user has selected one
            //calls uploadFiles function in AppController.php
            $fileOK = $this->uploadFiles('img/graphics', $this->request->data['photo']);
            
            //debug("Debug line " . $this->request->data['photo']['name']);

            if(array_key_exists('urls', $fileOK))
            {
                $this->request->data['photo'] = $fileOK['urls'][0];
            }
            else
            {
                //debug("Debug line 2" . $this->request->data['photo']);
                $this->request->data['photo'] = null;
            }
                    
            $item = $this->Items->patchEntity($item, $this->request->data);
            
            if ($this->Items->save($item)) 
            {
                $this->Flash->success('The item has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The item could not be saved. Please, try again.');
            }
        }
        
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            if (isset($this->request->data['Cancel']))
            {
                $this->Flash->error('Edit Item was cancelled', true);
                return $this->redirect(['action' => 'index']);
            }

            $currentImage = $item['photo'];

            //upload the image via upload method in app controller (used to make available for whole app)
            $fileOK = $this->uploadFiles('img/graphics', $this->request->data['photo']);
            
            if(array_key_exists('urls', $fileOK))
            {
                $this->request->data['photo'] = $fileOK['urls'][0];
            }
            else
            {
                $this->request->data['photo'] = $currentImage;
            }
            
            $item = $this->Items->patchEntity($item, $this->request->data);
            
            if ($this->Items->save($item)) 
            {
                $this->Flash->success('The item has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The item could not be saved. Please, try again.');
            }
        }
        $this->set(compact('item'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        
        if ($this->Items->delete($item)) 
        {
            $this->Flash->success('The item has been deleted.');
        } 
        else 
        {
            $this->Flash->error('The item could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
