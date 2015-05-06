
<div class="users form large-10 medium-7 columns">
<h1 align='center'>Compose email Page!!</h1>
<p> Hello your email to Me welcome back myself and I are glad your talking to us ;)</p>
<p>This has been a debugging email sent to you by team Heisenburg.</p>
<br />
<?php 
        if(isset($testMessage))
        {
          echo "A test message to be sent is now: " . $testMessage . "<br />";
        }
        
        if(isset($emails))
        {
        
           $emailList[] = array();
           $emailString = "";
           
           //debug($emails);
           
           $emailList = explode(" ", $emails);
           $emailString = implode(", ", $emailList);
           
           
          // debug("The email list is now: " . $emails);
           
        }
?>
<br />


    <?= $this->Form->create(null, [
    'horizontal' => true,
    'cols' => [ // Total is 12, default is 2 / 6 / 4
        'label' => 2,
        'input' => 5,
        'error' => 5  //at end of inline
    ]
]) ?>
<p>** No need to enter the , in between email addresses just use spaces (usr@mail.com user2@mail.com) soon it will look more like an email client with email icons when entered like in gMail on google.</p>
<?= $this->Form->input('emails', ['type' => 'text', 'label' => 'Customers to email: ']) ?>
<?= $this->Form->input('subject', ['label' => 'Subject: ']) ?>
<!-- <?= $this->Form->input('bcc', ['label' => 'BCC: ']) ?> -->
<?= $this->Form->input('message', ['type' => 'textarea']) ?>
<?= $this->Form->File('attachment') ?>
<br />
<?= $this->Form->submit(__('Send Email')) ?>
<?= $this->Form->end() ?>

 <?= $this->Html->link(__(' Back'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'btn btn-sm btn-default']) ?>
</div>
