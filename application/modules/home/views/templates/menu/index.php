<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('meta') ?>
</head>
<body>
  <div class="container">
    <?php $this->load->view('menu_top') ?>
    <?php 
    if($mod['content'] != 'home/index'){
    	$this->load->view($mod['content']);
    }
    ?>
  </div>

<?php $this->load->view('js') ?>
<?php $this->load->view('script') ?>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("mouseover", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

</body>
</html>
