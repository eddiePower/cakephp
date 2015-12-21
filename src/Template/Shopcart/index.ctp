

<h1 class="center">Shopping cart</h1>
    <h3><?= __('Admin Cart Actions') ?></h3>


<nav class="nav-container">
	<?= $this->Html->link(__('New Shopcart'), ['action' => 'add'],['class' => 'nav-item'] ) ?>
	<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
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
<div class="shopcart index large-10 medium-9 columns row panel">
	<div class="col-sm-12">
		<?= $this->Flash->render(); ?>
		<div class="table-responsive">
		<table class="table table-bordered table-striped" id="data-table" cellpadding="0" cellspacing="0">
			<thead>
				<tr style="height: 50px">
				<th><?= __('ID') ?></th>  <!-- Used for accurate ordering or new things to the top since date sorting wasnt working -->
				<th><?= __('User ID') ?></th>
				<th><?= __('Date Created') ?></th>
				<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($shopcart as $aCart): ?>
				<tr>
				<td><?= h($aCart->id) ?></td>
				<td>
				<?= $aCart->has('user') ? $this->Html->link($aCart->user->email, ['controller' => 'Shopcart', 'action' => 'view', $aCart->id]) : '' ?>
				</td>
				<td><?= h($aCart->created) ?></td>
				<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $aCart->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $aCart->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aCart->id], ['confirm' => __('Are you sure you want to delete this cart for user {0}?', $aCart->user->email)]) ?>
				</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</div>
	
</div>
