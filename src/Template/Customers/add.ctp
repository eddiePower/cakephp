<h1 class="center">Add Customer</h1>

<!--<h3><?= __('Actions') ?></h3>-->
<nav class="nav-container">
<?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 panel last">
 <?= $this->Flash->render(); ?>
	<?= $this->Form->create($customer); ?>
	<h3>Add customer</h3>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('address');
		echo $this->Form->input('postcode');
		echo $this->Form->input('phone');
		echo $this->Form->input('notes');
		echo $this->Form->input('customer_type');

 	   //if the user is an admin then allow them to set customer data for any user
	   if($userRole == 'admin')
       {
	      echo $this->Form->input('user_id', ['options' => $users, 'empty' => false]);
	   }
	?>

	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
