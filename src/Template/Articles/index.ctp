
<h1>IBAustralia - Rick's News Portal</h1>
        <p>        
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('Welcome ' . $username . " your role is an " . $userRole . " position.<br /><br />Available actions:<br />" .
            $this->Html->link("Add Article", ['action' => 'add'], array('class' => 'label'))) : '' 
        ?>
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
        <th><?= $this->Paginator->sort('Created') ?></th>
        <th><?= $this->Paginator->sort('Category') ?></th>
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('<th class="actions">Action</th>') : '' ?>
    </tr>
    </thead>
<!-- Here's where we iterate through our $articles query object, printing out article info -->
<tbody>
<?php foreach ($articles as $article): ?>
    <tr>
        <!-- <td><?= $article->id ?></td> -->
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id], ['class' => 'btn normal']) ?>
        </td>
        <td>
            <?= h($article->created) ?>
        </td>
        <td>
            <!-- ADD IN DYNAMIC CATAGORY SUPPORT IN CONTROLLER. -->
            <?= h("category XX") ?>
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
            <?= $this->Paginator->prev('☜ ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' ☞') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>