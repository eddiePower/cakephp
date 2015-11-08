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
<?php echo $this->element('head'); ?>
</head>
<body class="page page--home">
	
	<?php echo $this->element('header'); ?>
	
  <main class="site-main" style="background-image:url('<?php echo $this->request->webroot; ?>/img/carpet.png')">
  	<div class="main-inner container">
  		<div class="row">
				<div class="col-md-8 image-container-outer">
					<h1>
						Solemate doormats
					</h1>
					<p class=''>Welcome to IBAustralia's Solemate Doormats this is your B2B one stop shop for all things doormats.  Feel free to contact us for details on how your business can get the best deals in town on your new exciting doormat range.</p>
				<div class="spinner-container center">
					<div class="spinner">
					</div>
				</div>
					<div class="preview-container clearfix">

					</div>
				</div>
  		
  		
				<div class="col-md-4">
					<div class="panel">
						<h2 class="nav-title"><?= __('Menu') ?></h2>
						<nav>
		<!-- 			<?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'add'], array('class' => 'button')) ?> -->
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
				</div>

				<div class="col-md-12 panel">
					<br>
					<h2>
						Our process
					</h2>
					<br>
					<div class="row">
						<div class="col-sm-4">
							<?php echo $this->Html->image('pages/our-process-12.jpg', array('alt' => 'our-process')); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $this->Html->image('pages/our-process-11.jpg', array('alt' => 'our-process')); ?>
						</div>
						<div class="col-sm-4">
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
				</div>
			</div>
    
  	</div>
	</main>
	
	<?php echo $this->element('footer'); ?>
	
</body>
</html>
