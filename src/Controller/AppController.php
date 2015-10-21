<?php
/*
 *   AppController.php by Eddie Power.
 *	 Team 18 - Heisenburg 
 *	 IE Project 2015.
 *	 Team Members: 
 *		User Documentation: Linc Lui
 *	    CSS3 & Javascript: Shash Amin
 * 	    CakePHP 3.X / DB : Eddie Power
 *	 Copyright 2015. Solemate Doormats
 *   
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\Core\Configure;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{                
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        
        
        //configure the date to australian format globally .
        Time::setToStringFormat('dd/MM/YYYY');
        
        Configure::write('orderRecievedEmail', 'eddie.power@icloud.com');

        
        //set up the AUTH componant to facilitate login.
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);
       
       
        //set the user role in the session for security check later on.
        $session = $this->request->session();
        $session->write('userRole', $this->Auth->user('role'));

        //this loads the nice tooltip messages for errors, confirms etc.
        $this->loadComponent('Flash');
        
        $this->loadComponent('Cookie', ['expiry' => '+2 days']);

    }
    
    
    function uploadFiles($folder, $formdata, $itemId = null)
    {
        //this function is called from add and edit actions of our Items Controller with the following method        
        
        //step one setup dir names both the absolute and relative urls
        //get the folders url and then store as the relative url
        $folder_url = WWW_ROOT.$folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if(!is_dir($folder_url))
        {
            mkdir($folder_url);
        }

        //debug($formdata);

        // if itemId is set create an item folder
        if($itemId)
        {
            // set new absolute folder
            $folder_url = WWW_ROOT.$folder.'/'.$itemId;
          
            // set new relative folder
            $rel_url = $folder.'/'.$itemId;
          
            // if there is no dir then create directory
            if(!is_dir($folder_url))
            {
                mkdir($folder_url);
            }
        }

        // list of permitted file types
        $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png', 'application/pdf');

        // replace spaces with underscores
        $filename = str_replace(' ', '_', $formdata['name']);
       
        // assume filetype is false
        $typeOK = false;
       
        // check filetype is ok
        foreach($permitted as $type)
        {
            if($type == $formdata['type'])
            {
                $typeOK = true;
                break;
            }
        }
        // if file type ok upload the file
        if($typeOK)
        {
            // switch based on error code
            switch($formdata['error'])
            {
                case 0:
                    
                    // create full filename
                    $full_url = $folder_url.'/'.$formdata['name'];
                    $url = $rel_url.'/'.$formdata['name'];
                    
                    // upload the file - overwrite existing file
                    $success = move_uploaded_file($formdata['tmp_name'], $url);

                    // if upload was successful
                    if($success)
                    {
                        //save the filename of the file
                        $result['urls'][] = $formdata['name'];
                    }
                    else
                    {
                        $result['errors'][] = "Error uploaded ". $formdata['name']. "Please try again.";
                    }
                    
                    break;
                case 3:
                    // an error occurred
                    $result['errors'][] = "Error uploading ".$formdata['name']." Please try again.";
                    break;
                default:
                    // an error occurred
                    $result['errors'][] = "System error uploading ".$formdata['name']. "Contact webmaster's.";
                    break;
            }
        }
        else if($formdata['error'] == 4)
        {
            // no file was selected for upload
            $result['nofiles'][] = "No file Selected";
        } 
        else
        {
            // unacceptable file type
            $result['errors'][] = $formdata['name']." cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }

        return $result;
}
    
    
    //this method allows the display method through to keep 
    // the Pages controller working
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display']);
    }  
}
