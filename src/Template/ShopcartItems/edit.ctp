<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <nav class="nav-container">
        <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shopcartItem->id],
                ['class' => 'nav-item'],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shopcartItem->id)]
            )
        ?>
        <?= $this->Html->link(__('List Shopcart'), ['action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
    </nav>
    
</div>
<div class="shopcartItems form large-10 medium-9 columns">
    <?= $this->Form->create($shopcart, []) ?>
    <?php if (!empty($shopcart)): ?>
    <table cellpadding="0" cellspacing="0" style="width: 97%;">
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
        
        <?php $total = 0.00; 
            debug($shopcartItem);
        ?>
                <?php foreach ($itemDetails as $item): ?>
        <tr>
            <td><?= h($item['item_name']) ?></td>
            <td><?= $this->Form->text('quantity', ['value' => $shopcartItem['quantity']]) ?></td>
            <td><?= h($item['item_number']) ?></td>
            <td><?= $item['photo'] != NULL ? $this->Html->image('graphics/' . $item['photo'], ['alt' => $item['item_name'], 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?></td>
            <td><?= $this->Number->currency($item['base_price'], 'USD') ?></td>
                <?php $total += ($item['base_price'] * $shopcartItem['_joinData']['quantity']); ?>
                <td><?= $this->Number->currency($total, 'USD') ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View Item info'), ['controller' => 'items', 'action' => 'view', $shopcartItem->item_id], ['class' => 'label']) ?>
                <!-- ADD IN THE EDIT CART ITEM DETAILS FOR THE SHOPPING CART ITEM, IE QTY similar to the ADD PAGE -->
                
                <?= $this->Form->postLink(__('Remove Item from Cart'), ['controller' => 'ShopcartItems', 'action' => 'delete', $shopcartItem['id']],  ['class' => 'label danger'], ['confirm' => __('Are you sure you want to delete this item from your cart, Item Name:  {0}?', $shopcartItem->item_name)]) ?>

            </td>
        </tr>
       <?php 
            
           endforeach; 
       ?>
        <tr><td colspan='4'><?= $this->Form->button(__('Submit')) ?></td><td colspan='3'><?= $this->Form->button(__('Cancel'), ['action' => 'index']) ?></td></tr>
    </table>
    <?php else: ?>
         <tr><td colspan="6"><p>No Items selected in your cart. Visit our <?= $this->Html->link(__('items page'), ['controller' => 'Items', 'action' => 'index'], ['title' => 'Click to visit our stocked items page']) ?> to start your order.</p></td></tr>
    <?php endif; ?>
    </div>

    <?= $this->Form->end() ?>
</div>
