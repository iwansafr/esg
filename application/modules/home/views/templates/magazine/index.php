<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<?php $this->load->view('meta') ?>
	</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		<div id="top-bar">
			<div class="container clearfix">
				<div class="col_half nobottommargin">
					<?php $this->load->view('menu_top') ?>		
				</div>
				<div class="col_half fright col_last nobottommargin">
					<?php $this->load->view('social_media') ?>
				</div>
			</div>
		</div>
		<header id="header" class="sticky-style-2">
			<div class="container clearfix">
				<div id="logo">
					<?php $this->load->view('logo') ?>
				</div>
				<div class="top-advert">
					<img src="<?php echo $link_template;?>/images/magazine/ad.jpg" alt="Ad">
				</div>
			</div>
			<div id="header-wrap">
				<nav id="primary-menu" class="style-2">
					<?php $this->load->view('menu_main') ?>
				</nav>
			</div>
		</header>
		<section id="content">
			<div class="content-wrap">
				<div class="section header-stick bottommargin-lg clearfix" style="padding: 20px 0;">
					<div>
						<?php $this->load->view('content_news') ?>
					</div>
				</div>
				<div class="container clearfix">
					<div class="row">
						<div class="col-md-8 bottommargin">
							<div class="col_full bottommargin-lg">
								<?php $this->load->view('content_slider') ?>
							</div>
							<div class="clear"></div>
							<div class="col_full bottommargin-lg clearfix">
								<?php $this->load->view('content_block_1') ?>
							</div>

							<div class="bottommargin-lg">
								<?php $this->load->view('content_banner') ?>
							</div>

							<div class="col_full bottommargin-lg clearfix">

								<div class="fancy-title title-border">
									<h3>Entertainment</h3>
								</div>

								<div class="ipost clearfix bottommargin-sm">
									<div class="col_half nobottommargin">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/8.jpg" alt="Image"></a>
										</div>
									</div>
									<div class="col_half nobottommargin col_last">
										<div class="entry-title">
											<h3><a href="blog-single.html">Beyonce Dropped A '50 Shades Of Grey', Teaser On Instagram Last Night</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 7th Jun 2014</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 23</a></li>
											<li><a href="#"><i class="icon-camera-retro"></i></a></li>
										</ul>
										<div class="entry-content">
											<p>Neque nesciunt molestias soluta esse debitis. Magni impedit quae consectetur consequuntur adipisci veritatis modi a, officia cum. Eaque iusto quod assumenda beatae, nesciunt aliquid. Vel, eos eligendi?</p>
										</div>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col_half nobottommargin">

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="<?php echo $link_template;?>/images/magazine/small/5.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">A Baseball Team Blew Up A Bunch Of Justin Bieber And Miley Cyrus Merch</a></h4>
											</div>
											<ul class="entry-meta">
												<li><i class="icon-calendar3"></i> 5th Nov 2014</li>
												<li><a href="#"><i class="icon-comments"></i> 3</a></li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="<?php echo $link_template;?>/images/magazine/small/6.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Want To Know The New 'Star Wars' Plot? Then This Is The Post For You</a></h4>
											</div>
											<ul class="entry-meta">
												<li><i class="icon-calendar3"></i> 29th Jul 2014</li>
												<li><a href="#"><i class="icon-comments"></i> 22</a></li>
											</ul>
										</div>
									</div>

								</div>

								<div class="col_half nobottommargin col_last">

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="<?php echo $link_template;?>/images/magazine/small/7.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Actress Skye McCole Bartusiak From 'The Patriot' Found Dead At 21</a></h4>
											</div>
											<ul class="entry-meta">
												<li><i class="icon-calendar3"></i> 12th Oct 2014</li>
												<li><a href="#"><i class="icon-comments"></i> 47</a></li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-image">
											<a href="#"><img src="<?php echo $link_template;?>/images/magazine/small/9.jpg" alt=""></a>
										</div>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Internet Slang Has Been Proof Of Satanic Worship All Along???LOL!</a></h4>
											</div>
											<ul class="entry-meta">
												<li><i class="icon-calendar3"></i> 25th Mar 2014</li>
												<li><a href="#"><i class="icon-comments"></i> 56</a></li>
											</ul>
										</div>
									</div>

								</div>

							</div>

							<div class="fancy-title title-border">
								<h3>News in Pictures</h3>
							</div>

							<div class="col_full masonry-thumbs col-6 bottommargin-lg clearfix" data-big="5" data-lightbox="gallery">
								<a href="images/magazine/1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/1.jpg" alt="Gallery Thumb 1"></a>
								<a href="images/magazine/2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/2.jpg" alt="Gallery Thumb 2"></a>
								<a href="images/magazine/3.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/3.jpg" alt="Gallery Thumb 3"></a>
								<a href="images/magazine/4.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/4.jpg" alt="Gallery Thumb 4"></a>
								<a href="images/magazine/5.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/5.jpg" alt="Gallery Thumb 5"></a>
								<a href="images/magazine/6.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/6.jpg" alt="Gallery Thumb 6"></a>
								<a href="images/magazine/7.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/7.jpg" alt="Gallery Thumb 7"></a>
								<a href="images/magazine/8.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/8.jpg" alt="Gallery Thumb 8"></a>
								<a href="images/magazine/9.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/9.jpg" alt="Gallery Thumb 9"></a>
								<a href="images/magazine/10.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/10.jpg" alt="Gallery Thumb 10"></a>
								<a href="images/magazine/11.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/11.jpg" alt="Gallery Thumb 11"></a>
								<a href="images/magazine/12.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/12.jpg" alt="Gallery Thumb 12"></a>
								<a href="images/magazine/13.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/13.jpg" alt="Gallery Thumb 13"></a>
								<a href="images/magazine/14.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/14.jpg" alt="Gallery Thumb 14"></a>
								<a href="images/magazine/15.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/15.jpg" alt="Gallery Thumb 15"></a>
							</div>

							<div class="col_full nobottommargin clearfix">

								<div class="fancy-title title-border">
									<h3>Other News</h3>
								</div>

								<div class="col_one_third">
									<div class="ipost clearfix">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/11.jpg" alt="Image"></a>
										</div>
										<div class="entry-title">
											<h3><a href="blog-single.html">Yum, McDonald's apologize as new China food scandal brews</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 9th Sep 2014</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 23</a></li>
										</ul>
										<div class="entry-content">
											<p>Neque nesciunt molestias soluta esse debitis. Magni impedit quae consectetur consequuntur.</p>
										</div>
									</div>
								</div>

								<div class="col_one_third">
									<div class="ipost clearfix">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/16.jpg" alt="Image"></a>
										</div>
										<div class="entry-title">
											<h3><a href="blog-single.html">Halliburton gets boost from rebound in North America drilling</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 23rd Aug 2014</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 33</a></li>
										</ul>
										<div class="entry-content">
											<p>Eaque iusto quod assumenda beatae, nesciunt aliquid. Vel, eos eligendi?</p>
										</div>
									</div>
								</div>

								<div class="col_one_third col_last">
									<div class="ipost clearfix">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/13.jpg" alt="Image"></a>
										</div>
										<div class="entry-title">
											<h3><a href="blog-single.html">China sends spy ship off Hawaii during U.S.-led drills brews</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 11th Feb 2014</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
										</ul>
										<div class="entry-content">
											<p>Magni impedit quae consectetur consequuntur adipisci veritatis modi a, officia cum.</p>
										</div>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col_one_third nobottommargin">
									<div class="ipost clearfix">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/10.jpg" alt="Image"></a>
										</div>
										<div class="entry-title">
											<h3><a href="blog-single.html">Wobbly stocks underpin yen and Swiss franc; dollar subdued</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 17th Jan 2014</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 50</a></li>
										</ul>
										<div class="entry-content">
											<p>Neque nesciunt molestias soluta esse debitis. Magni impedit quae consectetur consequuntur.</p>
										</div>
									</div>
								</div>

								<div class="col_one_third nobottommargin">
									<div class="ipost clearfix">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/15.jpg" alt="Image"></a>
										</div>
										<div class="entry-title">
											<h3><a href="blog-single.html">BlackBerry names ex-Sybase executive as chief operating officer</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 20th Nov 2014</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
										</ul>
										<div class="entry-content">
											<p>Eaque iusto quod assumenda beatae, nesciunt aliquid. Vel, eos eligendi?</p>
										</div>
									</div>
								</div>

								<div class="col_one_third nobottommargin col_last">
									<div class="ipost clearfix">
										<div class="entry-image">
											<a href="#"><img class="image_fade" src="<?php echo $link_template;?>/images/magazine/thumb/6.jpg" alt="Image"></a>
										</div>
										<div class="entry-title">
											<h3><a href="blog-single.html">Georgian prime minister fires seven ministers in first reshuffle</a></h3>
										</div>
										<ul class="entry-meta clearfix">
											<li><i class="icon-calendar3"></i> 10th Dec 2013</li>
											<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
										</ul>
										<div class="entry-content">
											<p>Magni impedit quae consectetur consequuntur adipisci veritatis modi a, officia cum.</p>
										</div>
									</div>
								</div>

							</div>

						</div>

						<div class="col-md-4">

							<div class="line hidden-lg hidden-md"></div>

							<div class="sidebar-widgets-wrap clearfix">

								<div class="widget clearfix">
									<div class="col_one_third nobottommargin">
										<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<small style="display: block; margin-top: 3px;"><strong><div class="counter counter-inherit"><span data-from="1000" data-to="58742" data-refresh-interval="100" data-speed="3000" data-comma="true"></span></div></strong>Likes</small>
									</div>

									<div class="col_one_third nobottommargin">
										<a href="#" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
											<i class="icon-twitter"></i>
											<i class="icon-twitter"></i>
										</a>
										<small style="display: block; margin-top: 3px;"><strong><div class="counter counter-inherit"><span data-from="500" data-to="9654" data-refresh-interval="50" data-speed="2500" data-comma="true"></span></div></strong>Followers</small>
									</div>

									<div class="col_one_third nobottommargin col_last">
										<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
											<i class="icon-rss"></i>
											<i class="icon-rss"></i>
										</a>
										<small style="display: block; margin-top: 3px;"><strong><div class="counter counter-inherit"><span data-from="200" data-to="15475" data-refresh-interval="150" data-speed="3500" data-comma="true"></span></div></strong>Readers</small>
									</div>
								</div>

								<div class="widget clearfix">
									<img class="aligncenter" src="<?php echo $link_template;?>/images/magazine/ad.png" alt="">
								</div>

								<div class="widget widget_links clearfix">

									<h4>Categories</h4>
									<div class="col_half nobottommargin">
										<ul>
											<li><a href="#">World</a></li>
											<li><a href="#">Technology</a></li>
											<li><a href="#">Entertainment</a></li>
											<li><a href="#">Sports</a></li>
											<li><a href="#">Media</a></li>
											<li><a href="#">Politics</a></li>
											<li><a href="#">Business</a></li>
										</ul>
									</div>
									<div class="col_half nobottommargin col_last">
										<ul>
											<li><a href="#">Lifestyle</a></li>
											<li><a href="#">Travel</a></li>
											<li><a href="#">Cricket</a></li>
											<li><a href="#">Football</a></li>
											<li><a href="#">Education</a></li>
											<li><a href="#">Photography</a></li>
											<li><a href="#">Nature</a></li>
										</ul>
									</div>

								</div>

								<div class="widget clearfix">

									<h4>Twitter Feed Scroller</h4>
									<div class="fslider customjs testimonial twitter-scroll twitter-feed" data-username="envato" data-count="2" data-animation="slide" data-arrows="false">
										<i class="i-plain color icon-twitter nobottommargin" style="margin-right: 15px;"></i>
										<div class="flexslider" style="width: auto;">
											<div class="slider-wrap">
												<div class="slide"></div>
											</div>
										</div>
									</div>

								</div>

								<div class="widget clearfix">

									<h4>Flickr Photostream</h4>
									<!-- <div id="flickr-widget" class="flickr-feed masonry-thumbs col-5" data-id="613394@N22" data-count="15" data-type="group" data-lightbox="gallery"></div> -->

								</div>

								<div class="widget clearfix">

									<div class="tabs nobottommargin clearfix" id="sidebar-tabs">

										<ul class="tab-nav clearfix">
											<li><a href="#tabs-1">Popular</a></li>
											<li><a href="#tabs-2">Recent</a></li>
											<li><a href="#tabs-3"><i class="icon-comments-alt norightmargin"></i></a></li>
										</ul>

										<div class="tab-container">

											<div class="tab-content clearfix" id="tabs-1">
												<div id="popular-post-list-sidebar">

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/magazine/small/3.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<div class="entry-title">
																<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
															</div>
															<ul class="entry-meta">
																<li><i class="icon-comments-alt"></i> 35 Comments</li>
															</ul>
														</div>
													</div>

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/magazine/small/2.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<div class="entry-title">
																<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
															</div>
															<ul class="entry-meta">
																<li><i class="icon-comments-alt"></i> 24 Comments</li>
															</ul>
														</div>
													</div>

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/magazine/small/1.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<div class="entry-title">
																<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
															</div>
															<ul class="entry-meta">
																<li><i class="icon-comments-alt"></i> 19 Comments</li>
															</ul>
														</div>
													</div>

												</div>
											</div>
											<div class="tab-content clearfix" id="tabs-2">
												<div id="recent-post-list-sidebar">

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/magazine/small/1.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<div class="entry-title">
																<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
															</div>
															<ul class="entry-meta">
																<li>10th July 2014</li>
															</ul>
														</div>
													</div>

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/magazine/small/2.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<div class="entry-title">
																<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
															</div>
															<ul class="entry-meta">
																<li>10th July 2014</li>
															</ul>
														</div>
													</div>

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/magazine/small/3.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<div class="entry-title">
																<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
															</div>
															<ul class="entry-meta">
																<li>10th July 2014</li>
															</ul>
														</div>
													</div>

												</div>
											</div>
											<div class="tab-content clearfix" id="tabs-3">
												<div id="recent-post-list-sidebar">

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/icons/avatar.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<strong>John Doe:</strong> Veritatis recusandae sunt repellat distinctio...
														</div>
													</div>

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/icons/avatar.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<strong>Mary Jane:</strong> Possimus libero, earum officia architecto maiores....
														</div>
													</div>

													<div class="spost clearfix">
														<div class="entry-image">
															<a href="#" class="nobg"><img class="img-circle" src="<?php echo $link_template;?>/images/icons/avatar.jpg" alt=""></a>
														</div>
														<div class="entry-c">
															<strong>Site Admin:</strong> Deleniti magni labore laboriosam odio...
														</div>
													</div>

												</div>
											</div>

										</div>

									</div>

								</div>

								<div class="widget clearfix">
									<!-- <iframe src="http://player.vimeo.com/video/100299651" width="500" height="264" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
								</div>

								<div class="widget clearfix">
									<img class="aligncenter" src="<?php echo $link_template;?>/images/magazine/ad.png" alt="">
								</div>

								<div class="widget clearfix">
									<!-- <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=350&amp;height=240&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:240px; max-width: 100% !important;" allowTransparency="true"></iframe> -->
								</div>

							</div>

						</div>

					</div>
				</div>
			</div>
		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_one_third">

							<div class="widget clearfix">

								<img src="<?php echo $link_template;?>/images/footer-widget-logo.png" alt="" class="footer-logo">

								<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

								<div style="background: url('<?php echo $link_template;?>images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>Headquarters:</strong><br>
										795 Folsom Ave, Suite 600<br>
										San Francisco, CA 94107<br>
									</address>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
									<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
								</div>

							</div>

						</div>

						<div class="col_one_third">

							<div class="widget widget_links clearfix">

								<h4>Blogroll</h4>

								<ul>
									<li><a href="http://codex.wordpress.org/">Documentation</a></li>
									<li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
									<li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
									<li><a href="http://wordpress.org/support/">Support Forums</a></li>
									<li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
									<li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
									<li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
								</ul>

							</div>

						</div>

						<div class="col_one_third col_last">

							<div class="widget clearfix">
								<h4>Flickr Photostream</h4>
								<div id="post-list-footer">
									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>

									<div class="spost clearfix">
										<div class="entry-c">
											<div class="entry-title">
												<h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
											</div>
											<ul class="entry-meta">
												<li>10th July 2014</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-md-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Total Downloads</h5>
								</div>

								<div class="col-md-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Clients</h5>
								</div>

							</div>

						</div>

						<div class="widget subscribe-widget clearfix">
							<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
								<div class="input-group divcenter">
									<span class="input-group-addon"><i class="icon-email2"></i></span>
									<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
								</div>
							</form>
						</div>

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-md-6 clearfix bottommargin-sm">
									<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
								</div>

							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<?php $this->load->view('js') ?>

</body>
</html>