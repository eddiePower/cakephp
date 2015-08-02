
<h1 class="center">Suppliers</h1>

<nav class="nav-container">
	<?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index'], ['class' => 'nav-item']) ?>
	<?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add'], ['class' => 'nav-item']) ?>
</nav>

<div class="suppliers index col-12 last panel">
    <table>
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('supplier_name') ?></th>
            <th><?= $this->Paginator->sort('supplier_description') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($suppliers as $supplier): ?>
        <tr>
            <td><?= h($supplier->supplier_name) ?></td>
            <td><?= h($supplier->supplier_description) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id], ['class' => 'label']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id], ['class' => 'label']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['class' => 'label danger'], ['confirm' => __('Are you sure you want to delete supplier: {0}?', $supplier->supplier_name)]) ?>
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
