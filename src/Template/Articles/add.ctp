<h1>Add Article</h1>
 <?php
      echo "<p />";
      echo $this->Form->create($article);
     
?>
    <table border="0" width="90%">
    <tr>
        <td class="heading"></td>
        <td class="data">
            <?php echo $this->Form->input('title', ['label' =>'News Title','size'=>'80']);?>
        </td>
    </tr>
    <tr>
        <td class="heading"></td>
        <td class="data">
            <?= $this->Form->input('post', ['rows' => '15', 'cols' => '95', 'label'=>'News Post']) ?>
        </td>
    </tr>
</table>
<table border="0" width="90">
    <tr>
        <td><?php echo $this->Form->submit(__('Save Article', true), ['name' => 'Save Article', 'div' => false]); ?></td>
    </tr>
</table>
