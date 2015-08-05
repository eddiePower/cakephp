<h1 class="center"><?= h($courier->courier_name) ?> (Courier)</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('Edit Courier'), ['action' => 'edit', $courier->id], ['class' => 'nav-item']) ?>
	<?= $this->Form->postLink(__('Delete Courier'), ['action' => 'delete', $courier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courier->id), 'class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Couriers'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<h2><?= h($courier->id) ?></h2>

	<h3 class="subheader"><?= __('Courier Name') ?></h3>
	<p><?= h($courier->courier_name) ?></p>

	<!--
	<h6 class="subheader"><?= __('Id') ?></h6>
	<p><?= $this->Number->format($courier->id) ?></p>
	-->
	<h3 class="subheader"><?= __('Courier Charge') ?></h3>
	<p><?= $this->Number->currency($courier->courier_charge) ?></p>


	<h4 class="subheader"><?= __('Related Orders shipped with ' . $courier->courier_name) ?></h4>
	<?php if (!empty($courier->orders)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<!--             <th><?= __('Id') ?></th> -->
			<th><?= __('Shipped Date') ?></th>
			<th><?= __('Required Date') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('Courier Name') ?></th>
			<th><?= __('Customer Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($courier->orders as $orders): ?>
		<tr>
			<!--             <td><?= h($orders->id) ?></td> -->
			<td><?= h($orders->shipped_date) ?></td>
			<td><?= h($orders->required_date) ?></td>
			<td><?= h($orders->status) ?></td>
			<td><?= h($courier->courier_name) ?></td>
			<td><?= h($orders->customer_id) ?></td>

			<td class="actions">
			<?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id], ['class' => 'label']) ?>

			<?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id], ['class' => 'label']) ?>

			<?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id), 'class' => 'label danger']) ?>

			</td>
		</tr>

		<?php endforeach; ?>
	</table>
	<?php endif; ?>

</div>