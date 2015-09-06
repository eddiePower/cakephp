<h1 class="center">Purchases</h1>
<nav class="nav-container">
        <?= $this->Html->link(__('New Purchase'), ['action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
        <?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('purchase_date') ?></th>
            <th><?= $this->Paginator->sort('purchase_status') ?></th>
            <th><?= $this->Paginator->sort('supplier_name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($purchases as $purchase): ?>
        <tr>
            <td><?= h($purchase->purchase_date) ?></td>
            <td><?= h($purchase->purchase_status) ?></td>
            <td>
                <?= $purchase->has('supplier') ? $this->Html->link($purchase->supplier->supplier_name, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $purchase->id], ['class' => 'label']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchase->id], ['class' => 'label']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete the purchase record from {0} from supplier: {1}?', $purchase->purchase_date, $purchase->supplier->supplier_name), 'class' => 'label danger']) ?>
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
