<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
                    
<p><small>Created:
 <?= 
    //alt for article->created->format(DATE_RFC850)
    $article->created 
  ?>
  <br /><br />
  <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'label']) ?>
  <?= $userRole == 'admin' ? $this->Html->link(__('Edit'), ['action' => 'edit', $article->id], ['class' => 'label danger']) : '' ?>				

</small></p>
