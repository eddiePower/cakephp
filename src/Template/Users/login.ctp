<div class="col-md-12">
<h1 class="center page-title">
User Login
</h1>
</div>
 
<div class="col-md-12">
     <!-- show and flash messages here on the view page. -->
     <?= $this->Flash->render(); ?>
</div>

<div class="col-md-4 col-md-offset-4">
   <div class="panel">
    <?= $this->Flash->render(); ?>
    <?= $this->Form->create(null, []) ?>
    <?= $this->Form->input('username', ['type' => 'text']) ?>
    <?= $this->Form->input('password', ['type' => 'password']) ?>
    <?= $this->Form->submit(__('Log In'), ['class' => 'positive']) ?>
    <?= $this->Form->end() ?>
    <?= __('<br />') . $this->Form->postLink(__('Forgot my password'), ['action' => 'resetPassword']) ?>
  </div>
</div>
