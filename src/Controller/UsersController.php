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

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);              
        
        //Set a variable for use on the index view to show user name / email.
        $this->set('username', $this->Auth->user('email')); 
        
        //set a variable to dispaly user role admin in this case
        $this->set('userRole', $this->Auth->user('role'));
        
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
        if (!$id) 
        {
            throw new NotFoundException(__('Invalid user'));
        }
        
        $user = $this->Users->get($id, [
            'contain' => ['Customers']
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
    
    //login / AUTH functions
    public function login()
    {
        if ($this->request->is('post')) 
        {
           $user = $this->Auth->identify();
            
            //if a user exists then
           if ($user) 
           {
              //set the user for the AUTH componant
              $this->Auth->setUser($user);
              
              return $this->redirect($this->Auth->redirectUrl());
           }
           
           $this->Flash->error('Your username or password is incorrect. Please Try again');
        }
    }
    
    
    public function beforeFilter(Event $event)
    {
       parent::beforeFilter($event);
    
       $this->Auth->allow(['add']);
    }
    
    //logout
    public function logout()
    {
       $this->Flash->success('Bye bye You\'re now logged out.');
       return $this->redirect($this->Auth->logout());
    }
    
}
