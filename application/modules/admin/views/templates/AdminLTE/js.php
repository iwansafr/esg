<?php $admin_template = base_url('templates/'.$this->esg->get_esg('templates')['admin_template']); ?>
<!-- jQuery 3 -->
<script src="<?php echo $admin_template ; ?>/assets/jquery/jquery.min.js"></script>
<script src="<?php echo $admin_template ; ?>/assets/jquery/jquery.doubleScroll.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $admin_template; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $admin_template; ?>/assets/bootstrap/js/bootstrap-tagsinput.js"></script>
<!-- FastClick -->
<script src="<?php echo $admin_template; ?>/assets/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $admin_template; ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo $admin_template; ?>/assets/dist/js/demo.js"></script> -->
<script src="<?php echo $admin_template; ?>/assets/dist/js/script.js"></script>
<script src="<?php echo $admin_template; ?>/assets/summernote/summernote.js"></script>
<script src="<?php echo $admin_template; ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo $admin_template; ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $admin_template; ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $admin_template; ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
	$('.select2').select2();
	$(document).ready(function(){
		$('.esg_data_table').DataTable();
	})
	$('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
</script>
<?php 
$this->esg->extra_js();
$this->esg->script();