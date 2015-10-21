<h1 class="center">Edit Order</h1>
<nav class="nav-container">
	<?= $this->Form->postLink(
		__('Delete'),
		['action' => 'delete', $order->id],
		['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'nav-item']
		)
	?>
	<?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'nav-item']) ?>
<!-- 	<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?> -->
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('View Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('Add Items to Order'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>
<script type="text/javascript"> 
	 $(function() 
	 {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" }); 
    });
    
    $(function() 
	 {
        $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" }); 
    });
  </script>
<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<?= $this->Form->create($order); ?>
	<h3>Edit Order</h3>
	<?php
	echo __("Date Ordered:");
	echo $this->Form->text('ordered_date', ['id' => 'datepicker', 'disabled' => 'true']);
	echo __("Request delivery date:");
	echo $this->Form->text('required_date', ['id' => 'datepicker1']);
	echo __("Order Comments:");
	echo $this->Form->input('customer_comments', ['label' => '']);
/* 	echo $this->Form->input('courier_id', ['options' => $couriers]); */
	echo $this->Form->input('customer_id', ['options' => $customers]);
	?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
