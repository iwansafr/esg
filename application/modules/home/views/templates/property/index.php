<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		<?php $this->load->view('menu_top') ?>
		<?php if ($mod['content'] == 'home/index'): ?>
			<?php $this->load->view('content_slider') ?>
			<section id="content">
				<div class="content-wrap">
					<?php $this->load->view('content_views') ?>
					<?php $this->load->view('content_category') ?>
					<?php $this->load->view('content_videos') ?>
					<?php $this->load->view('content_facilities') ?>
					<?php $this->load->view('content_location') ?>
				</div>
			</section>
		<?php else: ?>
			<section id="content">
				<?php $this->load->view('templates/'.$templates['public_template'].'/'.$mod['content']) ?>
				<?php $this->load->view('content_gallery') ?>
				<?php $this->load->view('content_contact') ?>
			</section>
		<?php endif ?>
		<div class="main_buttons" id="lcb_main_area">                	
	  	<div class="callnow_area on one-third lcb_call_area" id="&quot;lcb_call_area&quot;">
	          <a href="tel: +6281219252587">
	      		<div class="callnow_bottom">
	      			<span class="b_callnow">
	                      <i class="fa fa-mobile" aria-hidden="true"></i>                            CALL                        </span>
	      		</div>
	          </a>
	  	</div>

	    	
	  	<div class="schedule_area on one-third lcb_home_area" id="&quot;lcb_home_area&quot;">
	          <a href="https://podomoroparkbandung.id/">
	      		<div class="schedule_bottom">
	      			<span class="b_schedule">
	                      <i class="fa fa-home" aria-hidden="true"></i>                            HOME                        </span>
	      		</div>
	          </a>
	  	</div>

	    	
	  	<div class="map_area on one-third lcb_whatsapp_area" id="&quot;lcb_whatsapp_area&quot;">
	          <a href="https://api.whatsapp.com/send?phone=6281219252587">
	      		<div class="map_bottom">
	      			<span class="b_map">
	                      <i class="fa fa-whatsapp" aria-hidden="true"></i>                            WHATSAPP                        </span>
	      		</div>
	          </a>
	  	</div>

	   </div>
		<footer id="footer" class="dark">
			<div id="copyrights">
				<?php $this->load->view('footer') ?>
			</div>
		</footer>
	</div>
	<div id="gotoTop" class="icon-angle-up"></div>
	<?php $this->load->view('js') ?>
</body>
</html>