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
					Contact
				</h1>
				<div class="col-md-12 last panel">
				<p>
					We are a small family run business based in Moorabbin, Victoria. Come down to our warehouse to take a visit.
				</p>
				<p>
					<b>
						Address :
					</b>
					4 Shearson Crescent
					Mentone, Vic 3194
					Australia
				</p>
				<p>
					<b>
						Phone :
					</b>
					(03) 9583 1300 
				</p>
				<div id="map">
					<img class="center" src="http://maps.googleapis.com/maps/api/staticmap?center=4+Shearson+Crescent+Mentone,+Vic+3194+Australia&zoom=14&scale=1&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:1%7C4+Shearson+Crescent+Mentone,+Vic+3194+Australia">
				</div>
				</div>
  		</div>
  	</div>
	</main>
	
	<?php echo $this->element('footer'); ?>
			
	</body>
</html>
