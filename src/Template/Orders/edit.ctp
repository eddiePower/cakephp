<h1 class="center">Edit Order</h1>
<nav class="nav-container">
	<?= $this->Form->postLink(
		__('Delete'),
		['action' => 'delete', $order->id],
		['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'nav-item']
		)
	?>
	<?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<?= $this->Form->create($order); ?>
	<h3>Edit Order</h3>
	<?php
	echo $this->Form->input('shipped_date');
	echo $this->Form->input('required_date');
	echo $this->Form->input('status');
	echo $this->Form->input('courier_id', ['options' => $couriers]);
	echo $this->Form->input('customer_id', ['options' => $customers]);
	?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
