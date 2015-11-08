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
  			Trading terms
  		</h1>
  		<div class="col-md-12 panel">
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
  	</div>
	</main>
	
	<?php echo $this->element('footer'); ?>
	
	</body>
</html>
