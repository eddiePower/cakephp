<?php

/*
 *   ArticlesController.php by Eddie Power.
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

use App\Controller\AppController;

class ArticlesController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $this->set('articles', $this->Articles->find('all', array(
    'order' => array('created' => 'DESC') // Sorts by putting the latest post on the top
    )), $this->paginate($this->Articles));

        $this->set('_serialize', ['articles']);     
           
        //Set a variable for use on the index view to show user name / email.
        $this->set('username', $this->Auth->user('username')); 
                
        //set a variable to display user role admin in this case
        $this->set('userRole', $this->Auth->user('role'));
    }

    public function view($id)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
        
        //set a variable to dispaly user role admin in this case
        $this->set('userRole', $this->Auth->user('role'));
    }

    public function add()
    {
        //check the user type is allowed to post news articles (Admin Only!!)
        if($this->Auth->user('role') == 'admin')
        {   
            if ($this->request->is('post')) 
            {
                if (isset($this->request->data['Cancel'])) 
                {
                   $this->Flash->error('Add News Post cancelled', true);
                   return $this->redirect(['action' => 'index']);
                }    
            } 
            
            if ($this->request->is('post')) 
            {
                
                $article = $this->Articles->newEntity();             
                $article = $this->Articles->patchEntity($article, $this->request->data);
                
                if ($this->Articles->save($article)) 
                {
                    $this->Flash->success(__('Your article has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                
                $this->Flash->error(__('Unable to add your article.'));
            }
        }
        else  // else redirect them with error message telling them NO!
        {
            $this->Flash->error(__('Your not allowed to post news'));
            return $this->redirect(['action' => 'index']);
        }        
    }
    
    public function edit($id = null)
    {
        //check the authorised user type is allowed to post news articles (Admin Only!!)
        if($this->Auth->user('role') == 'admin')
        {  
           $article = $this->Articles->get($id);

           if ($this->request->is(['post', 'put'])) 
           {                              
              if (isset($this->request->data['cancel'])) 
              {
                 $this->Flash->error('Add news post cancelled', true);
                 return $this->redirect(['action' => 'index']);
              }
              
              $this->Articles->patchEntity($article, $this->request->data);
              
              if ($this->Articles->save($article)) 
              {
                 $this->Flash->success(__('Your article has been updated.'));
                 
                 return $this->redirect(['action' => 'index']);
             }
            
             $this->Flash->error(__('Unable to update your article.'));
           }
           
           $this->set('article', $article);
        }
        else  // else redirect them with error message telling them NO!
        {
            $this->Flash->error(__('Your not allowed to edit the news'));
            return $this->redirect(['action' => 'index']);
        }
       
    }
    
    public function delete($id)
    {
        //this means we must use the Form helper to get the data via post
       $this->request->allowMethod(['post', 'delete']);

       $article = $this->Articles->get($id);
   
       if ($this->Articles->delete($article)) 
       {
          $this->Flash->success(__('The article with title of {0} has been deleted.', h($article->title)));
          
          return $this->redirect(['action' => 'index']);
       }
    }
    
}