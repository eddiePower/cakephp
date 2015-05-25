<?php
namespace App\Controller;

use App\Controller\AppController;

//add the email library or what ever cakephp calls them
use Cake\Network\Email\Email;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
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
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('customers', $this->paginate($this->Customers));
        $this->set('_serialize', ['customers']);
        
        //Set a variable for use on the index view to show user name / email.
        $this->set('username', $this->Auth->user('email'));
        
        //If the user is a admin then we will allow all bookmarks to show up
        if($this->Auth->user('role') == 'admin')
        {  
           //set a variable to dispaly user role admin in this case
           $this->set('userRole', $this->Auth->user('role'));
        }
        else
        {
            //set a variable to dispaly user role - users
           $this->set('userRole', $this->Auth->user('role'));
        }
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
        $customer = $this->Customers->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
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
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success('The customer has been deleted.');
        } else {
            $this->Flash->error('The customer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }


    /**
     * sendEmail method
     *
     * @param string|null $id Customer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    
    public function buildEmails()
    {
        $testEmail = $this->Auth->user('email');

     
        //validate the email composition form for sending, make sure the emails are seperated by commas.
        if(isset($_POST['message']) && isset($_POST['emails']))
        {
           //set some local variables to build and send the email
           $myMessage = $_POST['message'];
           $mySubject = $_POST['subject'];
           $aEmail = $_POST['emails'];
/*            $aBCC = $_POST['bcc']; */
           
           //debug($aEmail);
           
           //set the passed customer id in view variable called customer
           $this->set('testMessage', $myMessage);
           
           $emailArray = array();
           $emailList = array();
           
           //set the array emailArray by the string passed from the post info above.
           $emailArray = explode(" ", $aEmail);
           
           //loop through the email list passed and create for sending to cake Mail object below.
           foreach($emailArray as $email)
           { 

              $emailList[] = $email;
           }
           
           //debug($emailList);
                   
           //now set the viewVar for the email array passed from the index page of customers.
           $this->set('emails', implode(", ", $emailList));
         
           //now send an email as we know the form was filled out.
           $email = new Email('default');
           // Use a named transport already configured using Email::configTransport()
           $email->from(['solemateDoormats@doNotReply.com' => 'Solemate Debuger'])
                 ->to($emailList)
                 ->subject($mySubject)
                 ->send($myMessage . ' And the list of customer emails to send was ' . $aEmail . " And was sent by the user " . $testEmail);
        }        
        
    }

}
