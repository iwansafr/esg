<?php
if(!empty(@$_GET['keyword']))
{
  echo '<p class="badge">Search Result for : '.@$_GET['keyword'].'</p>';
}
if(!empty($content['data']))
{
  if(!empty(@$tpl) && file_exists(APPPATH.'/modules/home/views/templates/'.@$templates['public_template'].'/'.@$tpl.'.php'))
  {
    $data = $this->esg->get_esg();
    $data['home'][$tpl]                = $content['data'];
    $data['home'][$tpl][0]['category'] = $content['taxonomy'];
    
    $this->load->view('templates/'.$templates['public_template'].'/'.$tpl, $data);
  }else{
    ?>
    <ul class="list-unstyled">
      <?php 
      $data = $content['data'];
      foreach ($data as $key => $value) 
      {
        $link = content_link($value['slug']);
        $css = ($key%2 == 0) ? 'my-4' : '';
        ?>
        <li class="media <?php echo $css ?>">
          <?php 
          if(!empty($value['image']) || !empty($value['image_link']))
          {
            ?>
            <a href="<?php echo $link; ?>"><img class="thumb mr-3" src="<?php echo image_module('content', $value);?>" alt="<?php echo $value['title'] ?>" width="200"></a>
            <?php
          }
          ?>
          <div class="media-body">
            <a href="<?php echo $link; ?>"><h5 class="mt-0 mb-1"><?php echo $value['title'] ?></h5></a>
            <?php echo $value['intro'] ?>
            <div class="row">
              <div class="col">
                <p class="pull-right">
                  <i class="fa fa-calendar"></i>
                  <span class="font-italic" style="font-family: 'Crete Round', serif;font-size: 14px;">created : <?php echo content_date($value['created']); ?></span>
                </p>
              </div>
            </div>
          </div>
        </li>
        <?php
      }
      ?>
    </ul>
  <?php
  }
  if(!empty($content['pagination']))
  {
    echo $content['pagination'];
  }
}