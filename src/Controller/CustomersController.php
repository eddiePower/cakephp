<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
//add the email library or what ever cakephp calls them
use Cake\Network\Email\Email;

/*
 *   CustomersController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
class CustomersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        if($this->request->session()->read('userRole') == 'admin')
        {
           $this->paginate = [
               'contain' => ['Users']
               ];
           
           
           $this->set('customers', $this->paginate($this->Customers));           
           $this->set('_serialize', ['customers']);
           
           //Set a variable for use on the index view to show user name / email.
           $this->set('username', $this->Auth->user('username'));  
           //Set a var with logged in user data
           $setUser = $this->request->session()->read('user');
           //set the loggedin user ID as a var
           $setID = $setUser['id'];
           
        }
        //else is user and should only see customer data linked to them.
        else
        {
            //grab all customers from the model
            $allCusts = $this->Customers->find("all");
            
            //create space for just the logged in users customers
            $userCustomers = array();
            
            //loop through all customers
           foreach($allCusts as $aCust)
           {
                //if the logged in user id matches the stored customer-user id 
                if($this->Auth->user('id') == $aCust['user_id'])
                {
                   //debug($aCust);
                   //push the contents onto the userCustomers array
                   array_push($userCustomers, $aCust);
                } 
           }
           //debug($userCustomers);
           
           $this->paginate = [
               'contain' => ['Users']
               ];
           
           //now set the view variable as the users customers only.
           $this->set('customers', $userCustomers);
           
           $this->set('_serialize', ['customers']);
           

        }         
           $this->set('userRole', $this->Auth->user('role'));         
           //Set a variable for use on the index view to show user name / email.
           $this->set('username', $this->Auth->user('username'));      
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
    
       //if the ID is not found then throw a red page error of user not found, may swap it out to a 
       // flash error message and a redirect
       if (!$id) 
       {
           throw new NotFoundException(__('Invalid user'));
       }
    
       //Set a var with logged in user data
       $setUser = $this->request->session()->read('user');
       $userRole = $this->request->session()->read('userRole');
       $this->set('userRole', $userRole);         

       //set the loggedin user ID as a var
       $setID = $setUser['id'];
       
       $customer = $this->Customers->get($id, [
            'contain' => ['Users']
       ]);
       
       
       //if the user id is the same as customer user id or their role is an admin.
       if($customer['user_id'] == $setID || $setUser['role'] == 'admin')
       {
           $this->set('customer', $customer);
           $this->set('_serialize', ['customer']);   
       }
       else
       {
           $this->Flash->error("Your not allowed to view other users customer data. Contact admin if you feel this is incorrect.");
           return $this->redirect(['action' => 'index']);
       }
     
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        
        //Set a var with logged in user data
        $setUser = $this->request->session()->read('user');
        $userRole = $this->request->session()->read('userRole');
        $this->set('userRole', $userRole);         

        //set the loggedin user ID as a var
        $setID = $setUser['id'];
        //debug($customer);
        
        $query = $this->Customers->find('all')
                    ->where(['user_id' => $setID]);
        $results = $query->toArray();
        
/*         debug(sizeof($results)); */
        
        //if the user role is of type user and they already have a customer 
        // set then dont allow them to add another, 
        //!!!!CAN ADD A LIMIT ON SALES REPS HERE AS WELL IF NEED BE!!!!
        if(sizeof($results) == 1 && $userRole == 'user')
        {
            $this->Flash->error('You can only have one set of customer data, please edit your info on edit customer page, if you need a sales rep status please contact solemate admin staff.');
            return $this->redirect(['action' => 'index']);
        }
        
        //if the user is not a admin then set the user id as the new customer
        // id and run check on view side to show / hide the selector of users.
        if($this->request->session()->read('userRole') != 'admin')
        {
            $customer->user_id = $setID;
        }
        //else show user create customer data which has the user id pre-set to their id.
        
        if ($this->request->is('post')) 
        {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) 
            {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The customer could not be saved. Please, try again.');
            }
        }
        
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'users'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
                
        //Set a var with logged in user data
        $setUser = $this->request->session()->read('user');
        $userRole = $this->request->session()->read('userRole');
        $this->set('userRole', $userRole);         

        //set the loggedin user ID as a var
        $setID = $setUser['id'];
        
        //if user logged in id is not the same as customer user id to be edited
        // and they are not an admin then kick them back out to index
        if($customer->user_id != $setID && $userRole != 'admin')
        {
            //error
            $this->Flash->error("You can only edit your own customer details, if you feel this is an incorrect please contact solemate staff.");
            //redirect
            return $this->redirect(['action' => 'index']);
            
        }

        //otherwise run the edit on the customer
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            
            if ($this->Customers->save($customer)) 
            {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error('The customer could not be saved. Please, try again.');
            }
        }
        
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
       
        $this->set(compact('customer', 'users'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //set some working vars
        //first we need the user to get the id from
        $setUser = $this->request->session()->read('user');
        $setID = $setUser['id'];
        //next the customer to be deleted again for checks and if ok then deletion.
        $customer = $this->Customers->get($id);

        //check if the customer to delete's user id is not = to logged in user & userRole is not a admin
        // re direct user away from page as this is not allowd
        if($customer->user_id != $setID && $this->request->session()->read('userRole') != 'admin')
        {
            //error
            $this->Flash->error("You can only remove your own customer details, if you feel this is an incorrect please contact solemate staff.");
            //redirect
            return $this->redirect(['action' => 'index']);
            
        }
        else  // else go on with the deletion as we know either they are a admin or its their own customer data.
        {
          $this->request->allowMethod(['post', 'delete']);
        
           if ($this->Customers->delete($customer)) 
           {
               $this->Flash->success('The customer has been deleted.');
           } 
           else 
           {
               $this->Flash->error('The customer could not be deleted. Please, try again.');
           }
           
           return $this->redirect(['action' => 'index']);
        }
    }


    /**
     * sendEmail method
     *
     * @param string|null $id Customer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     *
     * This function is built from Janet Fraiser's example site "Buckemoff Horses" on 
     *  the monash IE development server, it is used to build an email to one or many
     * customers in the Solemate Doormat's database.
     */
    
    public function buildEmails()
    {
        //Set a variable for use on the index view to show user name / email.
           $this->set('username', $this->Auth->user('username'));  
           //Set a var with logged in user data
           $setUser = $this->request->session()->read('user');
           //set the loggedin user ID as a var
           $setID = $setUser['id'];
           $userRole = $this->request->session()->read('userRole');
           
           if($userRole != 'admin')
           {
               $this->Flash->error("Were sorry your not authorised to view this page, please contact admin if you feel this is incorrect.");
               return $this->redirect(['action' => 'index']);
           }
        
        
        $this->set("customers", $this->Customers->find("all", ['order' => 'last_name ASC']));
        
        //create the viewVar array to be populated and sent via emails
        $allUsers = array();
        
        $custTo = "<br />";
        $customerList = array();
        
        //create email object and set email config settings
        $email = new Email('default');
        $email->transport('default');
        
        if ($this->request->is('post') || $this->request->is('put'))
        {
            $list = 0;
            
            foreach($this->request->data['Email']['checkbox'] as $id=>$checked)
            {
                if ($checked)
                {
                    $list++;
                    $cust = $this->Customers->get($id, ['contain' => []]);
                    $customerList[$list] = $cust->first_name . ' ' . $cust->last_name;
                    
/*
                    //add the checked customers to the email list.
                    $email->addTo($cust->email);
*/
                    
                    //store this customer data into our viewVar array
                    array_push($allUsers, $cust);
                    //debug($allUsers);
                }//end of if checkbox is checked loop

                    
            }//end foreach checkbox loop
            
            
            //set the type of email format and use our custom template.
            $email->emailFormat('html');
            $email->template('sendEmail');
              
              
            //loop through all customers sending the same email but with a 
            // custom heading by a for loop setting viewVar and sending the email
            
            foreach($allUsers as $custToSendTo)
            {
            
                //set the email to send to as this customer for this loop iteration
                //add the checked customers to the email list.
                $email->to($custToSendTo['email']);
                    
                   //grab the user data who we are sending too.
                   $query = TableRegistry::get('Users')->find();
                   $query->where(['id' => $custToSendTo['user_id']]);
           
                   //loop through query result
                    foreach($query as $user)
                    {
                    
                        //debug($user);
                        //when we match on the right user data from our DB lookup
                        if($user->id == $custToSendTo['user_id'])
                        {
                            //set the viewVariable to this user data  --
                            //  may limit the data sent for security soon.
                            $userDetails = $user;
                        }    
                     }//end foreach query result (should only be one in this case) 
            
            
                //now send all our view vars over in the array $allUsers.
                $email->viewVars(['cust' => $custToSendTo]);
                $email->viewVars(['user' => $userDetails]);
                
                //Set the email headers.
                $email->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats inc']);
                $email->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
                $email->replyTo('solemate.doormats@gmail.com');
                
                //Begin the email building from the data provided in the form.
                $email->subject($this->request->data['subject']);
                
                try
                {
                    //Grab the main body of the email to be sent in the form.
                    $email->send($this->request->data['message']);
                                        
                    /*
//loop through selected customers for showing in send to field of form.
                    foreach ($customerList as $customer)
                    {
                        //print the customer names in the list above the email message
                        $custTo .= $customer . "<br />";
                    
                    }
*/
                    
                }
                catch(Exception $e)
                {
                    //$this->Flash->error('Error sending email. ' . $e->getMessage());
                }
                    
                    
            }
                  
                  
                  
                  
           /*
 //now send all our view vars over in the array $allUsers.
            $email->viewVars(array('cust' => $allUsers));
            
            //Set the email headers.
            $email->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats inc']);
            $email->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
            $email->replyTo('solemate.doormats@gmail.com');
            
            //Begin the email building from the data provided in the form.
            $email->subject($this->request->data['subject']);
            
            try
            {
                //Grab the main body of the email to be sent in the form.
                $email->send($this->request->data['message']);
                
                foreach ($customerList as $customer)
                {
                    //print the customer names in the list above the email message
                    $custTo .= $customer . "<br />";

                }
                
                $this->Flash->success('Your email was successfully sent.');
                
                //If the email is sent succesfully redirect back to the main customer page.
                return $this->redirect(['controller' => 'Customers', 'action' => 'index']);
              
            }
            catch(Exception $e)
            {
                $this->Flash->error('Error sending email. ' . $e->getMessage());
            }
*/           
            
            
            
            
            
            
            if(isset($e))
            {
                $this->Flash->error('Error sending email. ' . $e->getMessage());
            }
            else
            {
              $this->Flash->success('Your email was successfully sent.');
                
              //If the email is sent succesfully redirect back to the main customer page.
              return $this->redirect(['controller' => 'Customers', 'action' => 'index']);   
            }
           
            
            
        }//end request is post / put checking if loop        
    }
}
