<div class="col-12 last panel">
<h1 class="nav-title"><?= h($article->title) ?></h1>
<p><?= __($article->post) ?></p>
                    
<p><small>Created:
 <?= 
    //alt for date format (article->created->format(DATE_RFC850) or global recognition in main app.php controller) 
    $article->created 
  ?>
  <br /><br />
  <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'label']) ?>
  
  <!-- 
        depending on the users role a edit this news post button will appear or 
        nothing as users only have read only access.
  -->
  <?= $userRole == 'admin' ? $this->Html->link(__('Edit'), ['action' => 'edit', $article->id], ['class' => 'label danger']) : '' ?>	

</small></p>
</div>