<h1 class="center">
Orders
</h1>

<nav class="nav-container">
	<?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
			<th><?= $this->Paginator->sort('shipped_date') ?></th>
			<th><?= $this->Paginator->sort('required_date') ?></th>
			<th><?= $this->Paginator->sort('status') ?></th>
			<th><?= $this->Paginator->sort('courier_id') ?></th>
			<th><?= $this->Paginator->sort('customer_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
			<tr>
					<td><?= h($order->shipped_date) ?></td>
					<td><?= h($order->required_date) ?></td>
					<td><?= h($order->status) ?></td>
					<td>
							<?= $order->has('courier') ? $this->Html->link($order->courier->courier_name, ['controller' => 'Couriers', 'action' => 'view', $order->courier->id]) : '' ?>
					</td>
					<td>
							<?= $order->has('customer') ? $this->Html->link($order->customer->first_name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?>
					</td>
					<td class="actions">
							<?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'label']) ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'label']) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete order with shipping date of {0} and customer {1} and courier: {2}?', $order->shipped_date, $order->customer->first_name . ' ' . $order->customer->last_name, $order->courier->courier_name), 'class' => 'label danger']) ?>
					</td>
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
