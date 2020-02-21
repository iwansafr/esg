<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($data['month_venue_total'])){
	?>
	<span class="badge">Pendapatan Bulan ini Rp,- <?php echo number_format($data['month_venue_total'],2,',','.');?></span>
	<?php
}
$this->zea->init('roll');
$this->zea->setTable('invoice');
$this->zea->search();

$this->zea->setField(array('receiver','code','notes'));
$this->zea->setHeading('<a href="'.base_url('admin/invoice/edit').'" class="btn btn-default btn-sm pull-left"><i class="fa fa-plus"></i></a>');
$this->zea->setNumbering();
$this->zea->addInput('id','plaintext');
$this->zea->addInput('items','plaintext');
$this->zea->addInput('receiver','plaintext');
$this->zea->addInput('code','plaintext');
$this->zea->addInput('created','link');
$this->zea->setLink('created','invoice/detail','id');
$this->zea->setPlaintext('created','<i class="fa fa-eye"></i> Display');
$this->zea->setLabel('created','detail');
$this->zea->setAttribute('created','target="_blank"');

$this->zea->setEdit(TRUE);
$this->zea->setEditLink(base_url('admin/invoice/edit?id='),'id');
$this->zea->setDelete(TRUE);
$this->zea->setFormName('invoice_list');
$this->zea->form();
