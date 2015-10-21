<h1 class="center">Users</h1>
<?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $('#data-table').DataTable({
    'order': [[ 0, 'asc' ]]
    });
});";
$this->Html->scriptEnd();
?>
<div class="col-12 last panel">
	<h3>
	Logged in as <?= $username; ?>
	</h3>
	<h3>
	Role: <?= $userRole; ?>
   </h3>
    <?= $this->Flash->render(); ?>
    <br />
    <nav class="nav-container">
	  <?= $this->Html->link(__('Add New User account'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-item']) ?>
    </nav>
    
    <table class="table table-bordered table-striped" id="data-table">
    <thead>
        <tr>
            <th><?= __('Username') ?></th>
            <th><?= __('Email') ?></th>
<!--             <th><?= __('Password') ?></th> -->
            <th><?= __('Date Created') ?></th>
            <th><?= __('User Role') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <!-- Used a cake truncate method for somthing different, can also use tail for end of string -->
<!--             <td><?= h($this->Text->truncate($user->password, 20, ['ellipsis' => '...', 'exact' => true])) ?></td> -->
            <td><?= h($user->created) ?></td>
            <td><?= h($user->role) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class' => 'label']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class' => 'label']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete user {0}?', $user->username), 'class' => 'label danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>

