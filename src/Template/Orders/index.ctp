<h1 class="center">
Order History for user: <?= $username ?>
</h1>

<nav class="nav-container">
<?php if($this->request->session()->read('userRole') == 'admin'){ ?>
	<?= $this->Html->link(__('Add Manual Order'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?php } ?>
	<!--
<?= $this->Html->link(__('List Couriers'), ['controller' => 'Couriers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Courier'), ['controller' => 'Couriers', 'action' => 'add'], ['class' => 'nav-item']) ?>
-->
	<?= $this->Html->link(__('Customer information'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('My Account'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('My ShoppingCart'), ['controller' => 'Shopcart', 'action' => 'index'], ['class' => 'nav-item']) ?>
</nav>
<?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $('#data-table').DataTable({
    'order': [[ 0, 'desc' ]],
    'pageLength': 25,
    'columnDefs': [
            {
                'targets': [ 0 ],
                'visible': false,
                'searchable': false
            }
        ]
    });
});";
$this->Html->scriptEnd();
?>
<div class="col-12 last panel">
 <?= $this->Flash->render(); ?>
	<table class="table table-bordered table-striped" id="data-table" cellpadding="0" cellspacing="0">
		<thead>
		<tr style="height: 50px">
		    <th><?= __('id') ?></th> <!-- Used for accurate ordering or new things to the top since date sorting wasnt working -->
			<th><?= __('Ordered Date') ?></th>
			<th><?= __('Required Date') ?></th>
			<th><?= __('Customer Comments') ?></th>
<!-- 			<th><?= $this->Paginator->sort('courier_id') ?></th> -->
			<th><?= __('Customer / User Name') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
			<tr>
			        <td><?= h($order->id) ?></td>
					<td><?= h($order->ordered_date) ?></td>
					<td><?= h($order->required_date) ?></td>
					<td><?=  $order->customer_comments != '' ? h($order->customer_comments) : __('No comments added')  ?></td>
					<!--
<td>
							<?= $order->has('courier') ? $this->Html->link($order->courier->courier_name, ['controller' => 'Couriers', 'action' => 'view', $order->courier->id]) : '' ?>
					</td>
-->
					<td>
							<?=  $this->request->session()->read('userRole') == 'admin' ? $order['customer']['first_name'] . ' ' . $order['customer']['last_name'] : $username ?>
					</td>
					<td class="actions">
							<?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'label']) ?>
                            <?php if($this->request->session()->read('userRole') == 'admin') { ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'label']) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete order with shipping date of {0} and customer {1}?', $order->ordered_date, $order->customer_id), 'class' => 'label danger']) ?>
							<?php } ?>
					</td>
			</tr>

	<?php endforeach; ?>
	</tbody>
	</table>
</div>
