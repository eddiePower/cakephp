
<h1 class="center"a>
	<?= __('Edit User') ?>
</h1>

<div class="col-8 offset-2 panel">
 <?= $this->Flash->render(); ?>
	<!--  Create a neater form then the usual baked one!    -->
	<?= $this->Form->create($user, []) ?>

	<?php
	echo $this->Form->input('username');
	echo $this->Form->input('email');
	echo $this->Form->input('password');
    echo $this->Form->input('confirm_password', ['label' => 'Confirm Password', 'type' => 'password']);
		//echo debug($userRole);
	if($userRole == 'admin')
	{
    	echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'user' => 'User']]);

	}
	?>
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
