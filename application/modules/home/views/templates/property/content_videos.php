<?php if (!empty($home['content_videos'])): ?>
<div class="container">
	<?php if (!empty($home['content_videos'][0]['category'])): ?>
		<center>
			<div class="fancy-title title-dotted-border">
				<h1 class="highlight-me"><?php echo $home['content_videos']['0']['category']['title'] ?></h1>
			</div>
			<p>
				<?php echo $home['content_videos'][0]['category']['description'] ?>
			</p>
		</center>
	<?php endif ?>
</div>
<br>
<br>
<br>
<div class="clearfix"></div>
<div id="oc-images" class="owl-carousel owl-carousel-full news-carousel header-stick bottommargin-lg carousel-widget" data-margin="3" data-loop="true" data-stage-padding="50" data-pagi="false" data-items-xs="1" data-items-lg="<?php echo count($home['content_videos']) ?>">
	<?php foreach ($home['content_videos'] as $key => $value): ?>
		<?php 
		$videos = explode(',',$value['videos']);
		if (!empty($videos))
		{
			foreach ($videos as $vkey => $vvalue)
			{
				?>
				<div class="oc-item" style="margin: 10px;">
					<div class="entry clearfix">
						<div class="entry-image">
							<iframe width="560" height="315" src="<?php echo $vvalue ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<?php
			}
		}?>
	<?php endforeach ?>
</div>
<?php endif ?>
