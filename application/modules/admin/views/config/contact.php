<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<a href="<?php echo base_url('admin/bank_account') ?>" class="btn btn-success">Bank Account</a>
<?php
// $form = new zea();
$this->zea->init('param');
$this->zea->setTable('config');
$this->zea->setHeading('Contact');
$this->zea->setParamName('contact');
$this->zea->addInput('name', 'text');
$this->zea->addInput('description', 'textarea');
$this->zea->addInput('address', 'textarea');
$this->zea->addInput('phone', 'text');
$this->zea->addInput('wa', 'text');
$this->zea->setType('wa','number');
$this->zea->setAttribute('wa', array('placeholder'=>'start with country number without +'));
$this->zea->addInput('email', 'text');
$this->zea->setType('email','email');
$this->zea->addInput('google', 'text');
$this->zea->setAttribute('google', array('placeholder'=>'insert your google plus link'));
$this->zea->setLabel('google', 'Google Plus');
$this->zea->addInput('facebook', 'text');
$this->zea->setAttribute('facebook', array('placeholder'=>'insert your facebook link'));
$this->zea->addInput('twitter', 'text');
$this->zea->setAttribute('twitter', array('placeholder'=>'insert your twitter link'));
$this->zea->addInput('instagram', 'text');
$this->zea->setAttribute('instagram', array('placeholder'=>'insert your instagram link'));
$this->zea->addInput('linkedin', 'text');
$this->zea->setAttribute('linkedin', array('placeholder'=>'insert your linkedin link'));
$this->zea->addInput('wordpress', 'text');
$this->zea->setAttribute('wordpress', array('placeholder'=>'insert your wordpress link'));
$this->zea->addInput('yahoo', 'text');
$this->zea->setAttribute('yahoo', array('placeholder'=>'insert your yahoo link'));
$this->zea->addInput('youtube', 'text');
$this->zea->setAttribute('youtube', array('placeholder'=>'insert your youtube link'));
$this->zea->setFormName('contact');
$this->zea->form();