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

$cakeDescription = 'SoleMate Doormats';
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
		<?= $this->Html->css(['dropit']) ?>
		<?= $this->Html->css(['lightgrid', 'http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', 'jquery.dataTables.css']) ?>
		
		<!-- Add in jQuery and all jScript links here using cakePHP -->		
		<?= $this->Html->script(['tinymce/tinymce.min.js','https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js','https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js', 'http://code.jquery.com/ui/1.11.4/jquery-ui.js', 'common', 'dropdown', 'snowflake.js', 'siteConfig.js']) ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('script') ?>
	</head>

	<body id="smSite">
		<header class="site-header">
			<nav class="header-nav">
				<h1 class="header-nav-title center">
					<?= $this->Html->image('http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif') ?>
				</h1>
				<b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"All our products are produced with environmentally friendly and sustainable processes, using all natural materials."</i></b>
				<?php
					/*
					check to see if the session variable is set
					this happens in the login function in users controller
					so if its set we know were logged in and to show the menu
					*/
					/*print_r($_SESSION);*/ // For debugging purposes
					if(isset($_SESSION['username']))
					{
						if($this->request->session()->read()['userRole'] == 'admin') 
						{
							?>
							<?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Orders'), ['controller' => 'Orders', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Customers'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<!--
<?= $this->Html->link(__('Couriers'), ['controller' => 'Couriers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
-->
							<?= $this->Html->link(__('Items'), ['controller' => 'Items', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Shopping Carts'), ['controller' => 'Shopcart', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Ricks News'), ['controller' => 'articles', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?php
						} 
						else 
						{
							?>
							<?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Account Details'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Customer Details'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Shopping Cart'), ['controller' => 'Shopcart', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Items'), ['controller' => 'Items', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Ricks News'), ['controller' => 'articles', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?php
						}
					} //end of a is user logged in check
					?>
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
						Contact us
					</h3>

						<b>Email: </b><span>rick@ibaustralia.com</span>
						<br>
						<b>Phone: </b><span><a href="tel: 0395831300">(03) 9583 1300</a></span>
						<br>
						<b>Address: </b>
						<br><span><a href="https://www.google.com/maps/place/4+Shearson+Cres,+Mentone+VIC+3194,+Australia/@-37.976626,145.082834,17z/data=!3m1!4b1!4m2!3m1!1s0x6ad66c502c193f47:0xc1f944009f3a2274?hl=en" target="_blank">
						4 Shearson Crescent<br>
						Mentone, Vic 3194<br>
						Australia
					</a>
					</span>
				</div>
				<div class="col-4">
					<h3>
					Faqs
					</h3>
					<?= $this->Html->link('About our doormats', '/pages/about-our-doormats', ['class' => 'footer-link']) ?>
					<?= $this->Html->link('Trading terms', '/pages/trading-terms', ['class' => 'footer-link']) ?>
					<?= $this->Html->link('Our process', '/pages/our-process', ['class' => 'footer-link']) ?>
				</div>
				<div class="col-4 last">
					<h3>
						Connect with us
					</h3>
					<?= $this->Html->link('Find us on Facebook', 'https://www.facebook.com/Solematedoormats', ['class' => 'footer-link', 'target' => '_blank']) ?>
					<?= $this->Html->link(__('Home'), ['controller' => 'users', 'action' => 'index'], array('class' => 'footer-link')) ?>
					<?= $this->Html->link('About us', '/pages/about-us', ['class' => 'footer-link']) ?>

				</div>
				<div class="col-12 last">
					<p class="center">
						&copy; 2015 Solemate Doormats - IB Australia
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>