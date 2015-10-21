<h1 class="center">Add Order Detail</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('List Order Details'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<?= $this->Form->create($orderDetail); ?>
	<h3>Add Order Detail</h3>
	<?php
/* 	debug($orderDetail); */
	echo $this->Form->input('item_id', ['options' => $items]);
	echo $this->Form->input('order_id', ['options' => $orders]);
	echo $this->Form->input('quantity_ordered');
	echo $this->Form->input('per_unit', ['disabled' => 'true', 'value' => $stockPrice]);
	echo $this->Form->input('discount');
	?>
	</fieldset>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
