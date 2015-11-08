<div class="col-md-12">
<h1 class="center page-title">
	Signup
</h1>
</div>

<div class="col-md-4 col-md-offset-4">
	<div class="panel">
       <?= $this->Flash->render(); ?>
       <?= $this->Form->create($user, [
    'horizontal' => true,
    'cols' => [ // Total is 12, default is 2 / 6 / 4
        'label' => 2,
        'input' => 5,
        'error' => 5  //at end of inline
    ]
]) ?>
        
        <?php
            echo $this->Form->input('username', ['help' => 'enter a username for a login alias']);
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('confirm_password', ['label' => 'Confirm Password', 'type' => 'password']);
         		//echo debug($userRole);
	if($userRole == 'admin')
	{
            echo $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'salesRep' => 'Sales Rep', 'user' => 'User']
        ]);
    }
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'positive']) ?>
    <?= $this->Form->end() ?>
	</div>
</div>
