<h1 class="center">
User Login
</h1>

<div class="col-4 offset-4 panel">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create(null, []) ?>
    <?= $this->Form->input('username', ['type' => 'text']) ?>
    <?= $this->Form->input('password', ['type' => 'password']) ?>
    <?= $this->Form->input('remember me', ['type' => 'checkbox']) ?>
    <?= $this->Form->submit(__('Log In'), ['class' => 'positive']) ?>
    <?= $this->Form->end() ?>
    <?= __('<br />') . $this->Form->postLink(__('Forgot my password'), ['action' => 'resetPassword']) ?>
</div>