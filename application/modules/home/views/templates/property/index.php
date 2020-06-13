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
		<style type="text/css">
			body .main_buttons{
				background: #1abc9c;
	    	color: #ffffff;
			}
			@media(min-width: 790px){
				#lcb_main_area{
					display: none;
				}
			}
			@media(max-width: 790px){
				.main_buttons{
					z-index: 99999;
			    display: block;
			    position: fixed;
			    left: 0;
			    bottom: 0;
			    width: 100%;
			    height: 104px;
			    box-shadow: inset 0px 4px 14px -7px #404040;
			    text-align: center;
			    display: table;
				}
				.main_buttons .one-third {
				    width: 32%;
				}
				.main_buttons .on {
				    padding: 18px 0;
				    display: table-cell;
				}
				.main_buttons .on a {
				    color: #ffffff;
				}
				.main_buttons .on a {
				    font-size: 16px;
				    text-decoration: none;
				}
				.main_buttons .on i {
				    font-size: 32px;
				    display: block;
				    margin-bottom: 4px;
				}
			}
		</style>
		<?php if (!empty($meta['contact'])): ?>
			<div class="main_buttons" id="lcb_main_area">                	
		  	<div class="callnow_area on one-third lcb_call_area" id="&quot;lcb_call_area&quot;">
	        <a href="tel: <?php echo $meta['contact']['phone'] ?>">
	    		<div class="callnow_bottom">
	    			<span class="b_callnow">
	          	<i class="icon-phone" aria-hidden="true"></i>
	            CALL                        
	          </span>
	    		</div>
	        </a>
		  	</div>
		  	<div class="schedule_area on one-third lcb_home_area" id="&quot;lcb_home_area&quot;">
	        <a href="<?php echo base_url() ?>">
	    		<div class="schedule_bottom">
	    			<span class="b_schedule">
	            <i class="fa fa-home" aria-hidden="true"></i>
	            HOME
	          </span>
	    		</div>
	        </a>
		  	</div>
		  	<div class="map_area on one-third lcb_whatsapp_area" id="&quot;lcb_whatsapp_area&quot;">
	        <a href="https://api.whatsapp.com/send?phone=<?php echo $meta['contact']['wa']?>">
	    		<div class="map_bottom">
	    			<span class="b_map">
	            <i class="fa fa-whatsapp" aria-hidden="true"></i>
	            WHATSAPP
	          </span>
	    		</div>
	        </a>
		  	</div>

		  </div>
		<?php endif ?>
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