<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Shopcart Item'), ['action' => 'edit', $shopcartItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shopcart Item'), ['action' => 'delete', $shopcartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcartItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shopcart Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shopcart Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Shopcart'), ['controller' => 'Shopcart', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shopcart'), ['controller' => 'Shopcart', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="shopcartItems view large-10 medium-9 columns">
    <h2><?= h($shopcartItem->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Shopcart') ?></h6>
            <p><?= $shopcartItem->has('shopcart') ? $this->Html->link($shopcartItem->shopcart->id, ['controller' => 'Shopcart', 'action' => 'view', $shopcartItem->shopcart->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $shopcartItem->has('item') ? $this->Html->link($shopcartItem->item->id, ['controller' => 'Items', 'action' => 'view', $shopcartItem->item->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($shopcartItem->id) ?></p>
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($shopcartItem->quantity) ?></p>
        </div>
    </div>
</div>
