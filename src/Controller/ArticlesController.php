<?php

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
        $this->set('articles', $this->paginate($this->Articles));

        $this->set('_serialize', ['articles']);     
        
        
        //Set a variable for use on the index view to show user name / email.
        $this->set('username', $this->Auth->user('username')); 
        
        //set a variable to dispaly user role admin in this case
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
        $article = $this->Articles->newEntity();
        
        if ($this->request->is('post')) 
        {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            
            if ($this->Articles->save($article)) 
            {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        
        $this->set('article', $article);
        
        //Addded the categories list for choosing one category for each article
        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact('categories'));
    }
    
    public function edit($id = null)
    {
       $article = $this->Articles->get($id);
       
       if ($this->request->is(['post', 'put'])) 
       {
          $this->Articles->patchEntity($article, $this->request->data);
          if ($this->Articles->save($article)) 
          {
             $this->Flash->success(__('Your article has been updated.'));
             
             return $this->redirect(['action' => 'index']);
         }
        
         $this->Flash->error(__('Unable to update your article.'));
       }

       $this->set('article', $article);
       
       //Addded the categories list for choosing one category for each article
       $categories = $this->Articles->Categories->find('treeList');
       $this->set(compact('categories'));
       
    }
    
    public function delete($id)
    {
       $this->request->allowMethod(['post', 'delete']);

       $article = $this->Articles->get($id);
   
       if ($this->Articles->delete($article)) 
       {
          $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
          
          return $this->redirect(['action' => 'index']);
       }
    }
    
}