
<div class="users index large-10 medium-9 columns">
<h4>Hi there <?= $username . ',<br />Role: ' . $userRole; ?> </h4>
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('password') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('role') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->email) ?></td>
            <!-- Used a cake truncate method for somthing different, can also use tail for end of string -->
            <td><?= h($this->Text->truncate($user->password, 20, ['ellipsis' => '...', 'exact' => true])) ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->role) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class' => 'btn btn-sm btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class' => 'btn btn-sm btn-default']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete user {0}?', $user->email), 'class' => 'btn btn-sm btn-danger']) ?>
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
