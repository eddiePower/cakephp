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

<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') ?>
<?= $this->Html->script('utils') ?>
<?= $this->Html->script('index') ?>
</head>
<body class="page">
	<header class="site-header">
   <nav class="header-nav">
		 <h1 class="header-nav-title center">
		 <?= $this->Html->image('http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif') ?>
		 </h1>
		</nav>
	</header>
	
  <main class="site-main">
  	<div class="main-inner row">
  		<h1 class="center">
  			About us
  		</h1>
  		<div class="col-10 offset-1 last panel">
  <p>IB Australia is a well established Australian owned family business that has been operating for over 30 years.</p>
<p>In this time IB Australia has developed an extensive network and reputation in the giftware &amp; homewares market space.</p>
<p>The company management’s commitment to environment and sustainability issues has over time seen the business model evolve to a point where every product in our offer is a 100% fully sustainable floor covering including Coir mats, rubber and coir mats and Jute mats and all process from manufacturing to recycling are absolutely natural and environmentally friendly.</p>
<p>Each mat is produced from the Coir husk of Coconuts which provide an endless natural source of raw materials. Local Indigenous craftsmen and women the use hand looms to produce the finished product. The rubber in our rubber and coir mats are made from a combination of recycled and naturally sourced virgin rubber</p>
<p>IB Australia is committed to the highest standards of responsible behavior and integrity in all our relationships with customers, business partners and authorities.</p>
<p>IB Australia has a strong commitment towards our people, customers, partners and the environment and equally to principles such as fairness, honesty, openness, service orientation and friendliness.</p>
  		</div>
    
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
