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
  			About our doormats
  		</h1>
  		<div class="col-10 offset-1 last panel">
  			
<p>Solemate coir doormats are handmade by locals in Kerala, the most Southwestern state in India. This is a vital cottage industry, providing a fair and steady source of income and supporting a sustainable community.</p>
<?php echo $this->Html->image('pages/about-our-mats-1.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-2.jpg', array('alt' => 'about-our-mats-image')); ?>
<p>Coir comes from the husk of coconuts. It is a 100% natural and renewable fiber. The pictures above feature coconut husks before and after they’ve been spun.</p>
<?php echo $this->Html->image('pages/about-our-mats-3.jpg', array('alt' => 'about-our-mats-image')); ?>
<p>The coir is then hand-woven into a mat.
  The dyes used for our doormats are fade resistant and eco-friendly.
</p>
<?php echo $this->Html->image('pages/about-our-mats-4.jpg', array('alt' => 'about-our-mats-image')); ?>
<p>Each mat is hand-stenciled and dyed.</p>
<?php echo $this->Html->image('pages/about-our-mats-5.jpg', array('alt' => 'about-our-mats-image')); ?>
<p>After it’s made, each mat is then reviewed for quality. Our Handmade Collection is entirely made by hand, ensuring that your mat is of the highest quality.</p>
<h3><a id="Product_Information_12"></a>Product Information</h3>
<p><em>Coir doormats</em></p>
<p>Made from the highest quality coir yarn, our doormats are stenciled with trendsetting designs. Our copyrighted designs are licensed from artists in the U.S. who are experienced in creating quality artwork, offering the popular colors and motifs of today. Best of all, our designs resist fading and running!</p>
<p>Hand-woven in India, our 100% natural coir doormats are hand stenciled with permanent, fade-resistant, eco-friendly dyes.They are made for outdoor use, preferably under a protected area to prolong their life.
  <strong>F</strong> - Our best quality.  Double thick, densely woven fibers, stenciled or woven designs. Available in three different dimensions 18x30, 18x47 and 36x72.  They are 1.5 inches thick and weigh from 7.5 to 11 lbs depending on size.
  <strong>S</strong> - Stenciled on bleached coconut, these high quality doormats are densely woven and are ¾ inch thick.  Available in 18x30 inches only. Weight: 3.4lbs.
</p>
<?php echo $this->Html->image('pages/about-our-mats-6.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-7.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-8.jpg', array('alt' => 'about-our-mats-image')); ?>
<p><em>Handmade Collection</em></p>
<p><strong>S</strong> Made of coir entirely by hand. These are 18&quot; x 30&quot; and .75&quot; thick. Each mat weighs approximately 3.5 lbs.
  <strong>F</strong> These mats are made by hand from coir. They are availale in three different sizes: F 18&quot; x 30&quot;, F-L 18&quot;x47&quot;, and F-E 36&quot;x72&quot;. They are all 1.5&quot; thick and weigh between 7-31 lbs depending on the size.
  <em>Sweet Home Collection</em>
</p>
<p><strong>P</strong> - This mat is made of coir with a non-slip backing. These doormats are 17” x 28” and .5” thick. Each mat weighs approximately 4 pounds.</p>
<p><em>Exotic Wood Collection</em></p>
<p><strong>E</strong> - These mats vary in style, but all are made from either teak, rubberwood, rosewood, mangris, durian, or a combination as noted in the mat’s description. They are 18&quot; x 30&quot; and 1/3&quot; thick. The weight depends on the style. Exotic Wood mats are also available as rugs, sized 36&quot; x 71&quot;.</p>
<p>Suitable for indoor or outdoor use.</p>
<p>Care: Wipe with damp cloth. Wood oil may be used when necessary. Do not use detergent or soap. Outside use may alter the wood to a beautiful silver petina. This transformation adds to the natural character of the mat and will not affect its performance in any way.</p>
<?php echo $this->Html->image('pages/about-our-mats-9.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-10.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-11.jpg', array('alt' => 'about-our-mats-image')); ?>
<p>Non-slip rubber grips on the back to prevent slipping:</p>
<?php echo $this->Html->image('pages/about-our-mats-12.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-13.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-14.jpg', array('alt' => 'about-our-mats-image')); ?>
<p><em>Weather Beaters Collection</em></p>
<p><strong>B</strong> - Made of polypropylene fabric with a rubber back, these mats are great for absorbing water and snow. They are 22&quot; x 35&quot; and 5mm thick and weigh approximately 3.5 lbs.
  Suitable for indoor or outdoor use.
</p>
<ul>
  <li>Care: Shake, sweep, or vacuum clean.</li>
</ul>
<?php echo $this->Html->image('pages/about-our-mats-15.jpg', array('alt' => 'about-our-mats-image')); ?>
<?php echo $this->Html->image('pages/about-our-mats-16.jpg', array('alt' => 'about-our-mats-image')); ?>
<p><em>Timeless Rubber Collection</em></p>
<p><strong>R</strong> - Made of recycled rubber mixed with natural latex, these environmentally friendly mats have the rich look of traditional Victorian Wrought iron at an affordable price. The rubber is flexible, yet tough enough for use as a boot scraper.  Their durability means that they are also ideal for outdoor use. Various sizes available, approximately ½ inch thick. Weight: varies from 8 to 14 lbs each.</p>
<p><em>Bootscraper Collection</em></p>
<p><strong>BR</strong> (Bootscraper) - These mats are made from a combination of recycled rubber and coir. They are very durable and are tough enough to be used as a bootscraper. They come in a variety of sizes and weights.</p>
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
