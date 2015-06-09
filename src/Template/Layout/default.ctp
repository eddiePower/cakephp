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

$cakeDescription = 'SoleMate Doormats - Built on CakePHP v3';
?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
		</title>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
		<?= $this->Html->meta('icon') ?>
		<?= $this->Html->css(['lightgrid']) ?>

		<?= $this->fetch('meta') ?>
		<?= $this->fetch('script') ?>
	</head>

	<body>

		<header class="site-header">
			<nav class="header-nav">
				<h1 class="header-nav-title center">
				<?= $this->Html->image('http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif') ?>
				</h1>				
				<?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Orders'), ['controller' => 'Orders', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Customers'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Couriers'), ['controller' => 'Couriers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Items'), ['controller' => 'Items', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
				<?= $this->Html->link(__('Ricks News'), ['controller' => 'articles', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
			</nav>
			
		</header>

		<main class="site-main">
			<div class="main-inner row">
			<?= $this->fetch('content') ?>
			</div>
		</main>

		<footer class="site-footer">
			<div class="footer-inner row">
				<div class="col-4">
					<h3>
					Contact
					</h3>
					<a href="#">
					Contact info
					</a>
				</div>
				<div class="col-4">
					<h3>
					Faqs
					</h3>
				</div>
				<div class="col-4 last">
					<h3>
						Branding
					</h3>
				</div>
				<div class="col-12 last">
					<p class="center">
						Copyright
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>
