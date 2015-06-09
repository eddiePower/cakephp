<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

$cakeDescription = 'SoleMate DoorMats built on CakePHP v3';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>

<?= $this->Html->css(['lightgrid']) ?>
</head>
<body>
	<header class="site-header">
   <nav class="header-nav">
		 <h1 class="header-nav-title center">
		 <?= $this->Html->image('http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif') ?>
		 </h1>
		</nav>
	</header>
  <main class="site-main">
  	<div class="main-inner row">
  		<div class="col-8">
  			<h1>
  				Solemate doormats
  			</h1>
  			<p class=''>Welcome to IBAustralia's Solemate Doormats this is your B2B one stop shop for all things doormats.  Feel free to contact us for details on how your business can get the best deals in town on your new exciting doormat range.</p>
  			<div class="clearfix">
					<div class="col-4 panel">
						<?php echo $this->Html->image('mat1.jpg', ['class' => 'panel-img']); ?>
						<h4 class="center">Sample1</h4>
					</div>
					<div class="col-4 panel">
						<?php echo $this->Html->image('mat2.jpg', ['class' => 'panel-img']); ?>
						<h4 class="center">"Grandchildren spoiled here"</h4>
					</div>
					<div class="col-4 last panel">
						<?php echo $this->Html->image('mat3.jpg', ['class' => 'panel-img']); ?>
						<h4 class="center">"This is not a joke"</h4>
					</div>
  			</div>
  			<div class="clearfix">
					<div class="col-4 panel">
						<?php echo $this->Html->image('mat4.jpg', ['class' => 'panel-img']); ?>
						<h4 class="center">Fisherman</h4>
					</div>
					<div class="col-4 panel">
						<?php echo $this->Html->image('mat5.jpg', ['class' => 'panel-img']); ?>
						<h4 class="center">Warning1</h4>
					</div>
					<div class="col-4 last panel">
						<?php echo $this->Html->image('mat6.jpg', ['class' => 'panel-img']); ?>
						<h4 class="center">Warning2</h4>
					</div>
  			</div>
  			
  		</div>
  		
  	 	<div class="col-4 last panel">
    		<h2 class="nav-title"><?= __('Menu') ?></h2>
				<nav>
					<?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'add'], array('class' => 'button')) ?>
					<?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], array('class' => 'button')) ?>
					<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'button')) ?>
					<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'button')) ?>
				</nav>
			</div>
    
  	</div>
	</main>
</body>
</html>
