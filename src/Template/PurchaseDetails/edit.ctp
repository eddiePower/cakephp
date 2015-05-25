<h1 class="center">Edit Purchase Details</h1>
<nav class="nav-container">
	<?= $this->Form->postLink(
		__('Delete'),
		['action' => 'delete', $purchaseDetail->id],
		['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id), 'class' => 'nav-item']
		)
	?>
	<?= $this->Html->link(__('List Purchase Details'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<?= $this->Form->create($purchaseDetail); ?>
	<h3>Edit Purchase Details</h3>

	<?php
	echo $this->Form->input('purchase_id', ['options' => $purchases]);
	echo $this->Form->input('item_id', ['options' => $items]);
	echo $this->Form->input('quantity_purchased');
	echo $this->Form->input('price_of_item');
	?>

	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
