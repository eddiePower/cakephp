<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
        <nav class="nav-container">
        <?= $this->Html->link(__('List Shopcart Items'), ['action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Shopcart'), ['controller' => 'Shopcart', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Shopcart'), ['controller' => 'Shopcart', 'action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
        </nav>
</div>
<div class="col-12 last panel">
<div class="shopcartItems form large-10 medium-9 columns">
<?= $this->Form->create(null, [
    'horizontal' => true,
    'cols' => [ // Total is 12, default is 2 / 6 / 4
        'label' => 2,
        'input' => 3,
        'error' => 7  //at end of inline
    ]
]) ?>
<table cellpadding="0" cellspacing="0" id="data-table">
<thead>
<tr style="height: 50px">
<th><?= __('Item Image') ?></th>
<th><?= __("Item Name") ?></th>
<th><?= __("Quantity to Order") ?></th>
<th colspan="2"><?= __("Price Per unit") ?></th>
</tr>
</thead>
<tbody>
<tr>
<?= $this->Form->hidden($itemID); ?>
<td><?= $itemPic != NULL ? $this->Html->image('graphics/' . $itemPic, ['alt' => $itemName, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?></td>
<td><?= __($itemName) ?></td>
<td><label>Qty to Order</label><input type="text" placeholder="1" id="qtyToOrder" name="QtyToOrder"  maxlength="5" size="3" /></td>
<td> * </td><td><label><?php echo $this->Number->currency($itemCost, 'USD'); ?></label></td>
</tr><tr>
   	<td><?= $this->Form->button(__('Add to Cart'), ['class' => 'positive']) ?></td>
   	<td colspan="4"><?= $this->Form->button(__('Cancel'), ['class' => 'negative']) ?>
	<?= $this->Form->end() ?></td>
	</tr></tbody>
</table>
</div>
<!-- <?= __("DEBUG DATA: <br />The item image to show is " . $itemPic . " and the name is " . $itemName . ". The quantity to order is going to be sent to the shopcartItems controller, the base price is $" . $itemCost) ?> -->
</div>
