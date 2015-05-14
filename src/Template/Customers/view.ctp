    <h3><?= __('Customer Actions') ?></h3>
      <table class="table">
       <tbody>
         <tr><td><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id],['class' => 'btn btn-sm btn-default']) ?> </td>
           <td><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete the customer {0}?', $customer->name), 'class' => 'btn btn-sm btn-danger']) ?> </td>
           <td><?= $this->Html->link(__('List Customers'), ['action' => 'index'],['class' => 'btn btn-sm btn-default']) ?></td>
           <td><?= $this->Html->link(__('New Customer'), ['action' => 'add'],['class' => 'btn btn-sm btn-default']) ?></td>
           <td><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],['class' => 'btn btn-sm btn-default']) ?></td>
           <td><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'],['class' => 'btn btn-sm btn-default']) ?></td></tr>
        </tbody>
      </table>

<div class="customers view large-10 medium-9 columns">
    <h2><?= h($customer->name) ?></h2>
    <div class="row">
     <table class="table table-bordered table-striped">
       <tbody>
         <tr>
            <th><?= __('Name: ') ?></th> 
            <td><?= h($customer->name) ?></td>
         </tr>    
         <tr>
            <th><?= __('Phone') ?></th> 
            <td><?= h($customer->phone) ?></td>
         </tr>
         <tr>
            <th><?= __('Type') ?></th> 
            <td><?= h($customer->type) ?></td>
         </tr>    
         <tr>
            <th><?= __('User') ?></th> 
            <td><?= $customer->has('user') ? $this->Html->link($customer->user->email, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?></td>
         </tr>
       </tbody>
     </table>

        <!-- <div class="large-2 columns numbers end"> -->
        <?php if($customer->has('user')){ ?>
        <h6>Related Users: </h6>
        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Html->link($customer->user->email, ['controller' => 'Users', 'action' =>'view', $customer->user->id]) ?></td>
            </tr>
            <tr>
            <th><?= __('Cardnum') ?></th>
            <td><?= $this->Number->format($customer->cardnum) ?></td>
            </tr>
            <tr>
            <th><?= __('Balance') ?></th>
            <td><?= '$' . $this->Number->format($customer->balance) ?></td>
            </tr>
          </tbody>
        </table>
        <?php } ?>
        <!-- </div> -->
    </div>
</div>
