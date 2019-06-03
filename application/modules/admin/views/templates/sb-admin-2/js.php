<?php $admin_template = base_url('templates/'.$this->esg->get_esg('templates')['admin_template']); ?>
<script src="<?php echo $admin_template;?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $admin_template;?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo $admin_template;?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo $admin_template;?>/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url('templates/AdminLTE'); ?>/assets/bootstrap/js/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url('templates/AdminLTE'); ?>/assets/dist/js/script.js"></script>
<script src="<?php echo base_url('templates/AdminLTE'); ?>/assets/summernote/summernote.js"></script>
<script src="<?php echo base_url('templates/AdminLTE'); ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url('templates/AdminLTE'); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('templates/AdminLTE'); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$('.select2').select2();
	$(document).ready(function(){
		$('.esg_data_table').DataTable();
	})
</script>
<?php 
$this->esg->extra_js();
$this->esg->script();