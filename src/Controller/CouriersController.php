<?php
namespace App\Controller;

use App\Controller\AppController;

/*
 *   CouriersController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class CouriersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('couriers', $this->paginate($this->Couriers));
        $this->set('_serialize', ['couriers']);
    }

    /**
     * View method
     *
     * @param string|null $id Courier id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        //create local variable and fill with results from courier select where id matches and contains orders
        $courier = $this->Couriers->get($id, [
            'contain' => ['Orders']
        ]);
        $this->set('courier', $courier);
        $this->set('_serialize', ['courier']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courier = $this->Couriers->newEntity();
        
        if ($this->request->is('post')) 
        {
            $courier = $this->Couriers->patchEntity($courier, $this->request->data);
            if ($this->Couriers->save($courier)) 
            {
                $this->Flash->success('The courier has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else 
            {
                $this->Flash->error('The courier could not be saved. Please, try again.');
            }
        }
        $this->set(compact('courier'));
        $this->set('_serialize', ['courier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Courier id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courier = $this->Couriers->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $courier = $this->Couriers->patchEntity($courier, $this->request->data);
            if ($this->Couriers->save($courier)) 
            {
                $this->Flash->success('The courier has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The courier could not be saved. Please, try again.');
            }
        }
        $this->set(compact('courier'));
        $this->set('_serialize', ['courier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Courier id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courier = $this->Couriers->get($id);
        
        if ($this->Couriers->delete($courier)) 
        {
            $this->Flash->success('The courier has been deleted.');
        } 
        else 
        {
            $this->Flash->error('The courier could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
