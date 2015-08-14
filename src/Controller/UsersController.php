<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    
    
    public function beforeFilter(Event $event)
    {
       parent::beforeFilter($event);
    
       $this->Auth->allow(['add', 'resetPassword']);
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
     *                  Store the random string in the ysers db entry.                                -- Done
     *                  Build inline email with temp has and some message                              
     *                     with a link in it pointing to the edit userId password                     -- Done
     *                  After new password is hashed save it to the database for required user        -- Done
     *                  Send User to the Login page ready for new password to be used!                -- Done
     *
     *                              REMOVE THE STEPS ABOVE  & REMOVE DEBUG LINES BELOW!!!!
     */
     
    public function resetPassword()
    {
         //set this function to only run with data from a post request
        //$this->request->allowMethod(['post']);

        //check the form has been submitted
        if(isset($_POST['txtEmail']))
        {           
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
               //when we match on the right user data from our DB lookup
               if($user->email == $_POST['txtEmail'])
               {
                   //debug($user);
                   
                   //set the viewVariable to this userEmail.
                   $selectedUser = $user;
               }
               
           }//end foreach query result (should only be one in this case)
           
           
           if(isset($selectedUser))
           {
              
              
              //if the selectedUser data isSet then set the viewVar with this data else do nothing to prevent empty form submit.
              isset($selectedUser) ? $this->set('selectedUser', $selectedUser) : '';
 
              //Create new random HASHED String to send to user
              // for security and randomness i mixed older md5 with nice sha256 ;)
              $intermediateSalt = md5(uniqid(rand(), true));
              //set a temp string of 7 digits in length no decimal places
              $salt = substr($intermediateSalt, 0, 7);
              //now run random string through a 256bit sha encrypt  - maybe overkill?
              $randPassword = hash("sha256", $salt);
              
              //update the selectedUsers reset value from old to new.
              $selectedUser->reset = $randPassword;
                            
              //set the ViewVariable of the randomString  -- may be taken out after development!!!!!!!
              $this->set('tmpString', $randPassword);
              
              //Store temp HASH in user database  ~ may be session //
              
              //store the id of the user in question to save time.
              $id = $selectedUser->id;
              //debug($selectedUser);
               
              //Send email to customer with their new reset password hash
              
              //create email object and set email config settings
              $tempEmail = new Email('default');
              $tempEmail->transport('default');
              //set the type of email format and use our custom template.
              $tempEmail->emailFormat('html');
              $tempEmail->template('sendEmail');
              
              //set the email to send to
              $tempEmail->addTo($selectedUser->email);
              $tempEmail->subject('Solemate Password Reset');
              
              //Set the email headers.
              $tempEmail->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats inc']);
              $tempEmail->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
              $tempEmail->replyTo('solemate.doormats@gmail.com');
                                                
              $message = "Solemate Doormats Password Reset<br />You requested a password reset we would like you to click the link below to reset your login password, ";
              
              $fullUrl = Router::url(array('controller' => 'Users', 'action' => 'resetPassword', 'pwr' => $selectedUser->reset, 'id' => $selectedUser->id), true);           
              $message .= $fullUrl . "<br />If you did not request a new password or made a mistake requesting then please disregard this email";
              $message .= ".  Here at Solemate Doormats we keep our users passwords private even from the admins.  Feel free to drop us a email if";
              $message .= " you would like more information on your account security.";
              $message .= "<br />PRIVACY STATEMENT GOES HERE!!";
                  
              /*
                Use a custom query to save our new random string into the users db entry for checking 
                user email starts the password reset.
              */ 
              $query2 = TableRegistry::get('Users')->find();
              $query2->update('Users')
                      ->set(['reset' => $randPassword])
                      ->where(['id' => $id]);
              $stmt = $query2->execute();
              
              //May not be needed
              $tempEmail->viewVars(array('cust'=> $selectedUser));
                         
              //email message and send line
              $tempEmail->send($message);  
              
           }//END OF SELECTED USER IS SET CHECK.
           else
           {
               $this->Flash->error('This user email address was not found in our database.');
           }
           
        }//end of if user email form POST data is set check.     
        else if(isset($_GET['pwr']) && isset($_GET['id']))  //else if the get vaiables are set then pull user data
        {
           //set the user ID from get ID passed then lookup all users by that ID number.
           $id = $_GET['id'];
           $user = $this->Users->get($id, ['contain' => []]);
           
           //if the request is of type post, patch or put then
           if ($this->request->is(['patch', 'post', 'put'])) 
           {
                //set the new data to the current user in the user variable.
               $user = $this->Users->patchEntity($user, $this->request->data);
            
               //if the save of the user data(password) is successfull then
               if ($this->Users->save($user)) 
               {
                  $this->Flash->success('The user password has been changed.');
                  return $this->redirect(['action' => 'login']);
               } 
               else  //else tell user there was a issue with save.
               {
                  $this->Flash->error('The new password could not be saved. Please, try again.');
               }
          } //end of if request is patch,post,put
        
           //set the current user data as a viewVariable.
           $this->set(compact('user'));
           $this->set('_serialize', ['user']);
        
        }   //end of else if GET variables are set   
    }//end of resetPassword func
    
    //logout functionality using the AUTH cakePHP plugin.
    public function logout()
    {
       $this->Flash->success('Bye bye You\'re now logged out.');
       return $this->redirect($this->Auth->logout());
    }
    
}
