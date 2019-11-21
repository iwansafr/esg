<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php if (!empty($meta['contact'])): ?>
	
<?php endif ?>
	<div class="widget clearfix">

		<img src="<?php echo image_module('config','logo'.'/'.$logo['image']) ?>" alt="" class="footer-logo">

		<p><?php echo $meta['contact']['description'] ?></p>

		<div style="background: url('<?php echo $link_template;?>/images/world-map.png') no-repeat center center; background-size: 100%;">
			<address>
				<?php echo $meta['contact']['address'] ?>
			</address>
			<abbr title="Phone Number"><strong>Phone:</strong></abbr> <?php echo $meta['contact']['phone'] ?><br>
			<abbr title="Email Address"><strong>Email:</strong></abbr> <?php echo $meta['contact']['email'] ?>
		</div>

	</div>
