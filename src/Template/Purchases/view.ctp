<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="purchases view large-10 medium-9 columns">
    <h2><?= h($purchase->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Purchase Status') ?></h6>
            <p><?= h($purchase->purchase_status) ?></p>
            <h6 class="subheader"><?= __('Supplier') ?></h6>
            <p><?= $purchase->has('supplier') ? $this->Html->link($purchase->supplier->id, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($purchase->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Purchase Date') ?></h6>
            <p><?= h($purchase->purchase_date) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related PurchaseDetails') ?></h4>
    <?php if (!empty($purchase->purchase_details)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Purchase Id') ?></th>
            <th><?= __('Item Id') ?></th>
            <th><?= __('Quantity Purchased') ?></th>
            <th><?= __('Price Of Item') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($purchase->purchase_details as $purchaseDetails): ?>
        <tr>
            <td><?= h($purchaseDetails->id) ?></td>
            <td><?= h($purchaseDetails->purchase_id) ?></td>
            <td><?= h($purchaseDetails->item_id) ?></td>
            <td><?= h($purchaseDetails->quantity_purchased) ?></td>
            <td><?= h($this->Number->currency($purchaseDetails->price_of_item)) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'PurchaseDetails', 'action' => 'view', $purchaseDetails->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseDetails', 'action' => 'edit', $purchaseDetails->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseDetails', 'action' => 'delete', $purchaseDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetails->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
