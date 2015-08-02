
<h1 class="center">Solemate Doormat's Customer Contact system.</h1>

<?php

echo "<p />";

  echo $this->Form->create('CustomerEmail');

  $CustCount = 0;
  echo "<table border='0' width='90%'>";

  foreach ($customers as $customer)
  {
    //if customer count is equally divisable by 2 then 
    if($CustCount % 2 == 0)
  {
?>

<tr>
    <?php
      }
    ?>
    
    <td width="35%">
        <?php echo $customer->first_name . " " . $customer->last_name;?> <br />
        <?php echo $customer->email; ?>
    </td>
    <td>
        <?php
        $id = $customer->id;
        echo $this->Form->checkbox("Email.checkbox.$id", [
            'label'=>'',
            'legend'=>false,
            'type'=>'checkbox',
        ]);
        ?>
        
      

    </td>
    <?php
      $CustCount++;
      }
    ?>
</tr>
</table>
<br /><br />

<table border="0" width="90%">
    <tr>
        <td class="heading"><p align="right">subject : </p></td>
        <td class="data">
            <?php echo $this->Form->input('subject', ['label' =>'','size'=>'80']);?>
        </td>
    </tr>
    <tr>
        <td class="heading"><p align="right">message : </p></td>
        <td class="data">
            <?= $this->Form->input('message', ['rows' => '15', 'cols' => '95', 'label'=>'']) ?>
        </td>
    </tr>
</table>
<table border="0" width="90">
    <tr>
        <td><?php echo $this->Form->submit(__('Send Email', true), ['name' => 'Send Email', 'div' => false]); ?></td>
    </tr>
</table>
 <?= $this->Html->link(__(' Back'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'button auto']) ?>
