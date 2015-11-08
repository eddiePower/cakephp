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

$cakeDescription = 'SoleMate Doormats';
?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
		</title>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
		<?= $this->Html->meta('icon') ?>
		<?= $this->Html->css(['dropit']) ?>
		<?= $this->Html->css(['http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', 'jquery.dataTables.css', 'flashEmailDivControls.css']) ?>
		<?php echo $this->element('head'); ?>
		
		<!-- Add in jQuery and all jScript links here using cakePHP -->		
		<?= $this->Html->script(['tinymce/tinymce.min.js','https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js','https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js', 'http://code.jquery.com/ui/1.11.4/jquery-ui.js', 'jquery-barcode.js', 'common', 'dropdown', 'snowflake.js', 'siteConfig.js']) ?>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('script') ?>
	</head>

	<body id="smSite">
	
		<?php echo $this->element('header-app'); ?>

		<main class="site-main">
			<div class="main-inner container">
				<div class="row">
					<?= $this->fetch('content') ?>
				</div>
			</div>
		</main>

		<?php echo $this->element('footer'); ?>
		
	</body>
</html>
