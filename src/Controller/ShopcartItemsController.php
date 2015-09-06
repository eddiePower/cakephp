<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShopcartItems Controller
 *
 * @property \App\Model\Table\ShopcartItemsTable $ShopcartItems
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
    public function add()
    {
        $shopcartItem = $this->ShopcartItems->newEntity();
        if ($this->request->is('post')) {
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
        if ($this->ShopcartItems->delete($shopcartItem)) {
            $this->Flash->success(__('The shopcart item has been deleted.'));
        } else {
            $this->Flash->error(__('The shopcart item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
