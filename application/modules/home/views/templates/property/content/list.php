<?php
if(!empty(@$tpl) && file_exists(APPPATH.'/modules/home/views/templates/'.@$templates['public_template'].'/'.@$tpl.'.php'))
{
  $data = $this->esg->get_esg();
  $data['home'][$tpl]                = $content['data'];
  $data['home'][$tpl][0]['category'] = $content['taxonomy'];
  
  $this->load->view('templates/'.$templates['public_template'].'/'.$tpl, $data);
}else{
	if(!empty(@$_GET['keyword']))
	{
		?>
		<div class="container">
			<?php echo '<h2>Search Result for : '.@$_GET['keyword'].'</h2>';?>
		</div>
		<?php
	}?>
	<?php if (!empty($content['data'])): ?>
		<div class="content-wrap">
			<div class="container clearfix">
				<?php foreach ($content['data'] as $key => $value): ?>
					<center>
						<h3 style="margin-bottom: 0;"><?php echo $value['title'] ?></h3>
						<div style="width: 50px;"><strong><hr style="border-top: 3px solid grey;margin-top: 0; padding-top: 0;"></strong></div>
					</center>
					<p style="font-size: 18px;"><?php echo $value['intro'].'[...]' ?></p>
					<center>
						<a href="<?php echo content_link($value['slug']) ?>" class="btn btn-sm btn-default">Continue Reading</a>
					</center>
					<div class="divider"><hr></div>
				<?php endforeach ?>
				<div class="col-md-12">
					<hr>
					<?php 
					if(!empty($content['pagination']))
				  {
				    echo $content['pagination'];
				  }
					?>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="section">
			<div class="container">
				<?php msg('Maaf Halaman yg Anda inginkan tidak ditemukan','danger')?>
			</div>
		</div>
	<?php endif ?>
	<?php
}