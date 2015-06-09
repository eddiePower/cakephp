<h1 class="center">
User Login
</h1>

<div class="col-4 offset-4 panel">

<label style="background: yellow; color: black">@Heisenburg team mates:<br />Now Using Username as login ID for easier development.<br />linc, jus, tester1 are some for development Password i think is the pw. will remove this label soon</label>

    <?= $this->Form->create(null, 
    [
    'horizontal' => true,
    'cols' => [ // Total is 12, default is 2 / 6 / 4
        'label' => 2,
        'input' => 5,
        'error' => 5  //at end of inline
    ]
]) ?>
    <?= $this->Form->input('username', ['type' => 'text']) ?>
    <?= $this->Form->input('password', ['type' => 'password']) ?>
    <?= $this->Form->input('remember me', ['type' => 'checkbox']) ?>
    <?= $this->Form->submit(__('Log In'), ['class' => 'positive']) ?>
    <?= $this->Form->end() ?>
</div>