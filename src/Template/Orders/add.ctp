<h1 class="center">Add an order</h1>
<nav class="nav-container">
	<?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>
<?= $this->Flash->render(); ?>
<div class="col-12 last panel">


	<h3>Add Order</h3>
	<script type="text/javascript"> 
	 $(function() 
	 {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" }); 
    });
  </script>
  	<?= $this->Form->create($order, [
    'horizontal' => true,
    'cols' => [ // Total is 12, default is 2 / 6 / 4
        'label' => 2,
        'input' => 3,
        'error' => 7  //at end of inline
    ]
]) ?>
	<?php

    //sending the paced date automatically as the current date.
	echo $this->Form->text('required_date', ['id' => 'datepicker', 'placeholder'=> 'Click to pick a date']);
	echo $this->Form->input('customer_comments', ['placeholder' => 'Enter any comments here for this order']);
/* 	echo $this->Form->input('courier_id', ['options' => $couriers]); */
	echo $this->Form->input('customer_id', ['options' => $customers]);
	?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
