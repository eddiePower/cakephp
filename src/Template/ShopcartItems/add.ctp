<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Shopcart Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Shopcart'), ['controller' => 'Shopcart', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shopcart'), ['controller' => 'Shopcart', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="shopcartItems form large-10 medium-9 columns">
    <?= $this->Form->create($shopcartItem) ?>
    <fieldset>
        <legend><?= __('Add Shopcart Item') ?></legend>
        <?php
            echo $this->Form->input('shopcart_id', ['options' => $shopcart]);
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
