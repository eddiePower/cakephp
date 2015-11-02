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
  			Our process
  		</h1>
  		<div class="col-10 offset-1 last panel">
  		<a class="button auto" href="../">
  			Go back
  		</a>
<p>Coconuts are fast growing and are considered a “tree of life” for many in developing countries. Found across much of the tropic and subtropic area, the coconut is known for its great versatility as seen in the many domestic, commercial, and industrial uses of its different parts. Coconuts are also part of the daily diet of many people.
Each Doormat is produced from the husk of coconuts and recycled rubber. The doormat is sustainable and environmentally friendly and can be recycled at the end of its life cycle.</p>
<p>The Artisans from the village where the doormats are made, rely on the production of doormats to sustain an employable future. Different suburbs of the village work on different sections of the production of the doormats. Each Artisan is paid a fair wage for their craft.</p>
<h3>What is Coir?</h3>
<p>Coir is a versatile natural fibre extracted from mesocarp tissue, or husk of the coconut fruit. After grinding the husk, the long fibres are removed and used for various industrial purposes, such as making ropes, mats, brushes and sacks.
The Wonders of Coir</p>
<ul>
<li>Easy to clean.</li>
<li>Biodegradable organic fibre.</li>
<li>Tough and durable.</li>
<li>Moth-proof; resistant to fungi.</li>
<li>Unaffected by moisture and dampness.</li>
<li>Resilient; springs back to shape even after constant use.</li>
<li>Provides excellent insulation against temperature and sound.</li>
</ul>
<h3>The Steps in Creating the Tree of Life Doormat</h3>
<?php echo $this->Html->image('pages/our-process-1.jpg', array('alt' => 'our-process-image')); ?>
<p>A total of 38 coconuts are required for a coir door mat.</p>
<?php echo $this->Html->image('pages/our-process-2.jpg', array('alt' => 'our-process-image')); ?>
<p>The coconuts are then husked by hand.</p>
<?php echo $this->Html->image('pages/our-process-3.jpg', array('alt' => 'our-process-image')); ?>
<p>The fibers of the coconut are then spun into a yarn for the mat, on a manual spinning wheel.</p>
<?php echo $this->Html->image('pages/our-process-4.jpg', array('alt' => 'our-process-image')); ?>
<p>The coconut fiber is picked up by the spinning yarn as the Artisan walks backwards.</p>
<?php echo $this->Html->image('pages/our-process-5.jpg', array('alt' => 'our-process-image')); ?>
<p>On the return the yarn is intertwined to produce yarn, ready for the weaving process.</p>
<?php echo $this->Html->image('pages/our-process-6.jpg', array('alt' => 'our-process-image')); ?>
<p>Once the yarn is produced it is taken to another area (suburb) in the village for weaving. Different areas of the village work on the applications to create the Doormat. This household has three looms, many households only have one. This type of loom has been in use for hundreds of years.</p>
<?php echo $this->Html->image('pages/our-process-7.jpg', array('alt' => 'our-process-image')); ?>
<p>One Artisan can only weave 5-6 doormats per day.</p>
<?php echo $this->Html->image('pages/our-process-8.jpg', array('alt' => 'our-process-image')); ?>
<p>After the mat has been woven, the mat is then placed on recycled rubber and a stencil and then heat pressed.</p>
<?php echo $this->Html->image('pages/our-process-9.jpg', array('alt' => 'our-process-image')); ?>
<br>
<?php echo $this->Html->image('pages/our-process-10.jpg', array('alt' => 'our-process-image')); ?>
<br>
<?php echo $this->Html->image('pages/our-process-11.jpg', array('alt' => 'our-process-image')); ?>
<p>Once the mat has been pressed, the stencil is removed and the rubber is cleaned around the mat. Here, the Artisans are working on a larger doormat.</p>
<br>
<p class="center">The final piece – The Tree of Life Doormat</p>
 		<?php echo $this->Html->image('pages/our-process-12.jpg', array('alt' => 'our-process-image','class' => 'center')); ?>
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
