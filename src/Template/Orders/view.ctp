<h1 class="center">Order details - <?= h($order->shipped_date) ?></h1>

<nav class="nav-container">
	<?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'nav-item']) ?>
	<?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<h3>Order ID : <?= h($order->id) ?></h3>
	<table>
		<thead>
			<tr>
				<td>
					<?= __('Status') ?>
				</td>
				<td>
					<?= __('Courier') ?>
				</td>
				<td>
					<?= __('Customer') ?>
				</td>
				<td>
					<?= __('Shipped Date') ?>
				</td>
				<td>
					<?= __('Required Date') ?>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?= h($order->status) ?>
				</td>
				<td>
					<?= $order->has('courier') ? $this->Html->link($order->courier->courier_name, ['controller' => 'Couriers', 'action' => 'view', $order->courier->id]) : '' ?>
				</td>
				<td>
					<?= $order->has('customer') ? $this->Html->link($order->customer->first_name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?>
				</td>
				<td>
					<?= h($order->shipped_date) ?>
				</td>
				<td>
					<?= h($order->required_date) ?>
				</td>
			</tr>
		</tbody>
	</table>

	

	<h4 class="subheader"><?= __('Related Order Details of order #' . $order->id) ?></h4>
	<?php if (!empty($order->order_details)): ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<th><?= __('Item Id') ?></th>
	<th><?= __('Order Id') ?></th>
	<th><?= __('Quantity Ordered') ?></th>
	<th><?= __('Per Unit Cost') ?></th>
	<th><?= __('Discount %') ?></th>
	<th><?= __('Order total (ex GST)') ?></th>
	<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($order->order_details as $orderDetails): ?>
	<tr>
	<td><?= h($orderDetails->item_id) ?></td>
	<td><?= h($orderDetails->order_id) ?></td>
	<td><?= h($orderDetails->quantity_ordered) ?></td>
	<td><?= h($this->Number->currency($orderDetails->per_unit)) ?></td>
	<td><?= h($this->Number->toPercentage($orderDetails->discount)) ?></td>
	<td><?= h($this->Number->currency($orderDetails->quantity_ordered * $orderDetails->per_unit))?></td>

	<td class="actions">
	<?= $this->Html->link(__('View'), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetails->id]) ?>

	<?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetails->id]) ?>

	<?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetails', 'action' => 'delete', $orderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetails->id)]) ?>

	</td>
	</tr>

	<?php endforeach; ?>
	</table>
	<?php endif; ?>

</div>
