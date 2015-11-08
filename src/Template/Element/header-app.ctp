

<header class="site-header navbar navbar-default">
	<div class="container-fluid">
	
		<!-- Logo & button -->
		<div class="navbar-header">
			
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a class="navbar-brand" href="../">
				<?= $this->Html->image('http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif', array(
					'alt' => 'Logo',
					'class' => 'img-responsive'
				)) ?>
			</a>
			
		</div>
		<!-- Logo & button END -->
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <nav class="nav navbar-nav navbar-right">
				<?php
					/*
					check to see if the session variable is set
					this happens in the login function in users controller
					so if its set we know were logged in and to show the menu
					*/
					/*print_r($_SESSION);*/ // For debugging purposes
					if(isset($_SESSION['username']))
					{
						if($this->request->session()->read()['userRole'] == 'admin') 
						{
							?>
							
							<?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('All Customers'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<!--
		<?= $this->Html->link(__('Couriers'), ['controller' => 'Couriers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Purchases'), ['controller' => 'Purchases', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
		-->
							<?= $this->Html->link(__('Stocked Items'), ['controller' => 'Items', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('User Shopping Carts'), ['controller' => 'Shopcart', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('User Orders'), ['controller' => 'Orders', 'action' => 'index'], array('class' => 'header-nav-item')) ?>

							<?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Ricks News'), ['controller' => 'articles', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?php
						} 
						else 
						{
							?>
							<?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Account Details'), ['controller' => 'Users', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Customer Details'), ['controller' => 'Customers', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Shopping Cart'), ['controller' => 'Shopcart', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Items'), ['controller' => 'Items', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('My Orders'), ['controller' => 'Orders', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?= $this->Html->link(__('Ricks News'), ['controller' => 'articles', 'action' => 'index'], array('class' => 'header-nav-item')) ?>
							<?php
						}
					} //end of a is user logged in check
					?>
				</nav>
		</div>
		
	</div>
</header>