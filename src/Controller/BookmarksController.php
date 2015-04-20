<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{

    /*
    *
    *   The authorized function to check / set user access levels.
    */
    
    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        
        //the add & index actions are allowed,as they are used by all
        if(in_array($action, ['index', 'add', 'tags']))
        {
            return true;
        }
        
        //all other actions will require an id
        if(empty($this->request->params['pass'][0]))
        {
            return false;
        }
        
        //check that the bookmark belongs to the current user
        $id = $this->request->params['pass'][0];
        
        $bookmark = $this->Bookmarks->get($id);
        
        //May be add a if statment here to check if admin then show all bookmarks somehow??
        
        if($bookmark->user_id == $user['id'])
        {
            return true;
        }
        
        return parent::isAuthorized($user);
    }
    
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
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
           
            $this->paginate = [
            'conditions' => [
                'Bookmarks.user_id' => $this->Auth->user('id'),  //just show the bookmarks for logged in user.
                ]
          ];
        }
        
        $this->paginate = [
            'conditions' => [
                'Bookmarks.user_id' => $this->Auth->user('id'),  //just show the bookmarks for logged in user.
                ]
        ];
        $this->set('bookmarks', $this->paginate($this->Bookmarks));
/*         $this->set('_serialize', ['bookmarks']); */
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags']
        ]);
        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        
        if ($this->request->is('post')) 
        {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            $bookmark->user_id = $this->Auth->user('id'); //new line to count for taking out the user choice in the add form.
           
            if ($this->Bookmarks->save($bookmark)) 
            {
                $this->Flash->success('The bookmark has been saved.');
                
                return $this->redirect(['action' => 'index']);
            } 
          
            $this->Flash->error('The bookmark could not be saved. Please, try again.');
        }
/*         $users = $this->Bookmarks->Users->find('list', ['limit' => 200]); */
        $tags = $this->Bookmarks->Tags->find('list');
        $this->set(compact('bookmark', 'tags'));
        
/*         $this->set('_serialize', ['bookmark']); */
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Tags']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            $bookmark->user_id = $this->Auth->user('id');
            
            if ($this->Bookmarks->save($bookmark)) 
            {
                $this->Flash->success('The bookmark has been saved.');
                return $this->redirect(['action' => 'index']);
            } 
            
            $this->Flash->error('The bookmark could not be saved. Please, try again.');
        }
/*         $users = $this->Bookmarks->Users->find('list', ['limit' => 200]); */
        $tags = $this->Bookmarks->Tags->find('list');
        $this->set(compact('bookmark', 'tags'));
/*         $this->set('_serialize', ['bookmark']); */
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success('The bookmark has been deleted.');
        } else {
            $this->Flash->error('The bookmark could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    /*
        Tags method to connect the routing entry for tag urls
    */
    
    public function tags()
    {
        $tags = $this->request->params['pass'];
        $bookmarks = $this->Bookmarks->find('tagged', [
            'tags' => $tags]);
        $this->set(compact('bookmarks', 'tags'));
    }
       
}
