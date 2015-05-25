<h1 class="center"><?= h($purchaseDetail->id) ?> - Purchase Detail(ID)</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('Edit Purchase Detail'), ['action' => 'edit', $purchaseDetail->id], ['class' => 'nav-item']) ?>
	<?= $this->Form->postLink(__('Delete Purchase Detail'), ['action' => 'delete', $purchaseDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id), 'class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Purchase Details'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase Detail'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<h3><?= h($purchaseDetail->id) ?> (ID)</h3>
	<table>
		<thead>
			<tr>
				<td>
					<?= __('Purchase') ?>
				</td>
				<td>
					<?= __('Item') ?>
				</td>
				<td>
					<?= __('Purchase') ?>
				</td>
				<td>
					<?= __('Quantity Purchased') ?>
				</td>
				<td>
					<?= __('Price Of Item') ?>
				</td>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?= $purchaseDetail->has('purchase') ? $this->Html->link($purchaseDetail->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?>
				</td>
				<td>
					<?= $purchaseDetail->has('item') ? $this->Html->link($purchaseDetail->item->id, ['controller' => 'Items', 'action' => 'view', $purchaseDetail->item->id]) : '' ?>
				</td>
				<td>
					<?= $this->Number->format($purchaseDetail->id) ?>
				</td>
				<td>
					<?= $this->Number->format($purchaseDetail->quantity_purchased) ?>
				</td>
				<td>
					<?= $this->Number->format($purchaseDetail->price_of_item) ?>
				</td>
			</tr>
		</tbody>
	</table>

</div>
