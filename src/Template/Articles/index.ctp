
<h1 class="center">IBAustralia - Rick's News Portal</h1>
        <p>        
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('Welcome ' . $username . " your role is an " . $userRole . " position.<br><nav class='nav-container'>" .
            $this->Html->link("Add Article", ['action' => 'add'], ['class' => 'nav-item'])) : '' 
        ?>
	</nav>
        </p>
<?=
//enable the data-tables jQuery plugin for better table uttils.
$this->Html->scriptStart(['block' => true]);
echo "$(document).ready(function(){
    $('#data-table').DataTable({
    'order': [[ 0, 'desc' ]],
    'pageLength': 25,
    'columnDefs': [
            {
                'targets': [ 0 ],
                'visible': false,
                'searchable': false
            }
        ]
    });
});";
$this->Html->scriptEnd();
?>

<?php if($userRole == 'admin') { ?><!-- Admin view -->
<div class="col-12 last panel">
    <?= $this->Flash->render() ?>
    <table class="table table-bordered table-striped" id="data-table">
    <thead>
	<tr style="height: 50px">
        <th><?= __('ID') ?></th>  <!-- Used for accurate ordering or new things to the top since date sorting wasnt working -->
        <th><?= __('Title') ?></th>
        <th><?= __('Created') ?></th>
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('<th class="actions">Action</th>') : '' ?>
    </tr>
    </thead>
<!-- Here's where we iterate through our $articles query object, printing out article info -->
<tbody>
  <?php foreach ($articles as $article): ?>
    <tr>
    <td><?= h($article->id) ?></td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id], ['class' => 'btn normal']) ?>
        </td>
        <td>
            <?= h($article->created) ?>
        </td>
        <!-- Check to see if user has admin priviliges if so then show edit / delete controles -->
        <?= $userRole == 'admin' ? __('<td class="actions">') : '' ?>
          <?= $userRole == 'admin' ? $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete article {0}?', $article->title), 'class' => 'label danger']) : '' ?>				
          <?= $userRole == 'admin' ? $this->Html->link('Edit', ['action' => 'edit', $article->id], ['class' => 'label']) : '' ?>				
        <?= $userRole == 'admin' ? __('</td>') : '' ?>
        <!--  End of if user has admin support check all done via cake code.  -->
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
    <!--
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
-->
</div>


<?php } else { ?><!-- User view -->
	<?php foreach ($articles as $article): ?>
	<div class="col-8 offset-2 last panel">
		<h2>
			<?= $this->Html->link($article->title, ['action' => 'view', $article->id], ['class' => 'btn normal']) ?>
		</h2>
		<p>
			<?= $this->Html->link($this->Text->truncate(strip_tags($article->post, ''), 60), ['action' => 'view', $article->id], ['class' => 'btn normal']) ?>
		</p>
	</div>
	<?php endforeach; ?>
<?php } ?>