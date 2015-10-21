<div class="actions columns large-2 medium-3">
    <h3><?= __('Checkout Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Shopcart'), ['action' => 'edit', $shopcart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shopcart'), ['action' => 'delete', $shopcart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcart->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shopcart'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shopcart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<!--         <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li> -->
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
<!--         <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li> -->
    </ul>
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
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($shopcart->items as $items): ?>
        <tr>
            <td><?= h($items->item_name) ?></td>
            <td><?= h($items['_joinData']['quantity']) ?></td>
            <td><?= h($items->item_number) ?></td>
            <td><?= $items->photo != NULL ? $this->Html->image('graphics/' . $items->photo, ['alt' => $items->item_name, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?></td>
            <td><?= $this->Number->currency($items->base_price, 'USD') ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View Item info'), ['controller' => 'items', 'action' => 'view', $items->id], ['class' => 'label']) ?>
                <!-- ADD IN THE REMOVE ITEM HERE AND EDIT ITEM DETAILS FOR THE SHOPPING CART ITEM, IE QTY similar to the ADD PAGE -->
                
                <?= $this->Form->postLink(__('Remove Item from Cart'), ['controller' => 'ShopcartItems', 'action' => 'delete', $items['_joinData']['id']],  ['class' => 'label'], ['confirm' => __('Are you sure you want to delete this item from your cart, Item Name:  {0}?', $items->item_name)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
       
    </table>
    <?php endif; ?>
    </div>
        <br />
    <div id="checkout_totals" class="large-2 columns">
        <h3>Cart Total $$</h3>
        will display the cart or order total here with buttons to place the order or cancel the checkout.
        
    </div>
</div>
