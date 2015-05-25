<h1 class="center">Edit Courier</h1>

<nav class="nav-container">
<?= $this->Form->postLink(
	__('Delete'),
	['action' => 'delete', $courier->id],
	['confirm' => __('Are you sure you want to delete # {0}?', $courier->id), 'class' => 'nav-item']
	)
?>
<?= $this->Html->link(__('List Couriers'), ['action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'nav-item']) ?>

</nav>

<div class="col-12 last panel">
	<?= $this->Form->create($courier); ?>
	<h3>Edit Courier</h3>
	<?php
	echo $this->Form->input('courier_name');
	echo $this->Form->input('courier_charge');
	?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
