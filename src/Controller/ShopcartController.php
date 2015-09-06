<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Shopcart Controller
 *
 * @property \App\Model\Table\ShopcartTable $Shopcart
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
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopcart = $this->Shopcart->newEntity();
        
        if ($this->request->is('post')) 
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopcart = $this->Shopcart->patchEntity($shopcart, $this->request->data);
            if ($this->Shopcart->save($shopcart)) {
                $this->Flash->success(__('The shopcart has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The shopcart could not be saved. Please, try again.'));
            }
        }
        $users = $this->Shopcart->Users->find('list', ['limit' => 200]);
        $items = $this->Shopcart->Items->find('list', ['limit' => 200]);
        $this->set(compact('shopcart', 'users', 'items'));
        $this->set('_serialize', ['shopcart']);
    }

    /**
     * Delete method
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
            $this->Flash->success(__('The shopcart has been deleted.'));
        } 
        else 
        {
            $this->Flash->error(__('The shopcart could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
