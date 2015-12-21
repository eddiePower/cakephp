<h1 class="center">Order details - <?= h($order->shipped_date) ?></h1>
<?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $(''table.display'').DataTable();
});";
$this->Html->scriptEnd();
?>
<nav class="nav-container">
	
	<?php if($this->request->session()->read('userRole') == 'admin'){ ?>
	<?= $this->Html->link(__('Edit this Order'), ['action' => 'edit', $order->id], ['class' => 'nav-item', 'title' => 'Click here to edit the order your looking at now']) ?>
	<?= $this->Form->postLink(__('Delete this Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'nav-item']) ?>
	<?php } ?>
	
	<?= $this->Html->link(__('List all Orders'), ['action' => 'index'], ['class' => 'nav-item', 'title' => 'Click here to view all your current and past orders, you may use this to re order stock you liked prior.']) ?>
	<?php if($this->request->session()->read('userRole') == 'admin'){ ?>
	<?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'nav-item', 'title' => 'Click here to place a manual (non shopping cart) order, for admin use only.']) ?>
	<?= $this->Html->link(__('Ordered Items History'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item', 'title' => 'Shows both current ordered items and past ordered items']) ?>
	<?= $this->Html->link(__('Add Item to order'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item', 'title' => 'This is used to manually add an item to a current order in the system, only shows for admins and may be used to alter a current order for helping a customer']) ?>
	<?php } ?>
	<!--
<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
-->
	<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item', 'title' => 'click to show customer information']) ?>
	<?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'nav-item', 'title' => 'Click to add new customer buisness information']) ?>
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<h3>Order ID : <?= h($order->id) ?></h3>
	<table id="" class="display">
		<thead>
			<tr style="height:50px;">
				<td>
					<?= __('Customer Comments') ?>
				</td>
<!--
				<td>
					<?= __('Courier') ?>
				</td>
-->
				<td>
					<?= __('Customer') ?>
				</td>
				<td>
					<?= __('Ordered Date') ?>
				</td>
				<td>
					<?= __('Required Date') ?>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr><td>
					<?= $order->has('customer_comments') ? h($order->customer_comments) : __("No comments left by staff or customer") ?>
				</td>
<!--
				<td>
					<?= $order->has('courier') ? $this->Html->link($order->courier->courier_name, ['controller' => 'Couriers', 'action' => 'view', $order->courier->id]) : '' ?>
				</td>
-->
				<td><?= $order->has('customer') ? $this->Html->link($order->customer->first_name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?>
				</td><td>
					<?= h($order->ordered_date) ?>
				</td>
				<td>
					<?= h($order->required_date) ?>
				</td>
			</tr>
		</tbody>
	</table>

	

	<h4 class="subheader"><?= __('Related Order Details of order #' . $order->id) ?></h4>
	<?php if (!empty($order->order_details)): 
    	   //set the row count to 0 this counts new rows 
    	   // to print out item image and names only once
    	    $count = 0;
	?>
	<table id="" class="display" cellpadding="0" cellspacing="0">
	<tr style="height:50px;">
	<th><?= __('Item Image') ?></th>
	<th><?= __('Item Name') ?></th>
	<th><?= __('Order Id') ?></th>
	<th><?= __('Quantity Ordered') ?></th>
	<th><?= __('Per Unit Cost') ?></th>
	<th><?= __('Discount %') ?></th>
	<th><?= __('Order total (ex GST)') ?></th>
	<th class="actions"><?= __('Actions') ?></th>
	</tr>
	<?php 
	    foreach ($order->order_details as $orderDetails): 
	?>
	<tr>
<!-- 	<?= debug($order); ?> -->
    <td><?= $order->orderDetail[$count]['itemPhoto'] != NULL ? 
								$this->Html->image('graphics/' . $order->orderDetail[$count]['itemPhoto'], ['fullBase' => true, 'class' => 'item_imageThum', 'alt' => 'Our doormat called: ' . $order->orderDetail[$count]['itemName'] . '. A very good mat']) : h('No Image Yet'); ?></td>
	<td><?= h($order->orderDetail[$count]['itemName']) ?></td>
	<td><?= h($orderDetails->order_id) ?></td>
	<td><?= h($orderDetails->quantity_ordered) ?></td>
	<td><?= h($this->Number->currency($orderDetails->per_unit)) ?></td>
	<td><?= h($this->Number->toPercentage($orderDetails->discount)) ?></td>
	<td><?= h($this->Number->currency($orderDetails->quantity_ordered * $orderDetails->per_unit))?></td>

	<td class="actions">
	<?= $this->Html->link(__('View'), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetails->id]) ?>

	<!--  //NOT NEEDED AS WERE LOOKING AT RECORDS HERE AND SHOULD NOT BE EDITED.
<?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetails->id]) ?>

	<?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetails', 'action' => 'delete', $orderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetails->id)]) ?>
-->
    <?php 
    //increase the count
    $count++; ?>
	</td>
	</tr>

	<?php endforeach; ?>
	</table>
	<?php endif; ?>

</div>
