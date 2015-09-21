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

$cakeDescription = 'SoleMate DoorMats';
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
		<!-- Add in jQuery and all jScript links here using cakePHP -->		
		<?= $this->Html->script(['https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js','https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js']) ?>
<?= $this->Html->script('utils') ?>
<?= $this->Html->script('index') ?>
</head>
<body>
	<header class="site-header">
   <nav class="header-nav">
		 <h1 class="header-nav-title center">
		 <?= $this->Html->image('http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif') ?>
		 </h1>
		<br />
		 <b><i> &nbsp&nbsp"All our products are produced with environmentally friendly and sustainable processes, using all natural materials."</i></b>
		</nav>
	</header>
	
  <main class="site-main">
  	<div class="main-inner row">
  		<div class="col-8 image-container-outer">
  			<h1>
  				Solemate doormats
  			</h1>
  			<p class=''>Welcome to IBAustralia's Solemate Doormats this is your B2B one stop shop for all things doormats.  Feel free to contact us for details on how your business can get the best deals in town on your new exciting doormat range.</p>
			<div class="spinner-container center">
 				<div class="spinner">
 				</div>
 			</div>
  			<div class="container">
  				
  			</div>
  		</div>
  		
  	 	<div class="col-4 last panel">
    		<h2 class="nav-title"><?= __('Menu') ?></h2>
				<nav>
<!-- 					<?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'add'], array('class' => 'button')) ?> -->
					<?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], array('class' => 'button')) ?>
					
					<?php
				        /*
				           check to see if the session variable is set
				            this happens in the login function in users controller
				           so if its set we know were logged in and to show the menu
				        */
				        //if the session username var is not set or not equal to null then print the extra options
				        if(null !== $this->request->session()->read('username'))
                        {
				    ?>
					<?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'button')) ?>
					<?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'button')) ?>					
				<?php
				    } //end of is a user logged in check
				?>					
				</nav>
			</div>
			
			<div class="col-12 last">
				<h2>
					Our process
				</h2>
				<div class="preview-container clearfix">
					<div class="col-4">
						<?php echo $this->Html->image('pages/our-process-12.jpg', array('alt' => 'our-process')); ?>
					</div>
					<div class="col-4">
						<?php echo $this->Html->image('pages/our-process-11.jpg', array('alt' => 'our-process')); ?>
					</div>
					<div class="col-4">
						<?php echo $this->Html->image('pages/our-process-6.jpg', array('alt' => 'our-process')); ?>
					</div>
				</div>
				
				<blockquote class="quote">
					All our mats are handcrafted from natural fibers
				</blockquote>
				<p>
					IB Australia is an Australian-owned family business promoting a sustainable environmentally friendly, fair trade business.
				</p>
				<p>
				We believe we are making a differences to the villagers by bringing their handcrafted mats to the Australian market, enabling them to have a sustained employed future. We sell all types of mats including but not limited to, novelty, automobilia and traditional mats.
				</p>
				<p>
				  <?= $this->Html->link('Take a look at how we create our mats', '/pages/our-process', ['class' => 'button positive auto']) ?>
				</p>
				<br>
				<br>
				<br>
				<br>
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
