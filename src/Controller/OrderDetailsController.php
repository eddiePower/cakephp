<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderDetails Controller
 *
 * @property \App\Model\Table\OrderDetailsTable $OrderDetails
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
        $orderDetail = $this->OrderDetails->newEntity();
        if ($this->request->is('post')) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->data);
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success('The order detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The order detail could not be saved. Please, try again.');
            }
        }
        $items = $this->OrderDetails->Items->find('list', ['limit' => 200]);
        $orders = $this->OrderDetails->Orders->find('list', ['limit' => 200]);
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderDetail = $this->OrderDetails->patchEntity($orderDetail, $this->request->data);
            if ($this->OrderDetails->save($orderDetail)) {
                $this->Flash->success('The order detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
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
        if ($this->OrderDetails->delete($orderDetail)) {
            $this->Flash->success('The order detail has been deleted.');
        } else {
            $this->Flash->error('The order detail could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
