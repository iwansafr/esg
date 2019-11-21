<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-md-3">
    <?php
    $this->load->view('cat_edit');
    if(!empty($get_id))
    {
      ?>
      <a href="<?php echo base_url('admin/menu/edit/?type=cat&type_id='.$get_id.'&t='.urlencode(encrypt(time()))) ?>"><button class="pull-right btn btn-default"><span><i class="fa fa-plus-circle"></i></span> add to menu</button></a>
      <?php
    }
    $this->zea->form();
    ?>
  </div>
  <div class="col-md-9">
    <?php
    $this->load->view('cat_list');
    ?>
  </div>
</div>