<!DOCTYPE html>
<html lang="en">
<head>
 <?php $this->load->view('meta') ?>
</head>
<body>
  <header id="header">
    <div class="container">
      <?php $this->load->view('menu_top') ?>
    </div>
  </header>
  <section id="intro">
    <div class="intro-text">
      <?php
      $this->load->view('header');
      ?>
    </div>
    <div class="product-screens">
      <?php
      $this->load->view("content_thumbnail");
      ?>
    </div>
  </section>
  <main id="main">
    <section id="about" class="section-bg">
      <?php $this->load->view('content_hot') ?>
    </section>
    <section id="features">
      <?php $this->load->view('content_top') ?>
    </section>
    <section id="advanced-features">
      <?php $this->load->view('content') ?>
    </section>
    <section id="call-to-action">
      <?php $this->load->view('content_banner') ?>
    </section>
    <section id="more-features" class="section-bg">
      <?php $this->load->view('content_bottom') ?>
    </section>
    <section id="clients">
      <?php $this->load->view('content_brand') ?>
    </section>
    <section id="pricing" class="section-bg">
      <?php $this->load->view('content_pricing') ?>
    </section>
    <section id="faq">
      <?php $this->load->view('content_question') ?>
    </section>
    <section id="team" class="section-bg">
      <?php $this->load->view('content_team') ?>
    </section><!-- #team -->

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Gallery</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-1.jpg" class="gallery-popup">
                <img src="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-1.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-2.jpg" class="gallery-popup">
                <img src="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-2.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-3.jpg" class="gallery-popup">
                <img src="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-3.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-4.jpg" class="gallery-popup">
                <img src="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-4.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-5.jpg" class="gallery-popup">
                <img src="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-5.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-6.jpg" class="gallery-popup">
                <img src="<?php echo base_url('templates').'/'.$templates['public_template'].'/';?>img/gallery/gallery-6.jpg" alt="">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #gallery -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>Avilon</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Avilon</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <?php 
  if(@$_SERVER['SERVER_NAME'] == 'localhost')
  {
    $link_template = base_url().'templates/'.$templates['public_template'];
  }else{
    $link_template = 'https://templates.esoftgreat.com/'.$templates['public_template'];
  }
  ?>
  <script src="<?php echo $link_template.'/';?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/easing/easing.min.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/wow/wow.min.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/superfish/superfish.min.js"></script>
  <script src="<?php echo $link_template.'/';?>lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo $link_template.'/';?>contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo $link_template.'/';?>js/main.js"></script>

</body>
</html>
