<!DOCTYPE html>
<html lang="<?php echo @$site['lang'] ?>">
<head>
	<?php $this->load->view('meta') ?>
</head>
<body>
	<header class="header_area">
		<div class="main_menu">
			<?php $this->load->view('menu_top') ?>
		</div>
	</header>
	<?php $this->load->view('content_top') ?>
	<?php $this->load->view('content') ?>
	<?php $this->load->view('content_oval') ?>
	<?php $this->load->view('content_tab') ?>
	<!--================End Recent Update Area =================-->


	<!--================ Start Gallery Area =================-->
	<section class="gallery_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2>Screens Gallery</h2>
						<h1>Screens Gallery</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="single-gallery">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/gallery_img1.png" alt="">
								<div class="content">
									<a class="pop-up-image" href="img/gallery_img1.png">
										<i class="lnr lnr-eye"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="single-gallery">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/gallery_img2.png" alt="">
								<div class="content">
									<a class="pop-up-image" href="img/gallery_img2.png">
										<i class="lnr lnr-eye"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="single-gallery">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/gallery_img3.png" alt="">
								<div class="content">
									<a class="pop-up-image" href="img/gallery_img3.png">
										<i class="lnr lnr-eye"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 hidden-md hidden-sm">
					<div class="single-gallery">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="img/gallery_img4.png" alt="">
						<div class="content">
							<a class="pop-up-image" href="img/gallery_img4.png">
								<i class="lnr lnr-eye"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Gallery Area =================-->


	<!--========== Start Testimonials Area ==================-->
	<section class="testimonials_area section_gap">
		<div class="container">
			<div class="testi_slider owl-carousel">
				<div class="testi_item">
					<img src="img/quote.png" alt="">
					<h4>Fanny Spencer</h4>
					<ul class="list">
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
					</ul>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>
							As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
							you travel
							across her face <br> and She is the host to your journey.
						</p>
					</div>
				</div>
				<div class="testi_item">
					<img src="img/quote.png" alt="">
					<h4>Fanny Spencer</h4>
					<ul class="list">
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
					</ul>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>
							As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
							you travel
							across her face <br> and She is the host to your journey.
						</p>
					</div>
				</div>
				<div class="testi_item">
					<img src="img/quote.png" alt="">
					<h4>Fanny Spencer</h4>
					<ul class="list">
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
						<li><a href="#"><i class="fa fa-star"></i></a></li>
					</ul>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>
							As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it,
							you travel
							across her face <br> and She is the host to your journey.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Testimonials Area ================-->


	<!--================ Start Pricing Plans Area ================-->
	<section class="pricing_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2>Pricing Plans</h2>
						<h1>Pricing Plans</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="pricing_item">
						<h3 class="p_title">Silver Package</h3>
						<h1 class="p_price">$69.00</h1>
						<div class="p_list">
							<ul>
								<li>Basic hair Cut</li>
								<li>Basic hair Cut</li>
								<li>Basic hair Cut</li>
							</ul>
						</div>
						<div class="p_btn">
							<a class="gradient_btn" href="#"><span>Order Now</span></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="pricing_item active">
						<h3 class="p_title">Golden Package</h3>
						<h1 class="p_price">$69.00</h1>
						<div class="p_list">
							<ul>
								<li>Basic hair Cut</li>
								<li>Basic hair Cut</li>
								<li>Basic hair Cut</li>
							</ul>
						</div>
						<div class="p_btn">
							<a class="gradient_btn" href="#"><span>Order Now</span></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 hidden-md">
					<div class="pricing_item">
						<h3 class="p_title">Platinum Package</h3>
						<h1 class="p_price">$69.00</h1>
						<div class="p_list">
							<ul>
								<li>Basic hair Cut</li>
								<li>Basic hair Cut</li>
								<li>Basic hair Cut</li>
							</ul>
						</div>
						<div class="p_btn">
							<a class="gradient_btn" href="#"><span>Order Now</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Pricing Plans Area ================-->


	<!--================ Start Frequently Asked Questions Area ================-->
	<section class="frequently_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2>Frequently Asked Questions</h2>
						<h1>Frequently Asked Questions</h1>
					</div>
				</div>
			</div>
			<div class="row frequent_inner">
				<div class="col-lg-5 col-md-5">
					<div class="frequent_item">
						<h3>We Believe that Interior beauty Lasts Long</h3>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
					</div>
				</div>
				<div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
					<div class="frequent_item">
						<h3>We Believe that Interior beauty Lasts Long</h3>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
					</div>
				</div>
				<div class="col-lg-5 col-md-5">
					<div class="frequent_item">
						<h3>We Believe that Interior beauty Lasts Long</h3>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
					</div>
				</div>
				<div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
					<div class="frequent_item">
						<h3>We Believe that Interior beauty Lasts Long</h3>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
					</div>
				</div>
				<div class="col-lg-5 col-md-5">
					<div class="frequent_item last-child">
						<h3>We Believe that Interior beauty Lasts Long</h3>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
					</div>
				</div>
				<div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
					<div class="frequent_item last-child">
						<h3>We Believe that Interior beauty Lasts Long</h3>
						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
							especially in the workplace. That’s why it’s crucial that as women.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Frequently Asked Questions Area ================-->

	<!--================ Start Blog Area ================-->
	<section class="blog_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main_title">
						<h2>Latest Blog Posts</h2>
						<h1>Latest Blog Posts</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="blog_items">
						<div class="blog_img_box">
							<img class="img-fluid" src="img/blog_img1.png" alt="">
						</div>
						<div class="blog_content">
							<a class="title" href="blog.html">Portable Fashion for women</a>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
							<div class="date">
								<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
								<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="blog_items">
						<div class="blog_img_box">
							<img class="img-fluid" src="img/blog_img2.png" alt="">
						</div>
						<div class="blog_content">
							<a class="title" href="blog.html">Portable Fashion for women</a>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
							<div class="date">
								<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
								<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 hidden-md">
					<div class="blog_items">
						<div class="blog_img_box">
							<img class="img-fluid" src="img/blog_img3.png" alt="">
						</div>
						<div class="blog_content">
							<a class="title" href="blog.html">Portable Fashion for women</a>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
							<div class="date">
								<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
								<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Blog Area ================-->

	<!--================ Start Newsletter Area ================-->
	<section class="newsletter_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="newsletter_inner">
						<h1>Subscribe Our Newsletter</h1>
						<p>We won’t send any kind of spam</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<aside class="newsletter_widget">
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
									 required="" type="email">
									<button class="btn primary_btn">Subscribe</button>
								</div>
							</form>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Newsletter Area ================-->

	<!--================Footer Area =================-->
	<footer class="footer_area section_gap_top">
		<div class="container">
			<div class="row footer_inner">
				<div class="col-lg-3 col-sm-6">
					<aside class="f_widget ab_widget">
						<div class="f_title">
							<h4>About Farfly</h4>
						</div>
						<ul>
							<li><a href="#"></a>For Business</a></li><a href="#">
								<li><a href="#"></a>Premium Plans
							</a></li>
							<li><a href="#"></a>Reviews</a></li>
							<li><a href="#"></a>How it Works</a></li>
							<li><a href="#"></a>Farfly Blog</a></li>
						</ul>
					</aside>
				</div>
				<div class="col-lg-3 col-sm-6">
					<aside class="f_widget ab_widget">
						<div class="f_title">
							<h4>Company</h4>
						</div>
						<ul>
							<li><a href="#"></a>Product Tour</a></li><a href="#">
								<li><a href="#"></a>Pricing
							</a></li>
							<li><a href="#"></a>Founding Members</a></li>
							<li><a href="#"></a>Case Studies</a></li>
							<li><a href="#"></a>Product Updates</a></li>
						</ul>
					</aside>
				</div>
				<div class="col-lg-3 col-sm-6">
					<aside class="f_widget ab_widget">
						<div class="f_title">
							<h4>Support</h4>
						</div>
						<ul>
							<li><a href="#"></a>Documentation</a></li><a href="#">
								<li><a href="#"></a>Data Securiry
							</a></li>
							<li><a href="#"></a>Site Performance</a></li>
							<li><a href="#"></a>Action Plan</a></li>
							<li><a href="#"></a>Resources</a></li>
						</ul>
					</aside>
				</div>
				<div class="col-lg-3 col-sm-6">
					<aside class="f_widget ab_widget">
						<div class="f_title">
							<h4>Legal</h4>
						</div>
						<ul>
							<li><a href="#"></a>Terms and conditions</a></li><a href="#">
								<li><a href="#"></a>Privacy Policy
							</a></li>
							<li><a href="#"></a>Cookie Information</a></li>
							<li><a href="#"></a>Opt - Out</a></li>
						</ul>
					</aside>
				</div>
			</div>
			<div class="row single-footer-widget">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="copy_right_text">
						<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="social_widget">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php $this->load->view('footer') ?>
</body>

</html>