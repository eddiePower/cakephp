<h1 class="center">Add Item</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
<!--
	<?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
-->
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<?= $this->Form->create($item, ['type' => 'file']); ?>
	<h3>Add Item</h3>

	<?= $this->Form->input('item_name') ?>
	<?= $this->Form->input('quantity_on_hand') ?>
	<?= $this->Form->input('matt_bale_count') ?>
	<?= $this->Form->input('bale_cost') ?>
	<?= $this->Form->input('matt_weight') ?>	
	<?= $this->Form->input('item_number') ?>
	<?= $this->Form->input('base_price') ?>
	<?= $this->Form->input('barcode') ?>
	<?= $this->Form->file('photo', ['label' =>'Item Image','size'=>'50']) ?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
