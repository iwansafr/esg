<a href="<?php echo base_url('admin/invoice') ?>" class="btn btn-default btn-sm pull-right"><i class="fa fa-list"></i></a>
<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('edit');
$this->zea->setTable('invoice');
$this->zea->search();

$id = @intval($_GET['id']);
$this->zea->setHeading('Invoice');
if(!empty($id))
{
	$this->zea->setId($id);
}

if(!empty($id))
{
	$this->zea->addInput('code','text');
	$this->zea->setLabel('code','invoice code');
	$this->zea->setAttribute('code','readonly');
}
$this->zea->addInput('receiver','text');
$this->zea->addInput('payment_method','dropdown');
$this->zea->setOptions('payment_method',['1'=>'Cash','2'=>'Transfer Bank']);
$this->zea->setLabel('payment_method','Payment Methode');

$this->zea->addInput('notes','textarea');
$this->zea->addInput('items','textarea');
$this->zea->setAttribute('items','placeholder="item 1 = 1000, item 2 = 2000"');

$this->zea->addInput('ppn','dropdown');
$this->zea->setOptions('ppn',[1=>'With PPN',0=>'Without PPN']);
$this->zea->setLabel('ppn','PPN');

$this->zea->addInput('status','dropdown');
$this->zea->setOptions('status',['Unpaid','Paid']);
$this->zea->setLabel('status','Payment Status');

if(!empty($this->input->get('custom_date')))
{
	$this->zea->addInput('created','text');
	$this->zea->setType('created','datetime-local');
}

$this->zea->setFormName('invoice_form');
$this->zea->form();
