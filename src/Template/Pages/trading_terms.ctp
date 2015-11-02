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
  			Trading terms
  		</h1>
  		<div class="col-10 offset-1 last panel">
  		<a class="button auto" href="../">
  			Go back
  		</a>
  <p><strong>MINIMUM ORDER:</strong> Is $250.00 or $10.00 surcharge on orders under $250.</p>
<p><strong>Delivery:</strong> allow 7-14 Days for delivery ex-warehouse, F.I.S Melbourne metropolitan area and F.O.B Sydney, Brisbane,
Adelaide and Perth for orders exceeding $500.00, otherwise F.O.B Melbourne.</p>
<p><strong>CARRIER:</strong> F.I.S orders will be sent by our nominated carrier. Onforwarding ex-capital cities is the responsibility of
the buyer who should stipulate their carrier.</p>
<p><strong>PRICES:</strong> Are wholesale, plus sales tax and are subject to change without notice.
All orders carry $6.85 insurance charge.</p>
<p><strong>DISCOUNTS:</strong> Are available for:</p>
<ul>
<li>Carton lots</li>
<li>Cash and carry orders</li>
<li>Indent orders.</li>
</ul>
<p><strong>PAYMENT TERMS:</strong> 5% cash with order, 3.5% 7 days or net 30 days.</p>
<p><strong>NEW ACCOUNTS:</strong></p>
<ul>
<li>An application for credit form must be completed for all customers who require credit .</li>
<li>Credit will only be granted to those with a good credit rating.</li>
<li>Initial three orders to be Pro Forma.</li>
</ul>
<p><strong>CLAIMS:</strong> All claims must be lodged in writing within 7 days of receipt of goods and must include details of invoice
number, date, item number and reason for claim. Freight will be accepted only if returns have been authorized by us
and returned by our nominated carrier.</p>
<p><strong>SHOWROOM &amp; WAREHOUSE:</strong> As we are not able to featured our full range of merchandise in this catalogue
we invite you to visit our showroom and warehouse.</p>
<p><strong>CASH &amp; CARRY:</strong> We also have a cash and carry service which you may take advantage of if you require goods
urgently or if you want to benefit from the lower prices.</p>
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
				<div class="col-4 last">
					<h3>
						Connect with us
					</h3>
					<?= $this->Html->link('Find us on Facebook', 'https://www.facebook.com/Solematedoormats', ['class' => 'footer-link', 'target' => '_blank']) ?>
					<?= $this->Html->link(__('Home'), ['controller' => 'users', 'action' => 'index'], array('class' => 'footer-link')) ?>
					<?= $this->Html->link('Contact us', '/pages/contact-us', ['class' => 'footer-link']) ?>
					<?= $this->Html->link('About us', '/pages/about-us', ['class' => 'footer-link']) ?>
				</div>
				<div class="col-4">
					<h3>
					Faqs
					</h3>
					<?= $this->Html->link('About our doormats', '/pages/about-our-doormats', ['class' => 'footer-link']) ?>
					<?= $this->Html->link('Trading terms', '/pages/trading-terms', ['class' => 'footer-link']) ?>
					<?= $this->Html->link('Our process', '/pages/our-process', ['class' => 'footer-link']) ?>
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
