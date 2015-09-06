<h1 class="center">Add Supplier</h1>

<nav class="nav-container">
	<?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'nav-item']) ?></li>
	<?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
	<?= $this->Form->create($supplier); ?>
	<h3>Add Supplier</h3>
	<?php
	echo $this->Form->input('supplier_name');
	echo $this->Form->input('supplier_description');
	?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
