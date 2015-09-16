<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Shopcart'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="shopcart index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
<!--             <th><?= $this->Paginator->sort('id') ?></th> -->
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($shopcart as $shopcart): ?>
        <tr>
<!--             <td><?= $this->Number->format($shopcart->id) ?></td> -->
            <td>
                <?= $shopcart->has('user') ? $this->Html->link($shopcart->user->email, ['controller' => 'Users', 'action' => 'view', $shopcart->user->id]) : '' ?>
            </td>
            <td><?= h($shopcart->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $shopcart->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shopcart->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopcart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopcart->created)]) ?>
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
