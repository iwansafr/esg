<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($home['content_block_'.$number]))
{
	$category = @$home['content_block_'.$number][0]['category'];
	$first_content = $home['content_block_'.$number][0];
	$content_block_1 = $home['content_block_'.$number];
	unset($content_block_1[0]);
	$total_content = count($content_block_1);
	?>
	<div class="fancy-title title-border">
		<h3><?php echo $category['title'] ?></h3>
	</div>

	<div class="ipost clearfix">
		<div class="col_half bottommargin-sm">
			<div class="entry-image">
				<a href="<?php echo content_link($first_content['slug']) ?>"><img class="image_fade" src="<?php echo image_module('content', $first_content);?>" alt="Image"></a>
			</div>
		</div>
		<div class="col_half bottommargin-sm col_last">
			<div class="entry-title">
				<h3><a href="<?php echo content_link($first_content['slug']) ?>"><?php echo $first_content['title'] ?></a></h3>
			</div>
			<ul class="entry-meta clearfix">
				<li><i class="icon-calendar3"></i><?php echo content_date($first_content['created']) ?></li>
				<li><i class="icon-eye"></i> <?php echo $first_content['hits'] ?></li>
				<li><a href="#"><i class="icon-camera-retro"></i></a></li>
			</ul>
			<div class="entry-content">
				<p>
					<?php echo $first_content['description'] ?>
				</p>
			</div>
		</div>
	</div>

	<div class="clear"></div>

	<?php if ($total_content<3): ?>
		<?php
		?>
		<div class="col_half nobottommargin">
			<?php if (!empty($content_block_1[1])): ?>
				<div class="spost clearfix">
					<div class="entry-image">
						<a href="<?php echo content_link($content_block_1[1]['slug']) ?>"><img src="<?php echo image_module('content',$content_block_1[1]) ?>" alt=""></a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h4><a href="<?php echo content_link($content_block_1[1]['slug']) ?>"><?php echo $content_block_1[1]['title'] ?></a></h4>
						</div>
						<ul class="entry-meta">
							<li><i class="icon-calendar3"></i> <?php echo content_date($content_block_1[1]['created']) ?></li>
							<li><a href="#"><i class="icon-eye"></i> <?php echo $content_block_1[1]['hits'] ?></a></li>
						</ul>
					</div>
				</div>
			<?php endif ?>
		</div>

		<div class="col_half nobottommargin col_last">
			<?php if (!empty($content_block_1[2])): ?>
				<div class="spost clearfix">
					<div class="entry-image">
						<a href="<?php echo content_link($content_block_1[2]['slug']) ?>"><img src="<?php echo image_module('content',$content_block_1[2]) ?>" alt=""></a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h4><a href="<?php echo content_link($content_block_1[2]['slug']) ?>"><?php echo $content_block_1[2]['title'] ?></a></h4>
						</div>
						<ul class="entry-meta">
							<li><i class="icon-calendar3"></i> <?php echo content_date($content_block_1[2]['created']) ?></li>
							<li><a href="#"><i class="icon-eye"></i> <?php echo $content_block_1[2]['hits'] ?></a></li>
						</ul>
					</div>
				</div>
			<?php endif ?>
		</div>	
	<?php else: ?>
		<?php
		$first_data = ['0'=>$content_block_1[1], '1'=>$content_block_1[2]];
		$second_data = ['0'=>$content_block_1[3], '1'=>@$content_block_1[4]];
		?>
		<div class="col_half nobottommargin">
			<?php foreach ($first_data as $key => $value): ?>
				<div class="spost clearfix">
					<div class="entry-image">
						<a href="<?php echo content_link($value['slug']) ?>"><img src="<?php echo image_module('content',$value) ?>" alt=""></a>
					</div>
					<div class="entry-c">
						<div class="entry-title">
							<h4><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h4>
						</div>
						<ul class="entry-meta">
							<li><i class="icon-calendar3"></i> <?php echo content_date($value['created']) ?></li>
							<li><a href="#"><i class="icon-eye"></i> <?php echo $value['hits'] ?></a></li>
						</ul>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<div class="col_half nobottommargin col_last">
			<?php foreach ($second_data as $key => $value): ?>
				<?php if (!empty($value)): ?>
					<div class="spost clearfix">
						<div class="entry-image">
							<a href="<?php echo content_link($value['slug']) ?>"><img src="<?php echo image_module('content',$value) ?>" alt=""></a>
						</div>
						<div class="entry-c">
							<div class="entry-title">
								<h4><a href="<?php echo content_link($value['slug']) ?>"><?php echo $value['title'] ?></a></h4>
							</div>
							<ul class="entry-meta">
								<li><i class="icon-calendar3"></i> <?php echo content_date($value['created']) ?></li>
								<li><a href="#"><i class="icon-eye"></i> <?php echo $value['hits'] ?></a></li>
							</ul>
						</div>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>	
	<?php endif ?>

	<?php
}

