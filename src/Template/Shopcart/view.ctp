<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Shopcart'), ['action' => 'edit', $shopcart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shopcart'), ['action' => 'delete', $shopcart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcart->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shopcart'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shopcart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="shopcart view large-10 medium-9 columns">
    <h2><?= h($shopcart->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $shopcart->has('user') ? $this->Html->link($shopcart->user->email, ['controller' => 'Users', 'action' => 'view', $shopcart->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($shopcart->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($shopcart->created) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Items') ?></h4>
    <?php if (!empty($shopcart->items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Item Name') ?></th>
            <th><?= __('Quantity On Hand') ?></th>
            <th><?= __('Item Number') ?></th>
            <th><?= __('Photo') ?></th>
            <th><?= __('Photo Dir') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($shopcart->items as $items): ?>
        <tr>
            <td><?= h($items->id) ?></td>
            <td><?= h($items->item_name) ?></td>
            <td><?= h($items->quantity_on_hand) ?></td>
            <td><?= h($items->item_number) ?></td>
            <td><?= h($items->photo) ?></td>
            <td><?= h($items->photo_dir) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
