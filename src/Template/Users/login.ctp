<div class="bookmarks index large-7 medium-8 columns" align="center">
<h1>Bookmarker Login</h1>

<?= $this->Form->create() ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>

   <?= $this->Html->link(__('Sign Up!'), ['controller' => 'users', 'action' => 'add']) ?>
</div>