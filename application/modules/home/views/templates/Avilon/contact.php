<div class="container">
  <div class="row wow fadeInUp">
    <div class="col-lg-4 col-md-4">
      <?php 
      if(!empty($meta['contact']))
      {
        $contact = $meta['contact'];
        ?>
        <div class="contact-about">
          <h3><?php echo $contact['name'] ?></h3>
          <p><?php echo $contact['description'] ?></p>
          <div class="social-links">
            <?php
            foreach ($contact as $key => $value) 
            {
              if(isLink($value))
              {
                echo '<a href="'.$value.'" class="'.$key.'"><i class="fa fa-'.$key.'"></i></a>';
              }
            }
            ?>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="col-lg-3 col-md-4">
      <div class="info">
        <div>
          <i class="ion-ios-location-outline"></i>
          <p><?php echo @$contact['address'] ?></p>
        </div>

        <div>
          <i class="ion-ios-email-outline"></i>
          <p><?php echo @$contact['email'] ?></p>
        </div>

        <div>
          <i class="ion-ios-telephone-outline"></i>
          <p><?php echo @$contact['phone'] ?></p>
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