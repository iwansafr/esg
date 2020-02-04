<?php $page_title = ''; ?>
<?php if (!empty($content['taxonomy'])): ?>
	<?php $page_title = $content['taxonomy'] ?>
<?php else: ?>
	<?php $page_title = $content ?>
<?php endif ?>
<section id="page-title" class="page-title-center">
	<div class="container clearfix">
		<?php if (!empty($page_title['title'])): ?>
			<h1><?php echo $page_title['title'] ?></h1>
		<?php endif ?>
		<?php if (!empty($page_title['description']) && !empty($content['taxonomy'])): ?>
			<span><?php echo $page_title['description'] ?></span>
		<?php endif ?>
		<ol class="breadcrumb">
			<li><a href="<?php echo $site['link'] ?>">Home</a></li>
			<li class="active"><?php echo $page_title['title'] ?></li>
		</ol>
	</div>
</section>
