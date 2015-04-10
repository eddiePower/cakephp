<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks Tags'), ['controller' => 'BookmarksTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmarks Tag'), ['controller' => 'BookmarksTags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="bookmarks form large-10 medium-9 columns">
    <?= $this->Form->create($bookmark); ?>
    <fieldset>
        <legend><?= __('Add Bookmark') ?></legend>
           <!-- <?= $this->Form->input('user_id', ['options' => $users]) ?> -->
            <?= $this->Form->input('title') ?>
            <?= $this->Form->input('description') ?>
            <?= $this->Form->input('url') ?>
            <?= $this->Form->input('tags_string', ['type' => 'text']) ?>
    </fieldset>
    <?= $this->Form->button('Reset the Form', ['type' => 'reset']); ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>