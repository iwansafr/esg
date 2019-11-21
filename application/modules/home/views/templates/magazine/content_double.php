<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (!empty($home['content_popular'])): ?>
	<?php $data['popular'] = $home['content_popular'] ?>
<?php endif ?>
<?php if (!empty($home['content_latest'])): ?>
	<?php $data['latest'] = $home['content_latest'] ?>
<?php endif ?>
<ul class="tab-nav clearfix">
	<?php if (!empty($data['popular'])): ?>
		<li><a href="#tabs-1"><?php echo $data['popular'][0]['category']['title'] ?></a></li>
	<?php endif ?>
	<?php if (!empty($data['latest'])): ?>
		<li><a href="#tabs-2"><?php echo $data['latest'][0]['category']['title'] ?></a></li>
	<?php endif ?>
</ul>

<div class="tab-container">
	<?php $i = 1; ?>
	<?php if (!empty($data)): ?>
		<?php foreach ($data as $key => $value): ?>
			<div class="tab-content clearfix" id="tabs-<?php echo $i;?>">
				<div id="popular-post-list-sidebar">
					<?php foreach ($value as $ckey => $cvalue): ?>
						<div class="spost clearfix">
							<div class="entry-image">
								<a href="<?php echo content_link($cvalue['slug']) ?>" class="nobg"><img class="img-circle" src="<?php echo image_module('content',$cvalue) ?>" alt=""></a>
							</div>
							<div class="entry-c">
								<div class="entry-title">
									<h4><a href="<?php echo content_link($cvalue['slug']) ?>"><?php echo $cvalue['title'] ?></a></h4>
								</div>
								<ul class="entry-meta">
									<li><i class="icon-eye-alt"></i> <?php echo $cvalue['hits'] ?>x dilihat</li>
								</ul>
							</div>
						</div>			
					<?php endforeach ?>
				</div>
			</div>
			<?php $i++; ?>
		<?php endforeach ?>
	<?php endif ?>
</div>