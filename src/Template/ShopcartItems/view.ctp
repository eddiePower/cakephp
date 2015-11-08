<div class="col-md-12">
	<h1 class="center page-title">
		View Item
	</h1>
</div>
   <div class="col-md-12">
    <nav class="nav-container">
        <?= $this->Html->link(__('Edit Shopcart Item'), ['action' => 'edit', $shopcartItem->id], ['class' => 'nav-item']) ?>
        <?= $this->Form->postLink(__('Delete Shopcart Item'), ['action' => 'delete', $shopcartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcartItem->id)], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Shopcart Items'), ['action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Shopcart Item'), ['action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Shopcart'), ['controller' => 'Shopcart', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Shopcart'), ['controller' => 'Shopcart', 'action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
			</nav>
</div>
<div class="shopcartItems view col-md-12">
	<div class="panel">
    <h2><?= h($shopcartItem->id) ?></h2>
    <div class="row">
        <div class="col-md-4 columns strings">
            <h6 class="subheader"><?= __('Shopcart') ?></h6>
            <p><?= $shopcartItem->has('shopcart') ? $this->Html->link($shopcartItem->shopcart->id, ['controller' => 'Shopcart', 'action' => 'view', $shopcartItem->shopcart->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $shopcartItem->has('item') ? $this->Html->link($shopcartItem->item->id, ['controller' => 'Shopcart_items', 'action' => 'view', $shopcartItem->item->id]) : '' ?></p>
        </div>
        <div class="col-md-4">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($shopcartItem->id) ?></p>
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($shopcartItem->quantity) ?></p>
        </div>
		</div>
	</div>
</div>
