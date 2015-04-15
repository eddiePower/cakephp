<h1>
    Bookmarks tagged with
    <?= $this->Text->toList($tags) ?>
</h1>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks Tags'), ['controller' => 'BookmarksTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?> </li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?> </li>
    </ul>
</div>

<section>
<?php foreach ($bookmarks as $bookmark): ?>
  <article>
    <h4><?= $this->Html->link($bookmark->title, $bookmark->url) ?></h4>
        <small><?= h($bookmark->url) ?></small>
        <?= $this->Text->autoParagraph($bookmark->description) ?>
  </article>
 <?php endforeach; ?>
</section>

