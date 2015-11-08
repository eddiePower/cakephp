<div class="col-md-12">
<h1 class="center page-title">
	<?= __('Edit User') ?>
</h1>
</div>

<div class="col-md-8 col-md-offset-2">
	<div class="panel">
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
				echo $this->Form->input('role', ['options' => ['admin' => 'Admin', 'salesRep' => 'Sales Rep', 'user' => 'User']]);

		}
		?>
		<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
