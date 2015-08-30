<h1 class="center">Order Details</h1>
   
<nav class="nav-container">
	<?= $this->Html->link(__('New Order Detail'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
	<th><?= $this->Paginator->sort('item_name') ?></th>
	<th><?= $this->Paginator->sort('Order Ship date') ?></th>
	<th><?= $this->Paginator->sort('quantity_ordered') ?></th>
	<th><?= $this->Paginator->sort('price per_unit') ?></th>
	<th><?= $this->Paginator->sort('customer_discount %') ?></th>
	<th><?= $this->Paginator->sort('customer_order_discount $') ?></th>
	<th><?= $this->Paginator->sort('Order total (ex GST)') ?></th>
	<th class="actions"><?= __('Actions') ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($orderDetails as $orderDetail): 
	            //discount % divide by 100 multiply by the item total (qty ordered * price pr unit)
	         $percent = ($orderDetail->discount / '100' * ($orderDetail->quantity_ordered * $orderDetail->per_unit)); ?>
	<tr>
	<td>
	<?= $orderDetail->has('item') ? $this->Html->link($orderDetail->item->item_name, ['controller' => 'Items', 'action' => 'view', $orderDetail->item->id]) : '' ?>
	</td>
	<td>
	<?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->shipped_date, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : 'TBA' ?>
	</td>
	<td><?= $this->Number->format($orderDetail->quantity_ordered) ?></td>
	<td><?= '$' . $this->Number->format($orderDetail->per_unit) ?></td>
	<td><?= $this->Number->format($orderDetail->discount) . '%' ?></td>

    <td><?= h($this->Number->currency($percent)) ?></td>	
	<td><?= h($this->Number->currency($orderDetail->quantity_ordered * $orderDetail->per_unit - $percent))?></td>	
	<td class="actions">
	<?= $this->Html->link(__('View'), ['action' => 'view', $orderDetail->id], ['class' => 'label']) ?>
	<?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderDetail->id], ['class' => 'label']) ?>
	<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete order detail with shipping date {0} with item {1} * {2} qty ordered?', $orderDetail->order->shipped_date, $orderDetail->item->item_name, $orderDetail->quantity_ordered), 'class' => 'label danger']) ?>
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
