<h1 class="center">Purchases</h1>

<nav class="nav-container">
<?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="purchases form col-12 last panel">
	<?= $this->Form->create($purchase); ?>

	<h3><?= __('Add Purchase') ?></h3>
	<?php
		echo $this->Form->input('purchase_date');
		echo $this->Form->input('purchase_status');
		echo $this->Form->input('supplier_id', ['options' => $suppliers]);
	?>

	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
