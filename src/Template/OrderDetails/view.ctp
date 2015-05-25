<h1 class="center"><?= h($orderDetail->id) ?> (Order Detail ID)</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('Edit Order Detail'), ['action' => 'edit', $orderDetail->id], ['class' => 'nav-item']) ?>
	<?= $this->Form->postLink(__('Delete Order Detail'), ['action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id), 'class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Order Details'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order Detail'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<h2><?= h($orderDetail->id) ?> (ID)</h2>
	<table>
		<thead>
			<tr>
				<td>
					<?= __('Item') ?>
				</td>
				<td>
					<?= __('Order') ?>
				</td>
				<td>
					<?= __('Id') ?>
				</td>
				<td>
					<?= __('Quantity Ordered') ?>
				</td>
				<td>
					<?= __('Per Unit') ?>
				</td>
				<td>
					<?= __('Discount') ?>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?= $orderDetail->has('item') ? $this->Html->link($orderDetail->item->id, ['controller' => 'Items', 'action' => 'view', $orderDetail->item->id]) : '' ?>
				</td>
				<td>
					<?= $orderDetail->has('order') ? $this->Html->link($orderDetail->order->id, ['controller' => 'Orders', 'action' => 'view', $orderDetail->order->id]) : '' ?>
				</td>
				<td>
					<?= $this->Number->format($orderDetail->id) ?>
				</td>
				<td>
					<?= $this->Number->format($orderDetail->quantity_ordered) ?>
				</td>
				<td>
					<?= $this->Number->format($orderDetail->per_unit) ?>
				</td>
				<td>
					<?= $this->Number->format($orderDetail->per_unit) ?>
				</td>
			</tr>
		</tbody>
	</table>

</div>
