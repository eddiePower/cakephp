<h1 class="center">Order Details</h1>
   
<nav class="nav-container">
	<?= $this->Html->link(__('New Order Detail'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>
<?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $('#data-table').DataTable();
});";
$this->Html->scriptEnd();
?>
<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<table cellpadding="0" cellspacing="0" id="data-table">
	<thead>
	<tr style="height: 50px">
	<th><?= __('Item Name') ?></th>
	<th><?= __('Ordered Date') ?></th>
	<th><?= __('Quantity Ordered') ?></th>
	<th><?= __('Price per unit') ?></th>
	<th><?= __('Customer Discount %') ?></th>
	<th><?= __('Customer Order Discount $') ?></th>
	<th><?= __('Order total (ex GST)') ?></th>
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
	<?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->ordered_date, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : 'TBA' ?>
	</td>
	<td><?= $this->Number->format($orderDetail->quantity_ordered) ?></td>
	<td><?= '$' . $this->Number->format($orderDetail->per_unit) ?></td>
	<td><?= $this->Number->format($orderDetail->discount) . '%' ?></td>

    <td><?= h($this->Number->currency($percent)) ?></td>	
	<td><?= h($this->Number->currency($orderDetail->quantity_ordered * $orderDetail->per_unit - $percent))?></td>	
	<td class="actions">
	<?= $this->Html->link(__('View'), ['action' => 'view', $orderDetail->id], ['class' => 'label']) ?>
	<?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderDetail->id], ['class' => 'label']) ?>
	<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete order detail with shipping date {0} with item {1} * {2} qty ordered?', $orderDetail->order->ordered_date, $orderDetail->item->item_name, $orderDetail->quantity_ordered), 'class' => 'label danger']) ?>
	</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
