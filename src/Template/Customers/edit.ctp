<h1 class="center">
	Edit Customer
</h1>

<div class="col-8 offset-2 panel">
	<?= $this->Form->create($customer, [
	'horizontal' => true,
	'cols' => [ // Total is 12, default is 2 / 6 / 4
	'label' => 2,
	'input' => 5,
	'error' => 5  //at end of inline
	]
	]) ?>
	
	<?php
	echo $this->Form->input('name');
	echo $this->Form->input('cardnum');
	echo $this->Form->input('phone');
	echo $this->Form->input('balance');
	echo $this->Form->input('type');
	echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
	?>
	
	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
