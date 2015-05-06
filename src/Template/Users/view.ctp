<div class="actions columns large-2 medium-3">
    <h3><?= __('User Actions') ?></h3>
    
    <table class="table">
       <tbody>
         <tr><td><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-default']) ?> </td>
           <td><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete user {0}?', $user->email), 'class' => 'btn btn-sm btn-danger']) ?></td>
           <td><?= $this->Html->link(__('List Users'), ['action' => 'index'],['class' => 'btn btn-sm btn-default']) ?></td>
           <td><?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?></td>
           <td><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'btn btn-sm btn-default']) ?></td>
           <td><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?> </td></tr>
        </tbody>
      </table>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->email) ?></h2>
    <div class="row">
      <table class="table table-bordered table-striped">
       <tbody>
         <tr>
            <th><?= __('User Email') ?></th> 
            <td><?= h($user->email) ?></td>
         </tr>    
         <tr>
            <th><?= __('User Password') ?></th> 
            <td><?= h($user->password) ?></td>
         </tr>
         <tr>
            <th><?= __('User Role') ?></th> 
            <td><?= h($user->role) ?></td>
         </tr>
         <tr>
            <th><?= __('Account Id') ?></th> 
            <td><?= $this->Number->format($user->id) ?></td>
         </tr>
         <tr>
            <th><?= __('Account Created') ?></th> 
            <td><?= h($user->created) ?></td>
         </tr>
       </tbody>
      </table>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
   <?php if (!empty($user->customers)): ?>
    <h4 class="subheader"><?= __('User Related Customers') ?></h4>
    <table class="table table-bordered table-striped">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Cardnum') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Balance') ?></th>
            <th><?= __('Type') ?></th>
            <!-- <th><?= __('User Id') ?></th> -->
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->customers as $customers): ?>
        <tr>
            <td><?= h($customers->id) ?></td>
            <td><?= h($customers->name) ?></td>
            <td><?= h($customers->cardnum) ?></td>
            <td><?= h($customers->phone) ?></td>
            <td><?= h($customers->balance) ?></td>
            <td><?= h($customers->type) ?></td>
            <!-- <td><?= h($customers->user_id) ?></td> -->

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id],['class' => 'btn btn-sm btn-default']) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id],['class' => 'btn btn-sm btn-default']) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete user {0}?', $customers->email), 'class' => 'btn btn-sm btn-danger']) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <?= $this->Flash->render('Test render flash') ?>
    </div>
</div>
