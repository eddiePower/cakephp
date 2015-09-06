<div class="col-12 last panel">
	<h3>
	<?= __('User Actions') ?>
	</h3>
 <?= $this->Flash->render(); ?>
	<table>
		<tbody>
			<tr>
			<?php if($userRole == 'admin') { ?>  
				<td><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-default']) ?> </td>
				<td><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete user {0}?', $user->email), 'class' => 'btn btn-sm btn-danger']) ?></td>
				<td><?= $this->Html->link(__('List Users'), ['action' => 'index'],['class' => 'btn btn-sm btn-default']) ?></td>
				<td><?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?></td>
				<td><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'btn btn-sm btn-default']) ?></td>
				<td><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?> 				</td>
			</tr>
			<?php }else{ ?>
			<td><?= $this->Html->link(__('Edit My Details'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-default']) ?> </td>
				<td><?= $this->Form->postLink(__('Delete My Account'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete your user account {0} this will mean you will loose access to this site?', $user->email), 'class' => 'btn btn-sm btn-danger']) ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<div class="col-12 last panel">
	<h3>
	<?= h($user->email) ?>
	</h3>
	
	<table>
		<tbody>
			<tr>
				<th><?= __('User Email') ?></th> 
				<td><?= h($user->email) ?></td>
				</tr>    
				<tr>
				<th><?= __('User Password') ?></th> 
				<td><?= h($user->password) ?></td>
			</tr>
			<tr>
				<th><?= __('User Role') ?></th> 
				<td><?= h($user->role) ?></td>
			</tr>
			<tr>
				<th><?= __('Account Id') ?></th> 
				<td><?= $this->Number->format($user->id) ?></td>
			</tr>
			<tr>
				<th><?= __('Account Created') ?></th> 
				<td><?= h($user->created) ?></td>
			</tr>
		</tbody>
	</table>
	
	<hr>
	
	<?php if (!empty($user->customers)): ?>
	<h3>
	<?= __('User Related Customers') ?>
	</h3>
	
	<table>
		<thead>
			<tr>
				<th><?= __('First Name') ?></th>
				<th><?= __('Surname') ?></th>
				<th><?= __('Address') ?></th>
				<th><?= __('Postcode') ?></th>
				<th><?= __('Phone') ?></th>
				<th><?= __('Notes') ?></th>
				<th><?= __('Customer Type') ?></th>
<!-- 				<th><?= __('User ID') ?></th> -->
				
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($user->customers as $customers): ?>
			<tr>
				<td><?= h($customers->first_name) ?></td>
				<td><?= h($customers->last_name) ?></td>
				<td><?= h($customers->address) ?></td>
				<td><?= h($customers->postcode) ?></td>
				<td><?= h($customers->phone) ?></td>
				<td><?= h($customers->notes) ?></td>
				<td><?= h($customers->customer_type) ?></td>
<!-- 				<td><?= h($customers->user_email) ?></td> -->


				<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id],['class' => 'label']) ?>

				<?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id],['class' => 'label']) ?>

				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete user {0}?', $customers->email), 'class' => 'label danger']) ?>

				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
</div>
