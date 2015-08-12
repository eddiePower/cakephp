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
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
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
                    $customerList[$list] = $cust->first_name.' '.$cust->last_name;
                    $email->addTo($cust->email);
                    
                    //set the type of email format and use our custom template.
                    $email->emailFormat('html');
                    $email->template('sendEmail');
                }//end of if checkbox is checked loop
                
                //store this customer data into our viewVar array
                $allUsers[] = $cust;
                    
            }//end foreach checkbox loop
            
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
                    $custTo .= $customer . "<br />";

                }
                
                //!!!!!NEEDS TO BE Rendered on the View *.ctp file !!!!!!!!!
                $this->Flash->success('Your email was successfully sent.');
                
                //If the email is sent succesfully redirect back to the main customer page.
                return $this->redirect(['controller' => 'Customers', 'action' => 'index']);

            }
            catch(Exception $e)
            {
                $this->Flash->error('Error sending email. ' . $e->getMessage());
            }           
        }//end request is post / put checking if loop        
    }
}
