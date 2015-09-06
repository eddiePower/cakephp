<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="suppliers form large-10 medium-9 columns">
    <?= $this->Form->create($supplier); ?>
    <fieldset>
        <legend><?= __('Edit Supplier') ?></legend>
        <?php
            echo $this->Form->input('supplier_name');
            echo $this->Form->input('supplier_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
