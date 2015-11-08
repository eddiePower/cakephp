<div class="col-md-12">
	<h1 class="center page-title">
		Edit Item
	</h1>
</div>
   <div class="col-md-12">
    <nav class="nav-container">
        <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shopcart->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shopcart->id)],
								['class' => 'nav-item']
            )
        ?>
        <?= $this->Html->link(__('List Shopcart'), ['action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
    </nav>
</div>
<div class="shopcart form col-md-12">
   <div class="panel">
    <?= $this->Form->create($shopcart) ?>
    <fieldset>
        <legend><?= __('Edit Shopcart') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('items._ids', ['options' => $items]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	</div>
</div>
