<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?php $cartID = ("10"); ?>
        <li><?= $this->Html->link(__('New Shopcart Item'), ['action' => 'add', $cartID]) ?></li>
        <li><?= $this->Html->link(__('List Shopcart'), ['controller' => 'Shopcart', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shopcart'), ['controller' => 'Shopcart', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="col-12 last panel">
<div class="shopcartItems index large-10 medium-9 columns">
 <?= $this->Flash->render(); ?>
 <?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $('#data-table').DataTable();
});";
$this->Html->scriptEnd();
?>
    <table class="table table-bordered table-striped" id="data-table" cellpadding="0" cellspacing="0">
    <thead>
        <tr style="height: 50px">
            <th><?= __('Cart id') ?></th>
            <th><?= __('Item id') ?></th>
            <th><?= __('Quantity Ordered') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($shopcartItems as $shopcartItem): ?>
        <tr>
            <td>
                <?= $shopcartItem->has('shopcart') ? $this->Html->link($shopcartItem->shopcart->id, ['controller' => 'Shopcart', 'action' => 'view', $shopcartItem->shopcart->id]) : '' ?>
            </td>
            <td>
                <?= $shopcartItem->has('item') ? $this->Html->link($shopcartItem->item->id, ['controller' => 'Items', 'action' => 'view', $shopcartItem->item->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($shopcartItem->quantity) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $shopcartItem->id], ['class' => 'label']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shopcartItem->id], ['class' => 'label']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopcartItem->id], ['confirm' => __('Are you sure you want to remove the {0} doormat from your cart?', $shopcartItem->item->item_name, $shopcartItem->item->item_number), 'class' => 'label danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
