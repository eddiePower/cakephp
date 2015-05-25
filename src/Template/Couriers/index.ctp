<h1 class="center">Couriers</h1>

<nav class="nav-container">
	<?= $this->Html->link(__('New Courier'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
		<th><?= $this->Paginator->sort('courier_name') ?></th>
		<th><?= $this->Paginator->sort('courier_charge') ?></th>
		<th class="actions"><?= __('Actions') ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($couriers as $courier): ?>
		<tr>
		<td><?= h($courier->courier_name) ?></td>
		<td><?= '$' . $this->Number->format($courier->courier_charge) ?></td>
		<td class="actions">
		<?= $this->Html->link(__('View'), ['action' => 'view', $courier->id], ['class' => 'label']) ?>
		<?= $this->Html->link(__('Edit'), ['action' => 'edit', $courier->id], ['class' => 'label']) ?>
		<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $courier->courier_name], ['confirm' => __('Are you sure you want to delete # {0}?', $courier->id), 'class' => 'label danger']) ?>
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
