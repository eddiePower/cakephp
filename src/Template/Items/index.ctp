<?php
if(isset($_SESSION['username']))  {
	if($this->request->session()->read('userRole') == 'admin') { ?>
		<h1 class="center">Item List</h1>
		
		<nav class="nav-container">
		<?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'nav-item']) ?>
		<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
		<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
		<?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
		<?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
		</nav>
		
	<?php } else { ?>
		<h1 class="center">Items <i>for sale</i></h1>
	<?php }
	}
?>
    <?= $this->Flash->render(); ?>
		<?php
			if(isset($_SESSION['username'])) 
			{
			  
			
			
				if($this->request->session()->read('userRole') == 'admin') // Show table view for the admin
				{
				
                    //enable the data-tables jQuery plugin for better table uttils.
                   $this->Html->scriptStart(['block' => true]);
                   echo "$(document).ready(function(){
                       $('#data-table').DataTable();
                   });";
                   $this->Html->scriptEnd();
				
					?>
						<div class="col-12 last panel">
						<!-- Show table layout in Admin view -->
						<table cellpadding="0" cellspacing="0" id="data-table">
							<thead>
		                       <tr style="height: 50px">
								<th><?= __('Item Image') ?></th>
								<th><?= __('Item name') ?></th>
								<th><?= __('Quantity on hand') ?></th>
								<th><?= __('Item Number') ?></th>
								<th><?= __('Item Barcode') ?></th>
								<th class="actions"><?= __('Actions') ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($items as $item): ?>
								<tr>
								<td><?= $item->photo != NULL ? 
								$this->Html->image('graphics/' . $item->photo, ['alt' => $item->item_name, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?></td>
								<td><?= h($item->item_name) ?></td>
								<td><?= $this->Number->format($item->quantity_on_hand) ?></td>
								<td><?= $this->Number->format($item->item_number, ['pattern' => '########']) ?></td>
								<td><?= $this->Number->format($item->barcode, ['pattern' => '########']) ?></td>
								<td class="actions">
								<?= $this->Html->link(__('View'), ['action' => 'view', $item->id], ['class' => 'label']) ?>
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id], ['class' => 'label']) ?>
								<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete item {0} with item number {1} ?', $item->item_name, $item->item_number), 'class' => 'label danger']) ?>
								<!-- <?= $this->Html->link(__('Add to Shopping Cart'), ['controller' => 'Shopcart', 'action' => 'addItem', $item->id], ['class' => 'label']) ?> -->
								</td>
								</tr>

								<?php endforeach; ?>
							</tbody>
						</table>
				</div>
				<?php
				} else {
				?>
				<div class="col-3 sidebar user" id="userRole">
				
					<div class="module">
						<h3>
							Sort by
						</h3>
						<?= $this->Paginator->sort('item_name') ?>
						<?= $this->Paginator->sort('quantity_on_hand') ?>
						<?= $this->Paginator->sort('item_number') ?>
						<hr>
						<h3>
							Orders
						</h3>
						<a href="orders">
							Check orders
						</a>
						<hr>
						<h3>
							Shopping Cart
						</h3>
						<a href="shopcart">
							View Cart
						</a>
					</div>
				</div>
				<div class="col-9 last main">
					<?php
					$count = 0;
					foreach ($items as $item):
					$count++;
					?>
						<div class="col-4 item-container <?php if($count%3 == 0) { echo "last"; } ?>">
							<div class="item-image-container">
						<?= $item->photo != NULL ? 
								$this->Html->image('graphics/' . $item->photo, ['alt' => $item->item_name, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?>
							</div>
							<div class="info">
								<h3 class="item-name">
								<?= h($item->item_name) ?>
								</h3>
								
								<div>
								<span class="item-quantity">
								#<?= $this->Number->format($item->quantity_on_hand) ?>
								</span>
								<img class="barcode-container" data-barcode="<?= $this->Number->format($item->barcode, ['pattern' => '########']) ?>">
								<?= $this->Html->link(__('Add to Shopping Cart'), ['controller' => 'Shopcart', 'action' => 'addItem', $item->id], ['class' => 'label']) ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="clearfix"></div>
				</div>
			<?php
		}
	}
?>

