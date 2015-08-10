<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

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
              $this->Flash->success('You are now being logged in.');
              
              return $this->redirect($this->Auth->redirectUrl());
           }
           
           $this->Flash->error('Your username or password is incorrect. Please Try again');
        }
    }
    
     /**
     * Reset Password method
     *
     * @param string|null $id User id.
     * @return void Redirects to password reset page.
     * @throws \Cake\Network\Exception\NotFoundException When user record not found.
     *
     * @description This is ran when the user clicks on the reset password
     *  link to generate a new password by entering their email address
     *    that they registered with, this ensures the user owns the account 
     *   they are resetting the password on and also that they cant intercept the
     *   sent password.
     *
     *
     *   FUNCTION BREAK DOWN:
     *                  Grab user email from form filled out by user                                  -- Done
     *                  Pull the related User from database                                           -- Done
     *                  Generate a temp PW_HASH to send to user                                       -- Done
     *                  Build inline email with temp has and some message                              
     *                     with a link in it pointing to the edit userId password                     -- 
     *                  After new password is hashed save it to the database for required user        -- 
     *                  Send User to the Login page ready for new password to be used!                -- 
     */
     
    public function resetPassword()
    {
         //set this function to only run with data from a post request
        $this->request->allowMethod(['post']);


        //check the form has been submitted
        if(isset($_POST['txtEmail']))
        {
   
           //set the users email to the POST data from the form.
           //$email = $this->request->data;
           
           /*
               Build a custom SQL query object to find all users and 
               filter that to the user whos email matches the form data
               on the reset password form.
           */
           $query = TableRegistry::get('Users')->find();
           $query->where(['email' => $_POST['txtEmail']]);
           
           //loop through query result
           foreach($query as $user)
           {
               //when we match on the user data where looking for
               if($user->email == $_POST['txtEmail'])
               {
                   //debug($user);
                   
                   //set the viewVariable to this userEmail.
                   $selectedUser = $user;
               }
               
           }//end foreach query result (should only be one in this case)
           
           //if the selectedUser data isSet then set the viewVar with this data else do nothing to prevent empty form submit.
           isset($selectedUser) ? $this->set('selectedUser', $selectedUser): '';
           
           //debug($selectedUser);
           //debug($email); 
           
           //Create new random HASHED String to send to user
           // for security and randomness i mixed older md5 with nice sha256 ;)
           $intermediateSalt = md5(uniqid(rand(), true));
           $salt = substr($intermediateSalt, 0, 7);
           $randPassword = hash("sha256", $salt);
         
           //debug("My random string is " . $randPassword);
           $this->set('tmpString', $randPassword);
         
           //Store temp HASH in user database  ~ may be session
         
         
         
           //Send email to customer with their new reset password hash
         
         
         
           //Send user to the edit user password page for their ID number.
           
           
           
        }//end of if user email form POST data is set check.
        
        
         
         
         
        
    }//end of resetPassword func
    
    
    
    public function beforeFilter(Event $event)
    {
       parent::beforeFilter($event);
    
       $this->Auth->allow(['add', 'resetPassword']);
    }
    
    //logout
    public function logout()
    {
       $this->Flash->success('Bye bye You\'re now logged out.');
       return $this->redirect($this->Auth->logout());
    }
    
}
