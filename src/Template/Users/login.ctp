
<div class="users form large-10 medium-7 columns">

<h1>User Login</h1>

    <?= $this->Form->create(null, [
    'horizontal' => true,
    'cols' => [ // Total is 12, default is 2 / 6 / 4
        'label' => 2,
        'input' => 5,
        'error' => 5  //at end of inline
    ]
]) ?>
    <?= $this->Form->input('email', ['type' => 'text']) ?>
    <?= $this->Form->input('password', ['type' => 'password']) ?>
    <?= $this->Form->input('remember', ['type' => 'checkbox']) ?>
    <?= $this->Form->submit('Log In') ?>
    <?= $this->Form->end() ?>
</div>