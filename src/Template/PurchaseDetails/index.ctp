<h1 class="center">Purchase Details</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('New Purchase Detail'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('purchase_date') ?></th>
			<th><?= $this->Paginator->sort('item_name') ?></th>
			<th><?= $this->Paginator->sort('quantity_purchased') ?></th>
			<th><?= $this->Paginator->sort('price_of_item') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($purchaseDetails as $purchaseDetail): ?>
		<tr>
			<td>
			<?= $purchaseDetail->has('purchase') ? $this->Html->link($purchaseDetail->purchase->purchase_date, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?>
			</td>
			<td>
			<?= $purchaseDetail->has('item') ? $this->Html->link($purchaseDetail->item->item_name, ['controller' => 'Items', 'action' => 'view', $purchaseDetail->item->id]) : '' ?>
			</td>
			<td><?= $this->Number->format($purchaseDetail->quantity_purchased) ?></td>
			<td><?= '$' . $this->Number->format($purchaseDetail->price_of_item) ?></td>
			<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $purchaseDetail->id], ['class' => 'label']) ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseDetail->id], ['class' => 'label']) ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id), 'class' => 'label danger']) ?>
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
