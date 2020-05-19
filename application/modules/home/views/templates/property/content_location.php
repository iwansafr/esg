<?php if (!empty($home['content_location'])): ?>
	<div class="container">
		<center>
			<?php if (!empty($home['content_location']['0']['category']['title'])): ?>
		    <div class="fancy-title title-dotted-border">
		      <h2 style="text-align: center;"><?php echo $home['content_location'][0]['category']['title'] ?></h2>
		    </div>
		  <?php endif ?>
			<?php foreach ($home['content_location'] as $key => $value): ?>
				<div class="col-md-12">
					<a target="_blank" class="btn btn-sm btn-default" href="<?php echo $value['source'] ?>" style="position: absolute;">Lihat Peta Lebih Besar</a>
					<img src="<?php echo image_module('content',$value) ?>" alt="" style="object-fit: cover; height: 200px; width: 100%;">
					<?php echo $value['content'] ?>
				</div>
			<?php endforeach ?>
		</center>
	</div>
<?php endif ?>