<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="suppliers view large-10 medium-9 columns">
    <h2><?= h($supplier->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Supplier Name') ?></h6>
            <p><?= h($supplier->supplier_name) ?></p>
            <h6 class="subheader"><?= __('Supplier Description') ?></h6>
            <p><?= h($supplier->supplier_description) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <!--
<h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($supplier->id) ?></p>
-->
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Purchases From ' . $supplier->supplier_name) ?></h4>
    <?php if (!empty($supplier->purchases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
<!--             <th><?= __('Id') ?></th> -->
            <th><?= __('Purchase Date') ?></th>
            <th><?= __('Purchase Status') ?></th>
            <th><?= __('Supplier Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($supplier->purchases as $purchases): ?>
        <tr>
<!--             <td><?= h($purchases->id) ?></td> -->
            <td><?= h($purchases->purchase_date) ?></td>
            <td><?= h($purchases->purchase_status) ?></td>
            <td><?= h($supplier->supplier_name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Purchases', 'action' => 'view', $purchases->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Purchases', 'action' => 'edit', $purchases->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
