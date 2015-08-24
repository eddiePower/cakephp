<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
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

        //debug("User name is " . $name . "\nAnd user role is " . $role);
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
    
        if ($this->request->is('post')) 
        {
            if (isset($this->request->data['Cancel'])) 
            {
                $this->Flash->error('Add Item cancelled', true);
                return $this->redirect(['action' => 'index']);
            }
        }
        
        $item = $this->Items->newEntity();
        
        if ($this->request->is('post')) 
        {
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
                debug("Debug line 2" . $this->request->data['photo']);
                $this->request->data['photo'] = null;
            }
            
            //If t            
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
