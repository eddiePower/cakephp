<div class="col-12 last panel">
	<h3>
	<?= __('Forgot Password System.') ?>
	</h3>


</div>

<div class="col-12 last panel">
	<?php 
	      if(isset($selectedUser)) 
	      { 
	         echo ("<h4>Hi There you want to reset password for the user <b><i><u>" . $selectedUser->username . "</u></b></i></h4>");
	         echo ("<p>Email: " . $selectedUser->email . "<br />");
	         echo ("Password: " . $selectedUser->password . " <=> PW will not be shown in release!<br />Note: You must have access to");
	         echo (" this email address to complete the reset procedure.");
	         echo ("<br />Random sha256 String: " . $tmpString . "<br />we will use Random sha256String ");
	         echo ("to ID the real user in a link sent to their registered email address</p>");
	         echo ("<p style='background: yellow; width: 50%'>Work In Progress, Will look slightly different when finished by eddie ASAP!!</p>");

	      } 
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
    
    <!-- Flash still not working on most pages -->
	<?= $this->Flash->render('Test render flash') ?>
</div>
