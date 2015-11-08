
<div class="col-md-12">

	<h1 class="center page-title">
		Shopping cart Items
	</h1>

</div>

<div class="col-md-12">
    <nav class="nav-container">
        <?php $cartID = ("10"); ?>
        <?= $this->Html->link(__('New Shopcart Item'), ['action' => 'add', $cartID], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Shopcart'), ['controller' => 'Shopcart', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Shopcart'), ['controller' => 'Shopcart', 'action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'nav-item']) ?>
    </nav>
</div>

<div class="col-md-12">
<div class="shopcartItems index panel">
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
    <!--<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>-->
</div>
</div>
