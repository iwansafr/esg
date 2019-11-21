<!DOCTYPE html>
<html lang="<?php echo @$site['lang'] ?>">
<head>
 <?php $this->load->view('meta')?>
</head>
<body>
  <header id="header">
    <div class="container">
      <?php $this->load->view('menu_top') ?>
    </div>
  </header>
  <?php 
  if($mod['content'] == 'home/index')
  {
    ?>
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
      <?php $this->load->view('content_hot') ?>
      
      <?php $this->load->view('content_top') ?>

      <?php $this->load->view('content') ?>
      
      <?php $this->load->view('content_banner') ?>
      
      <?php $this->load->view('content_bottom') ?>
      
      <?php $this->load->view('content_brand') ?>
      
      <?php $this->load->view('content_pricing') ?>
      
      <?php $this->load->view('content_question') ?>
      
      <?php $this->load->view('content_team') ?>
      
      <?php $this->load->view('content_gallery') ?>

      <?php $this->load->view('content_photo') ?>

      <?php $this->load->view('content_video') ?>
      
      <section id="contact">
        <?php $this->load->view('contact') ?>
      </section>
      
    </main>
    <?php 
  }else{
    $title = end($navigation['array']);
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="margin-top:100px;">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
              <?php 
              if(count($navigation['array'])>1)
              {
                $value = end($navigation['array']);
                $url = '/'.$value;
                echo '<li class="breadcrumb-item active" aria-current="page">'.$value.'</li>';
              }
              if(!empty($content['title']))
              {
                echo '<li class="breadcrumb-item active" aria-current="page">'.$content['title'].'</li>';
              }
              ?>
            </ol>
          </nav>
          <div class="col">
            <h5>
              <?php 
              if(!empty($navigation['array'][1]))
              {
                $type = $navigation['array'][0];
                echo $type.' of ';
                $slug  = str_replace('.html','', $navigation['array'][1]);
                $title = str_replace('-', ' ', $slug);
                $link  = '';
                switch ($type) {
                  case 'category':
                    $link = content_cat_link($slug);
                    break;
                  case 'tag':
                    $link = content_tag_link($slug);
                    break;
                  default:
                    $link = '';
                    break;
                }
                echo '<a href="'.$link.'"><span class="badge badge-secondary">'.$title.'</span></a>';
                echo ' ';   
              }
              ?>
            </h5>
          </div>
          <hr>
          <?php
          $this->load->view($mod['content']);
          ?>
        </div>
      </div>
    </div>
    <main id="main">
      <section id="contact">
        <?php $this->load->view('contact') ?>
      </section>
    </main>
    <?php
  }
  ?>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong><?php echo @$site['title'] ?></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
            Designed by <a href="<?php echo @$site['link'] ?>"><?php echo @$site['title'] ?></a>
          </div>
        </div>
        <div class="col-lg-6">
          <?php $this->load->view('menu_bottom') ?>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
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
  <?php $this->load->view('script') ?>

</body>
</html>
