<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /*
        Function to filter out people who are not logged in
        unless they are on a specific page passed to Auth with 
        allow method
    */
    
    public function beforeFilter(Event $event)
    {
        //run the parent class check auth filter
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);  //before checking auth, allow visits to add users page or logout page.
    }
    

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        if(!$id)
        {
            throw new NotFoundException(__('Invalid user not found!! :('));
        }
    
        $user = $this->Users->get($id, [
            'contain' => ['Bookmarks']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) 
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
           
            if ($this->Users->save($user)) 
            {
                $this->Flash->success('The user has been saved.');
               
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        
        if ($this->Users->delete($user)) 
        {
            $this->Flash->success('The user has been deleted.');
        } 
        else 
        {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /* 
        Login Function
    */
    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            
            if($user)
            {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect please try again.');
        }
    }
    
    public function logout()
    {
        $this->Flash->success('You are now logged out');
        return $this->redirect($this->Auth->logout());
    }
    
}