<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_count']))
{
	?>
	<section class="member_counter">
		<div class="container">
			<div class="row">
				<?php foreach ($home['content_count'] as $key => $value): ?>
					<div class="col-lg-3 col-sm-6">
						<div class="single_member_counter">
							<span class="counter"><?php echo $value['content']; ?></span>
							<h4><?php echo $value['title'] ?></h4>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<?php
}