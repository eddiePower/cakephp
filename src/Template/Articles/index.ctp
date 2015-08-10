
<h1 class="center">IBAustralia - Rick's News Portal</h1>
        <p>        
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('Welcome ' . $username . " your role is an " . $userRole . " position.<br><nav class='nav-container'>" .
            $this->Html->link("Add Article", ['action' => 'add'], ['class' => 'nav-item'])) : '' 
        ?>
	</nav>
        </p>
    
<div class="col-12 last panel">
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
        <!-- 
            JAVASCRIPT BLOCKS VIA CAKEPHP: 
            $this->Html->scriptStart(['block' => true]);
            echo "alert('I am in the JavaScript');"
            $this->Html->scriptEnd(); 
        -->
        <th><?= $this->Paginator->sort('Title') ?></th>
        <th><?= $this->Paginator->sort('Body') ?></th>
        <th><?= $this->Paginator->sort('Created') ?></th>
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('<th class="actions">Action</th>') : '' ?>
    </tr>
    </thead>
<!-- Here's where we iterate through our $articles query object, printing out article info -->
<tbody>
  <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id], ['class' => 'btn normal']) ?>
        </td>
        <td>
            <?= $this->Html->link($this->Text->truncate($article->body, 60), ['action' => 'view', $article->id], ['class' => 'btn normal']) ?>
            
        </td>
        <td>
            <?= h($article->created) ?>
        </td>
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('<td class="actions">') : '' ?>
          <?= $userRole == 'admin' ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete article {0}?', $article->title), 'class' => 'label danger']) : '' ?>				
          <?= $userRole == 'admin' ? $this->Html->link('Edit', ['action' => 'edit', $article->id], ['class' => 'label']) : '' ?>				
        <?= $userRole == 'admin' ? __('</td>') : '' ?>
        <!--  End of if user has admin support check all done via cake code.  -->
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>