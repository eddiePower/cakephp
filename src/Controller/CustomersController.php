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
           //set a variable to display user role admin in this case
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
        $this->set("customers", $this->Customers->find("all", ['order' => 'last_name ASC']));
        $toList = array();
        $custTo="<br />";
        $lstCustomers = array();
        
        $email = new Email('default');
        $email->transport('default');
        
        if ($this->request->is('post') || $this->request->is('put'))
        {
            $list=0;
            foreach($this->request->data['Email']['checkbox'] as $id=>$checked)
            {
                if ($checked)
                {
                    $list++;
                    $cust = $this->Customers->get($id, ['contain' => []]);
                    $lstCustomers[$list] = $cust->first_name.' '.$cust->last_name;
                    $email->addTo($cust->email);
                    $email->viewVars(array('cust'=>$cust));
                    
                    //maybe change this to shashs template if no html.
                    $email->emailFormat('html');
                    $email->template('sendEmail');
                }//end of if checkbox is checked loop
            }//end foreach checkbox loop
            
            $email->from(['solemateDoormats@doNotReply.com' => 'Solemate Doormats inc']);
            $email->sender(['solemate.doormats@gmail.com' => 'Solemate Doormats inc']);
            $email->replyTo('solemate.doormats@gmail.com');
            
            $email->subject($this->request->data['subject']);
            
            try
            {
                $email->send($this->request->data['message']);
                
                foreach ($lstCustomers as $customer)
                {
                    $custTo .= $customer."<br />";

                }
                
                $this->Flash->success('Your email was successfully sent.');

            }
            catch(Exception $e)
            {
                $this->Flash->error('Error sending email. ' . $e->getMessage());
            }

            
            
        }//end request is post / put checking if loop
        
        
    }
        

}
