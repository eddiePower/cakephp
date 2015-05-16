<!--
<div class="actions columns large-2 medium-3">
<h3><?= __('Actions') ?></h3>
<ul class="side-nav">
<li><?= $this->Form->postLink(
__('Delete'),
['action' => 'delete', $user->id],
['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
)
?></li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
</ul>
</div>
********!!!!!!!!!!********--May change this div to sub menu line as in view Users views
-->

<h1 class="center"a>
	<?= __('Edit User') ?>
</h1>

<div class="col-8 offset-2 panel">

	<!--  Create a neater form then the usual baked one!    -->
	<?= $this->Form->create($user, [
	'horizontal' => true,
	'cols' => [ // Total is 12, default is 2 / 6 / 4
	'label' => 2,
	'input' => 5,
	'error' => 5  //at end of inline
	]
	]) ?>

	<?php
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->input('role', [
	'options' => ['admin' => 'Admin', 'user' => 'User']
	]);
	?>

	<?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
	<?= $this->Form->end() ?>
</div>
