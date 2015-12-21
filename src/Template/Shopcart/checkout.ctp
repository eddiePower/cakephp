<div class="col-md-12">
    <nav class="nav-container">
        <?= $this->Html->link(__('Edit Shopcart'), ['action' => 'edit', $shopcart->id], ['class' => 'nav-item']) ?>
        <?= $this->Form->postLink(__('Delete Shopcart'), ['action' => 'delete', $shopcart->id], ['class' => 'nav-item'], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcart->id)]) ?>
        <?= $this->Html->link(__('List Shopcart'), ['action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Shopcart'), ['action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
<!--         <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?> </li> -->
        <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
<!--         <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?> </li> -->
    </nav>
</div>

<div class="shopcart view col-md-12">
<!--     <h2><?= h($shopcart->id) ?></h2> -->
    <div class="panel">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $shopcart->has('user') ? $this->Html->link($shopcart->user->email, ['controller' => 'Users', 'action' => 'view', $shopcart->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($shopcart->created) ?></p>
        </div>
    </div>
</div>
<div class="col-md-12">
	<div class="panel">
			<div class="column large-12">
			<h4 class="subheader"><?= __('Confirm your order details') ?></h4>
			<!-- Start the checkout form used to check user is ready to check out then on post run checkout -->
			<?php  echo $this->Form->create('checkoutOrder', []); ?>
			<?php if (!empty($shopcart->items)): ?>
			<table cellpadding="0" cellspacing="0">
					 <tr style="height: 50px">
        					<th><?= __('Photo') ?></th>
							<th><?= __('Item Name') ?></th>
							<th><?= __('Quantity Ordered') ?></th>
							<th><?= __('Item Number') ?></th>
							<th><?= __('Price pr unit') ?></th>
							<th><?= __('Ordered Total') ?></th>
					</tr>
					<?php $total = 0; $gst = 0; ?>
					<?php foreach ($shopcart->items as $items): ?>
					<tr>
					        <td><?= $items->photo != NULL ? $this->Html->image('graphics/' . $items->photo, ['alt' => $items->item_name, 'fullBase' => true, 
					                                                                                               'class' => 'checkout_images']) : h('NO Image Yet'); ?></td>
							<td><?= h($items->item_name) ?></td>
							<td><?= h($items['_joinData']['quantity']) ?></td>
							<td><?= h($items->item_number) ?></td>
							
							<?php $total += ($items->base_price * $items['_joinData']['quantity']); ?>
							<td><?= $this->Number->currency($items->base_price, 'USD') ?></td>
							<td><?= $this->Number->currency(($items->base_price * $items['_joinData']['quantity']), 'USD') ?></td>
					</tr>
					<?php endforeach; ?>
					
					<tr><td colspan='6'><hr /></td></tr>					
					<tr><th>Total (exGST):</th><td colspan='5' style='text-align: right'><?= $this->Number->currency($total, 'USD') ?></td></tr>
					<?php $gst = ($total / 10); ?>
					<tr><th>GST amount (10%):</th><td colspan='5' style='text-align: right'><?= $this->Number->currency($gst, 'USD') ?></td></tr>
					<tr><td colspan='6'><hr /></td></tr>
					<?php $total += $gst; ?>
                    <tr><th>Order Total:</th><td colspan='5' style='text-align: right'><?= $this->Number->currency($total, 'USD') ?></td></tr>
			<tr><td><?php echo $this->Form->submit(__('Checkout Order', true), ['name' => 'checkout order', 'div' => false]); ?></td><td colspan='5'><button type="button">Cancel(RETURN TO LAST PAGE)</button></td></tr>
			</table>
			<?php endif; ?>
			<?= $this->Form->end() ?>
			</div>
			<br />
	</div>
</div>
