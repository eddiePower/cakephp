<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
     <nav class="nav-container">
<!--         <?= $this->Html->link(__('Edit Shopcart'), ['action' => 'edit', $shopcart->id], ['class' => 'nav-item']) ?> -->
<!--         <?= $this->Form->postLink(__('Delete Shopcart'), ['action' => 'delete', $shopcart->id], ['class' => 'nav-item'], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcart->id)]) ?> -->
<!--         <?= $this->Html->link(__('List Shopcart'), ['action' => 'index'], ['class' => 'nav-item']) ?> -->
        <?= $this->Html->link(__('Checkout'), ['action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('My Account'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?> 
<!--    <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?> -->
        <?= $this->Html->link(__('Item Stock'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
<!--    <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?> -->
    </nav>
</div>
<div class="shopcart view large-10 medium-9 columns">
<!--     <h2><?= h($shopcart->id) ?></h2> -->
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $shopcart->has('user') ? $this->Html->link($shopcart->user->email, ['controller' => 'Users', 'action' => 'view', $shopcart->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($shopcart->created) ?></p>
        </div>
         <div class="large-5 columns strings">
            <h4><?= __('Cart Total') ?></h6>
            <p><?= $this->Number->currency($cartTotal, 'USD') ?></p>
            <h4><?= __('Cart GST') ?></h6>
            <p><?= $this->Number->currency($gst, 'USD') ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Items in ShoppingCart') ?></h4>
    <?php if (!empty($shopcart->items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <!-- <th><?= __('Id') ?></th> -->
            <th><?= __('Item Name') ?></th>
            <th><?= __('Quantity Ordered') ?></th>
            <th><?= __('Item Number') ?></th>
            <th><?= __('Photo') ?></th>
            <th><?= __('Price') ?></th>
            <th><?= __('Total Ordered') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php $total = 0.00; ?>
        <?php foreach ($shopcart->items as $items): ?>
        <tr>
            <td><?= h($items->item_name) ?></td>
            <td><?= h($items['_joinData']['quantity']) ?></td>
            <td><?= h($items->item_number) ?></td>
            <td><?= $items->photo != NULL ? $this->Html->image('graphics/' . $items->photo, ['alt' => $items->item_name, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?></td>
            <td><?= $this->Number->currency($items->base_price, 'USD') ?></td>
                <?php $total += ($items->base_price * $items['_joinData']['quantity']); ?>
                <td><?= $this->Number->currency($total, 'USD') ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View Item info'), ['controller' => 'items', 'action' => 'view', $items->id], ['class' => 'label']) ?>
                <!-- ADD IN THE EDIT CART ITEM DETAILS FOR THE SHOPPING CART ITEM, IE QTY similar to the ADD PAGE -->
                
                <?= $this->Form->postLink(__('Remove Item from Cart'), ['controller' => 'ShopcartItems', 'action' => 'delete', $items['_joinData']['id']],  ['class' => 'label danger'], ['confirm' => __('Are you sure you want to delete this item from your cart, Item Name:  {0}?', $items->item_name)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
       
    </table>
    <?php else: ?>
         <tr><td colspan="6"><p>No Items selected in your cart. Visit our <?= $this->Html->link(__('items page'), ['controller' => 'Items', 'action' => 'index'], ['title' => 'Click to visit our stocked items page']) ?> to start your order.</p></td></tr>
    <?php endif; ?>
    </div>
</div>
