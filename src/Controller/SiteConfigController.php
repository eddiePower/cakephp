<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Network\Session;
use App\Controller\AppController;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class SiteConfigController extends AppController
{

    /*
        used to display a full list of admin config options
         these may be things like user control, theme(site css) control,
         
    */
    public function index()
    {
        //Set a variable for use on the index view to show user name / email.
        $this->set('username', $this->Auth->user('email')); 
        
        //set a variable to dispaly user role admin in this case
        $this->set('userRole', $this->Auth->user('role'));  
        
        //SESSION TESTING.
        //create a test variable from the session variable
        $cssName = $this->request->session()->read('currentCSS');
        $this->set('cssName', $this->request->session()->read('currentCSS'));
        
       // debug($cssName);
        
        
        
              
        
        
    }
    
    //used to view a specific setting up close
    public function view()
    {
        //get the setting name
        
        //pull the current setting back for admin review
        
        //add links to goto that setting area.
        
    }
    
    public function setTheme()
    {
        
        //show the users a list of current css page names or themese like xmass theme.
        
        if($cssSelector == 1)
        {
            
        }
        //get the users selectiong of the new css file
        
        
        //activate the new css file by running the $this->Html->css([$cssNewName])
        
        
        //return user back to the siteConfig index.

        
        
    }

}