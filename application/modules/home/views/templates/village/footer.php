<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php
			if(!empty($meta['contact']))
			{
				$contact = $meta['contact'];
				?>
				<h3><?php echo $contact['name'] ?></h3>
				<ul>
					<li><i class="fas fa-location-arrow"></i> <p><?php echo $contact['address'] ?></p></li>
					<li><i class="far fa-envelope"></i> <p><?php echo $contact['email'] ?></p></li>
					<li><i class="fas fa-phone-alt"></i> <p><?php echo $contact['phone'] ?></p></li>
					<li><i class="fas fa-whatsapp"></i> <p><?php echo $contact['wa'] ?></p></li>
				</ul>
				<?php
			}?>
		</div>	
		<div class="col-md-3">
			<h5>Nav Links</h5>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Kategori</a></li>
				<li><a href="#">Tentang</a></li>
				<li><a href="#">Kontak</a></li>
				<li><a href="#">Acara</a></li>
				<li><a href="#">Donatur</a></li>
				<li><a href="#">Dana</a></li>
			</ul>
		</div>	
		<div class="col-md-3">
			<h5>Nav Links</h5>
			<ul>
				<li>Satu</li>
				<li>Dua</li>
				<li>Tiga</li>
				<li>Empat</li>
				<li>Lima</li>
			</ul>
		</div>	
		<div class="col-md-3">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<form>
				<div class="input-btn">
					<input type="text" name="" placeholder="Your email">
					<button style="font-weight: bold;text-transform: uppercase;">Subscribe</button>
				</div>
			</form>
		</div>	
	</div>
	<br>
	<hr>
	<p style="margin: 0;padding: 0;height: 60px;line-height: 45px;">&copy; Copyright 2019 All Right Reserved. <a style="color: #16a085;" href="https://github.com/salungp">BySalung</a></p>
</div>