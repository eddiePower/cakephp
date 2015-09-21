<?php
namespace App\Controller;

use App\Controller\AppController;

/*
 *   PurchaseDetailsController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class PurchaseDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchases', 'Items']
        ];
        $this->set('purchaseDetails', $this->paginate($this->PurchaseDetails));
        $this->set('_serialize', ['purchaseDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseDetail = $this->PurchaseDetails->get($id, [
            'contain' => ['Purchases', 'Items']
        ]);
        $this->set('purchaseDetail', $purchaseDetail);
        $this->set('_serialize', ['purchaseDetail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseDetail = $this->PurchaseDetails->newEntity();
        if ($this->request->is('post')) {
            $purchaseDetail = $this->PurchaseDetails->patchEntity($purchaseDetail, $this->request->data);
            if ($this->PurchaseDetails->save($purchaseDetail)) {
                $this->Flash->success('The purchase detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The purchase detail could not be saved. Please, try again.');
            }
        }
        $purchases = $this->PurchaseDetails->Purchases->find('list', ['limit' => 200]);
        $items = $this->PurchaseDetails->Items->find('list', ['limit' => 200]);
        $this->set(compact('purchaseDetail', 'purchases', 'items'));
        $this->set('_serialize', ['purchaseDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseDetail = $this->PurchaseDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseDetail = $this->PurchaseDetails->patchEntity($purchaseDetail, $this->request->data);
            if ($this->PurchaseDetails->save($purchaseDetail)) {
                $this->Flash->success('The purchase detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The purchase detail could not be saved. Please, try again.');
            }
        }
        $purchases = $this->PurchaseDetails->Purchases->find('list', ['limit' => 200]);
        $items = $this->PurchaseDetails->Items->find('list', ['limit' => 200]);
        $this->set(compact('purchaseDetail', 'purchases', 'items'));
        $this->set('_serialize', ['purchaseDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Detail id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseDetail = $this->PurchaseDetails->get($id);
        if ($this->PurchaseDetails->delete($purchaseDetail)) {
            $this->Flash->success('The purchase detail has been deleted.');
        } else {
            $this->Flash->error('The purchase detail could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
