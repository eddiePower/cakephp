<h1 class="center">Customers</h1>

<!--<h3><?= __('Actions') ?></h3>-->
<nav class="nav-container">
	<?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
	
<!-- Send user to email listing and create email page.	 -->
	<?= $this->Html->link(__('Send Email'), ['controller' => 'Customers', 'action' => 'buildEmails'], ['class' => 'nav-item']) ?>
	
	
</nav>

<div class="col-12 last panel">
	
    <!-- show and flash messages here on the view page. -->
    <?= $this->Flash->render(); ?>
	
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('first_name') ?></th>
				<th><?= $this->Paginator->sort('last_name') ?></th>
				<th><?= $this->Paginator->sort('postcode') ?></th>
				<th><?= $this->Paginator->sort('phone') ?></th>
				<th><?= $this->Paginator->sort('customer_type') ?></th>
				<th><?= $this->Paginator->sort('email customer') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($customers as $customer): ?>
			<tr>
				<td><?= h($customer->first_name) ?></td>
				<td><?= h($customer->last_name) ?></td>
				<td><?= $this->Number->format($customer->postcode, ['pattern' => '####']) ?></td>
				<td><?= h($customer->phone) ?></td>
				<td><?= h($customer->customer_type) ?></td>

				<!--  Entry point for email checkbox and array builder / form.   -->
				<td><?= h($customer->email) ?>
				</td>

				<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $customer->id], ['class' => 'label']) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id], ['class' => 'label']) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete customer {0}?', $customer->first_name . ' ' . $customer->last_name), 'class' => 'label danger']) ?>
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
		<p>
		<?= $this->Paginator->counter() ?>
		</p>
	</div>
</div>
