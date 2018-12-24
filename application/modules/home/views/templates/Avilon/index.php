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
    </section>
    <section id="gallery">
      <?php $this->load->view('content_gallery') ?>
    </section>
    <section id="contact">
      <?php $this->load->view('contact') ?>
    </section>

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
