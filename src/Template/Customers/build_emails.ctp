
<h1 class="center">Solemate Doormat's Customer Contact system.</h1>
<?php

  echo "<p />";
  echo $this->Form->create('CustomerEmail');
  
  //draw and flash messages here in the view page.
  echo $this->Flash->render(); 
  
  //set small js block via cakephp used to set the WYSIWYG editor for emails
  echo $this->Html->scriptStart(['block' => true]);
  //set tinymce to show in the message textarea of the form with all these extra functionality / plugins.
  echo "tinymce.init({ selector: '#message',
                       theme: 'modern',
                       skin: 'custom',
                       plugins: ['advlist autolink lists link image  charmap print preview hr anchor pagebreak',
                                'searchreplace wordcount visualblocks visualchars fullscreen',
                                'insertdatetime media nonbreaking save table contextmenu directionality',
                                'emoticons template paste textcolor colorpicker textpattern imagetools'],
                                toolbar1: 'insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                                toolbar2: 'print preview media | forecolor backcolor emoticons',
                                image_advtab: true,
                                relative_urls: false,
                                tools: 'inserttable'});";
   echo $this->Html->scriptEnd(); 
       
   //simple counter for number of customers to send to.     
   $CustCount = 0;

    echo $this->Html->scriptStart(['block' => true]);
  
    echo "$(document).ready(function() {
    
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) 
        { // check select status
            $('.emailCheck').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class              
            });
        }
        else
        {
            $('.emailCheck').each(function() { //loop through each checkbox
                this.checked = false;                      
            });         
        }
    });
    
         $('#button').click(function(){

         if($(this).html() == '+')
         {
            $(this).html('-');
            $('.block').animate({'top': '+=425px'}, 'slow');  
         }
         else
         {  
             $(this).html('+');
             $('.block').animate({'top': '-=425px'}, 'slow');
         }
         $('#box').slideToggle();
      }); 
});";
  echo $this->Html->scriptEnd(); 
  ?>
  
  <div id="widnow">
  <div id="box">
  <table border="0" width="30%">
  <tr>
  <td>
   <input type="checkbox" id="selecctall"/>Select All Customers</td><td>  </td><td>  </td></tr>
</table>
<table border="0" width="90%">
<?php
  
  //create table to display customer email data with.
  echo "<tbody>";
  //store each item in the customers array as customer varibale
  foreach ($customers as $customer)
  {
    //if customer count is equally divisable by 2 then create a new row
    // this keeps our layout nice and neat in a 2 customer per row list.
    if($CustCount % 2 == 0)
    {
?>
<tr>
    <?php
    } //end of customers per row counter.
    ?>  
    <td width="35%">
        <?= __($customer->first_name . " " . $customer->last_name) ?> <br />
        <?php echo $customer->email; ?>
    </td>
    <td>
        <?php
        $id = $customer->id;
        echo $this->Form->checkbox("Email.checkbox.$id", [
            'label'=>'',
            'class' =>'emailCheck',
            'legend'=>false,
            'type'=>'checkbox',
        ]);
        ?>
    </td>
    <?php
      $CustCount++;
      }
    ?>
</tr></tbody>
</table>
</div>
<div id="title_bar">
Click + To Show / - To Hide Emails:
        <div id="button"> - </div>
    </div>
</div>

<br /><br />
<div id='slider' class='block'>
    <table border="0" width="90%">
    <tr>
        <td class="heading"><p align="right">subject : </p></td>
        <td class="data">
            <?php echo $this->Form->input('subject', ['label' =>'','size'=>'80']); ?>
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
</div>