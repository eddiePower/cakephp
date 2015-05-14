<h1 class="center">
	Signup
</h1>
<div class="panel col-4 offset-4">
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
