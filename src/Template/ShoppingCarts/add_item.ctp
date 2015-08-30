<h1 class="center">Your Shopping Cart</h1>
<nav class="nav-container">
<?= $this->Html->link(__('Item List'), ['controller'=>'Items', 'action' => 'index'], ['class' => 'nav-item']) ?>
</nav>
<div class="col-12 last panel">
    <?= $this->Flash->render(); ?>
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
        <th>Item Name</th>
        <th>Item Image</th>
        <th>Qty</th>
        <th>Price per unit</th>
        </tr>
    </thead>
    <tbody>
    <tr>
    <td></td>
    <td>image</td>
    <td>qty</td>
    <td> * $per unit</td>
    </tr>
    </tbody>
    </table>
</div>