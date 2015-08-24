<h1 class="center">Item List</h1>
<nav class="nav-container">
<?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Order Details'), ['controller' => 'OrderDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('List Purchase Details'), ['controller' => 'PurchaseDetails', 'action' => 'index'], ['class' => 'nav-item']) ?>
<?= $this->Html->link(__('New Purchase Detail'), ['controller' => 'PurchaseDetails', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="col-12 last panel">
    <?= $this->Flash->render(); ?>
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= __('Item Image') ?></th>
            <th><?= $this->Paginator->sort('item_name') ?></th>
            <th><?= $this->Paginator->sort('quantity_on_hand') ?></th>
            <th><?= $this->Paginator->sort('item_number') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item->photo != NULL ? 
                $this->Html->image('graphics/' . $item->photo, ['alt' => $item->item_name, 'fullBase' => true, 'class' => 'item_image']) : h('NO Image Yet'); ?></td>
            <td><?= h($item->item_name) ?></td>
            <td><?= $this->Number->format($item->quantity_on_hand) ?></td>
            <td><?= $this->Number->format($item->item_number, ['pattern' => '########']) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $item->id], ['class' => 'label']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id], ['class' => 'label']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete item {0} with item number {1} ?', $item->item_name, $item->item_number), 'class' => 'label danger']) ?>
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
