<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($data['status'])
{
	msg('data successfull restored to '.$data['data']['table_title'], 'success');
}else{
	msg('data failed restored to '.$data['data']['table_title'], 'danger');
}

?>
<a href="<?php echo base_url('admin/trash') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> back</a>