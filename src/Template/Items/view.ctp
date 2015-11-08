<h1 class="center"><?= h($item->item_name) ?> - Item</h1>
<nav class="nav-container">
<!--
	<?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'nav-item']) ?>
	<?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'nav-item']) ?>
-->
	<?= $this->Html->link(__('Stock Items'), ['action' => 'index'], ['class' => 'nav-item']) ?>
<!-- 	<?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'nav-item']) ?> -->
	<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
<!-- 	<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?> -->
<!--  REMOVED DUE TO TIME CONSTRAINTS THIS IS WHERE WE STARTED ADMIN STOCK PURCHASES 
	<?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
-->
</nav>

<div class="col-12 last panel">
	<h3><?= h($item->item_name) ?> (Item Details)</h3>
	 <?= $this->Flash->render(); ?>
	<table>
		<thead>
			<tr>
			   <td>
			      <?= __('Item Image') ?>
				</td>
				<td>
					<?= __('Item Name') ?>
				</td>
				<?=  $this->request->session()->read('userRole') == 'admin' ? __('<td>Quantity On Hand</td>') : '' ?> 
				<?=  $this->request->session()->read('userRole') == 'admin' ? __('<td>Barcode</td>') : '' ?> 
				<td>
    				<?= __('Item Number') ?>
				</td>
				<td>
				<?= __('Base Price') ?>
				</td>
				<td>
				<?= __('Actions') ?>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td>
				  <?= $item->photo != NULL ? 
                    $this->Html->image('graphics/' . $item->photo, ['alt' => $item->item_name, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?>
				</td>
				<td>
					<?= h($item->item_name) ?>
				</td>
				<?= $this->request->session()->read('userRole') == 'admin' ? __('<td>' . $this->Number->format($item->quantity_on_hand) . '</td>') : '' ?>
				<?= $this->request->session()->read('userRole') == 'admin' ? __('<td><script type="text/javascript">
    					$(document).ready(function()
    					{
    					   $("#bcTarget").barcode("' . $item->barcode . '", "ean13");
    					});
				   </script>
				   <div id="bcTarget">
				   </div>
				</td>') : '' ?>
				<td>
					<?= $this->Number->format($item->item_number, ['pattern' => '########']) ?>
				</td>
				<td> <?= $this->Number->currency($item->base_price, 'USD') ?></td>
				<td><?= $this->Html->link(__('Add to Shopping Cart'), ['controller' => 'ShopcartItems', 'action' => 'add', $aUser['id'], $item->id], ['class' => 'label']) ?></td> 
				
			</tr>
		</tbody>
	</table>
	<?php 
	if($this->request->session()->read('userRole') == 'admin')
	{
	?>
	<div class="col-12 last panel">
	<h3>Warehousing Information:</h3>
	<p>Bale Size: <?= $item->matt_bale_count ?> Units,</p>
	<p>Bale Cost: <?= $this->Number->currency($item->bale_cost, 'USD') ?></p>
	<p>Matt Weight: <?= $item->matt_weight ?> Kg.</p>
	</div>
	<?php
	    }
	    
	    if($this->request->session()->read('userRole') == 'admin') { ?> 
	<h4 class="subheader"><?= __('Related OrderDetails') ?></h4>
	<?php if (!empty($item->order_details)): ?>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?= __('Order ID') ?></th>
				<th><?= __('Quantity Ordered') ?></th>
				<th><?= __('Per Unit') ?></th>
				<th><?= __('Discount') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
	</thead>
	<?php foreach ($item->order_details as $orderDetails): ?>
	<tbody>
		<tr>
		<td><?= h($orderDetails->order_id) ?></td>
        
			<td><?= h($orderDetails->quantity_ordered) ?></td>
			<td><?= h($this->Number->currency($orderDetails->per_unit)) ?></td>
			<td><?= h($this->Number->toPercentage($orderDetails->discount)) ?></td>

			<td class="actions">
			<?= $this->Html->link(__('View'), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetails->id]) ?>

			<!-- <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetails->id]) ?> -->

<!-- 			<?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetails', 'action' => 'delete', $orderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetails->id)]) ?> -->

			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<!--
<h4 class="subheader"><?= __('Related PurchaseDetails') ?></h4>
	<?php if (!empty($item->purchase_details)): ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<th><?= __('Id') ?></th>
	<th><?= __('Purchase Id') ?></th>
	<th><?= __('Item Id') ?></th>
	<th><?= __('Quantity Purchased') ?></th>
	<th><?= __('Price Of Item') ?></th>
	<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php foreach ($item->purchase_details as $purchaseDetails): ?>
	<tr>
	<td><?= h($purchaseDetails->id) ?></td>
	<td><?= h($purchaseDetails->purchase_id) ?></td>
	<td><?= h($purchaseDetails->item_id) ?></td>
	<td><?= h($purchaseDetails->quantity_purchased) ?></td>
	<td><?= h($this->Number->currency($purchaseDetails->price_of_item)) ?></td>

	<td class="actions">
	<?= $this->Html->link(__('View'), ['controller' => 'PurchaseDetails', 'action' => 'view', $purchaseDetails->id]) ?>

	<?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseDetails', 'action' => 'edit', $purchaseDetails->id]) ?>

	<?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseDetails', 'action' => 'delete', $purchaseDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetails->id)]) ?>

	</td>
	</tr>

	<?php endforeach; ?>
	</table>
-->
	<?php endif; ?>
	<?php } ?>
</div>