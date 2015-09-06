<h1 class="center">Edit Customer</h1>
<nav class="nav-container">
	<?= $this->Form->postLink(
	__('Delete'),
	['action' => 'delete', $customer->id],
	['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'nav-item']
	)
	?>
	<?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<?= $this->Form->create($customer); ?>
	<h3>Edit Customer</h3>
	<?php
	echo $this->Form->input('email');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	echo $this->Form->input('address');
	echo $this->Form->input('postcode');
	echo $this->Form->input('phone');
	echo $this->Form->input('notes');
	echo $this->Form->input('customer_type');
	echo $this->Form->input('user_id', ['options' => $users, 'empty' => false]);
	?>

	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
