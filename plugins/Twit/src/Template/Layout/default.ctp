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

$cakeDescription = 'SoleMate Doormats - Built on CakePHP v3';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription; ?>:
        <?= $this->fetch('title'); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        
        echo $this->Html->script(['jQuery', 'bootstrap']);
        echo $this->Html->css(['bootstrap.min', 'cake']);

 
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Solemate Doormats</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><?= $this->Html->link(__(' Register'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'glyphicon glyphicon-user']) ?> </li>
            <li><?= $this->Html->link(__(' Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'glyphicon glyphicon-log-in']) ?> </li>
            <li><?= $this->Html->link(__(' List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'glyphicon glyphicon-th-list']) ?></li>
            <li><?= $this->Html->link(__(' List Customers'), ['controller' => 'Customers', 'action' => 'index'], ['class' => 'glyphicon glyphicon-list-alt']) ?> </li>
            <li><?= $this->Html->link(__(' New Customer'), ['controller' => 'Customers', 'action' => 'add'], ['class' => 'glyphicon glyphicon-floppy-saved']) ?> </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
        <br /><br /><br /><br />
 
        <?= $this->Flash->render(); ?>
 
        <?= $this->fetch('content'); ?>
    </div>
  </body>
</html>