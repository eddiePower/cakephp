<footer class="site-footer">
	<div class="footer-inner container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
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
			<div class="col-md-4 col-sm-6">
				<h3>
					Connect with us
				</h3>
				<?= $this->Html->link('Find us on Facebook', 'https://www.facebook.com/Solematedoormats', ['class' => 'footer-link', 'target' => '_blank']) ?>
				<?= $this->Html->link(__('Home'), ['controller' => 'users', 'action' => 'index'], array('class' => 'footer-link')) ?>
				<?= $this->Html->link('Contact us', '/pages/contact-us', ['class' => 'footer-link']) ?>
				<?= $this->Html->link('About us', '/pages/about-us', ['class' => 'footer-link']) ?>
			</div>
			<div class="col-md-4 col-sm-12">
				<h3>
				Faqs
				</h3>
				<?= $this->Html->link('About our doormats', '/pages/about-our-doormats', ['class' => 'footer-link']) ?>
				<?= $this->Html->link('Trading terms', '/pages/trading-terms', ['class' => 'footer-link']) ?>
				<?= $this->Html->link('Our process', '/pages/our-process', ['class' => 'footer-link']) ?>
			</div>
			<div class="col-md-12 col-sm-12">
				<p class="center">
					&copy; 2015 Solemate Doormats - IB Australia
				</p>
			</div>
		</div>
	</div>
</footer>