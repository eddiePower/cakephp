<div class="col-12 last panel">
	<h3>
	<?= __('Forgot Password System.') ?>
	</h3>
</div>

<!-- Display the Flash messages here if they are needed -->
<?= $this->Flash->render(); ?>

<?php if(!isset($_GET['pwr'])) { ?>
<div class="col-12 last panel">
	<?php 
	      if(!isset($selectedUser)) 
	      { 
	?>
            <?= $this->Form->Create() ?>
            <?= __("Please enter the email address registered with your account<br />") ?>
            <table>
             
                <tr>
                    <th>Registered Email: </th>           
                    <td>    <!-- Grab the registered email address for account to resetPassword on -->
                        <?= $this->Form->text('txtEmail', ['class' => 'resetEmail']) ?>
                    </td>
                </tr> 
            </table>
            <?= $this->Form->submit() ?>
            <?= $this->Form->End() ?>
            
	        <?= $this->Flash->render('Test render flash') ?>
	<?php
		 } 
		 else if(isset($selectedUser))
		 {
            echo ("<h4>We have sent an email to your account " . $selectedUser->email . " with a link to follow which will begin the reset your password process, please follow the instructions mentioned in the email.</h4>");
		 }
	?>
</div>
<?php }
      else
      {
?>

        <div class="col-12 last panel">
        <?php 
            echo "Please enter a new password for your account";
            echo "<br />";
         ?>
        <?= $this->Form->create($user , []); 
	        ?>
           <?= $this->Form->input('password', ['label' => 'Create a new Password', 'placeholder' => '']) ?>
           <?= $this->Form->input('confirm_password', ['label' => 'Confirm Password', 'type' => 'password']) ?>
           <?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
           <?= $this->Form->end() ?>
        </div>
<?php 
      }
?>