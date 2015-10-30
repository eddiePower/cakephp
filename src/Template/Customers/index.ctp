<h1 class="center">Customers</h1>

<?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $('#data-table').DataTable({
    'order': [[ 0, 'asc' ]]
    });
});";
$this->Html->scriptEnd();
?>
<div class="col-12 last panel">
	<h3>
	Logged in as <?= $username; ?>
	</h3>
	<h3>
	Role: <?= $userRole; ?>
   </h3>
     <!-- show and flash messages here on the view page. -->
     <?= $this->Flash->render(); ?>
     <br />
     <nav class="nav-container">
    	<?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?php
	       if($userRole == 'admin')	  
	       {
	       ?>
	        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
	
    <!-- Send user to email listing and create email page.	 -->
	<?= $this->Html->link(__('Send Email'), ['controller' => 'Customers', 'action' => 'buildEmails'], ['class' => 'nav-item']) ?>
	<?php
	    }
	    else
	    {
	?>
	<?= $this->Html->link(__('My Account Details'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
    <?php
        }
    ?>
</nav>

<div class="col-12 last panel">
	<table class="table table-bordered table-striped" id="data-table">
		<thead>
		<tr style="height: 50px">
				<th><?= __('First Name') ?></th>
				<th><?= __('Last Name') ?></th>
				<th><?= __('Address') ?></th>
				<th><?= __('Postcode') ?></th>
				<th><?= __('Phone') ?></th>
<!-- 				<th><?= __('Website URL') ?></th> -->
				<th><?= __('Customer Type') ?></th>
				<th><?= __('Customer email') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($customers as $customer): ?>
			<tr>
				<td><?= h($customer->first_name) ?></td>
				<td><?= h($customer->last_name) ?></td>
				<td><?= h($customer->address) ?></td>
				<td><?= $this->Number->format($customer->postcode, ['pattern' => '####']) ?></td>
				<td><?= h($customer->phone) ?></td>
<!-- 				<td><?= h($customer->customer_url) ?></td> -->
				<td><?= h($customer->customer_type) ?></td>

				<!--  Entry point for email checkbox and array builder / form.   -->
				<td><?= h($customer->email) ?>
				</td>

				<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $customer->id], ['class' => 'label']) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id], ['class' => 'label']) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete customer {0}?', $customer->first_name . ' ' . $customer->last_name), 'class' => 'label danger']) ?>
				</td>
			</tr>
			<?php endforeach; ?>
			
		</tbody>
	</table>
</div>
</div>
