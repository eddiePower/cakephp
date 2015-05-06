
<div class="customers index large-10 medium-9 columns">
<h4>Hi there <?= $username . ',<br />Role: ' . $userRole; ?> </h4>
    
    <!--  Begin the form creation for each customers email address.  -->
    <?= $this->Form->Create(null, ['action' => 'buildEmails']) ?>
    <table class="table table-bordered table-striped">
     <thead>
        <tr>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('cardnum') ?></th>
            <th><?= $this->Paginator->sort('phone') ?></th>
            <th><?= $this->Paginator->sort('balance') ?></th>
            <th><?= $this->Paginator->sort('type') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('Email Customer') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>    
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= h($customer->name) ?></td>
            <td><?= $this->Number->format($customer->cardnum) ?></td>
            <td><?= h($customer->phone) ?></td>
            <td><?= "$". $this->Number->format($customer->balance) ?></td>
            <td><?= h($customer->type) ?></td>
            <td>
                <!--  if the customer has a user Id assigned with it then look up the user email -->
                <?= $customer->has('user') ? $this->Html->link($customer->user->email, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?>
            </td>
            <td align='center'>
            
            <!-- This is the email entry point for adding a email selection Form/checkbox for multiple emails to begin i have made a link to email users the customer details for that row. 
                Check and see if email exsists if so then assign it to the array named email, if not add in my email for debuging untill db is updated to ensure all customers have an email
            -->
                <?= $this->Form->checkbox('emails[]', ['hiddenField' => false, 'value' => $customer->has('user') ? $customer->user->email : 'edster2007@gmail.com']) ?>
                
                
                <!-- <?= $this->Html->link(__('Send Email'), array('action' => 'sendEmail', $customer->id)) ?> -->
            </td>
            
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id],['class' => 'btn btn-sm btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id],['class' => 'btn btn-sm btn-default']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete customer {0}?', $customer->name), 'class' => 'btn btn-sm btn-danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>        
    </tbody>
    </table>
    
    <!--  **********END OF EMAIL CHECKBOXES FORM    -->
    <?= $this->Form->submit(__('Compose Email')) ?>
    <?= $this->Form->end() ?>
    <!--  **********END OF EMAIL CHECKBOXES FORM    -->
    
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
