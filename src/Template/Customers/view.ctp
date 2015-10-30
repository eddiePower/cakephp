<h1 class="center"><?= h($customer->first_name) ?> (Customer)</h1>
<nav class="nav-container">
<?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'nav-item']) ?>
<?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete  {0}?', $customer->first_name . ' '. $customer->last_name), 'class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'nav-item']) ?>
<?php
	   if($userRole == 'admin'){
?>
<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
<?php
	   }
	   else
	   {
?>
<?= $this->Html->link(__('Account Details'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?php
       }
?>
</nav>

<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<table>
		<thead>
			<tr>
				<th>
					<?= __('Email') ?>
				</th>
				<th>
					<?= __('First Name') ?>
				</th>
				<th>
					<?= __('Last Name') ?>
				</th>
				<th>
					<?= __('Phone') ?>
				</th>
				<th>
					<?= __('Customer Type') ?>
				</th>
				<?php
				 if($userRole == 'admin'){
				 ?>
				<th>
					<?= __('User') ?>
				</th>
				<?php
				}
				?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?= h($customer->email) ?>
				</td>
				<td>
					<?= h($customer->first_name) ?>
				</td>
				<td>
					<?= h($customer->last_name) ?>
				</td>
				<td>
					<?= h($customer->phone) ?>
				</td>
				<td>
					<?= h($customer->customer_type) ?>
				</td>
				<?php
				 if($userRole == 'admin'){
				 ?>
				<td>
					<?= $customer->has('user') ? $this->Html->link($customer->user->username, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?>
					
				</td>
				<?php
					}
					?>
			</tr>
		</tbody>
	</table>
	
	<h4 class="subheader"><?= __('<b><i>Customer Website URL:</i></b>') ?></h4>
	<p><?= $this->Html->link($customer->customer_url, $customer->customer_url, ['target' => '_blank', 'title' => 'Click to open the company website.']) ?></p>

	<h4 class="subheader"><?= __('<b><i>Postcode:</i></b>') ?></h4>
	<p><?= $this->Number->format($customer->postcode, ['pattern' => '####']) ?></p>

	<h4 class="subheader"><?= __('<b><i>Address:</i></b>') ?></h4>
    <p><a href="http://maps.google.com/?q=<?= __($customer->address . ', ' . $customer->postcode . '. Australia') ?>" 
    target="_blank" title="Click to open the company address in google maps."><?= __($customer->address) ?></a></p>

	<h4 class="subheader"><?= __('<b><i>Notes:</i></b>') ?></h4>
	<?= $this->Text->autoParagraph(h($customer->notes)); ?>


</div>
