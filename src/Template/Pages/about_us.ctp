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
	<?php echo $this->element('head'); ?>
</head>
<body class="page">
	
	<?php echo $this->element('header'); ?>
	
  <main class="site-main">
  	<div class="main-inner container">
  		<div class="row">
  		<h1 class="center col-md-12 page-title">
  			About us
  		</h1>
  		<div class="col-md-12 panel">
  <p>IB Australia is a well established Australian owned family business that has been operating for over 30 years.</p>
<p>In this time IB Australia has developed an extensive network and reputation in the giftware &amp; homewares market space.</p>
<p>The company management’s commitment to environment and sustainability issues has over time seen the business model evolve to a point where every product in our offer is a 100% fully sustainable floor covering including Coir mats, rubber and coir mats and Jute mats and all process from manufacturing to recycling are absolutely natural and environmentally friendly.</p>
<p>Each mat is produced from the Coir husk of Coconuts which provide an endless natural source of raw materials. Local Indigenous craftsmen and women the use hand looms to produce the finished product. The rubber in our rubber and coir mats are made from a combination of recycled and naturally sourced virgin rubber</p>
<p>IB Australia is committed to the highest standards of responsible behavior and integrity in all our relationships with customers, business partners and authorities.</p>
<p>IB Australia has a strong commitment towards our people, customers, partners and the environment and equally to principles such as fairness, honesty, openness, service orientation and friendliness.</p>
  		</div>
    </div>
  	</div>
	</main>
	
	<?php echo $this->element('footer'); ?>
	
</body>
</html>
