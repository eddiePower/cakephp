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
<body>
	
	<?php echo $this->element('header'); ?>
	
  <main class="site-main">
  	<div class="main-inner container">
  		<div class="row">
  		<div class="col-md-8 image-container-outer">
  			<h1>
  				About us
  			</h1>
  			<p class=''>Welcome to IBAustralia's Solemate Doormats this is your B2B one stop shop for all things doormats.  Feel free to contact us for details on how your business can get the best deals in town on your new exciting doormat range.</p>
			<div class="spinner-container center">
 				<div class="spinner">
 				</div>
 			</div>
  			<div class="container">
  				
  			</div>
  		</div>
  		
  	 	<div class="col-md-4 panel">
    		<h2 class="nav-title"><?= __('Menu') ?></h2>
				<nav>
					<?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'add'], array('class' => 'button')) ?>
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
			
			<div class="col-md-12 last">
				<h2>
					Our process
				</h2>
			</div>
			
			</div>
    
  	</div>
	</main>
	
	<?php echo $this->element('footer'); ?>
	
</body>
</html>
