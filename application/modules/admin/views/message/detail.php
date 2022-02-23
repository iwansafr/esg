<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('edit');
$form->setTable('message');
$form->setId($id);
$form->setHeading('Message');
$form->setEditStatus(FALSE);
$form->addInput('name','plaintext');
$form->addInput('email','plaintext');
$form->addInput('created','plaintext');
// $form->addInput('subject','plaintext');
// $form->addInput('message','plaintext');
$form->setSave(FALSE);
// $form->form();
$data = $form->getData();
?>
<div class="panel panel-default">
  <div class="panel-heading">Message</div>
  <div class="panel-body">
    <table class="table">
      <tr>
        <td>name :</td>
        <td><?php echo htmlentities($data['name']) ?></td>
      </tr>
      <tr>
        <td>email :</td>
        <td><?php echo $data['email'] ?></td>
      </tr>
      <tr>
        <td>subject :</td>
        <td><?php echo htmlentities($data['subject']) ?></td>
      </tr>
      <tr>
        <td>message :</td>
        <td><?php echo htmlentities($data['message']) ?></td>
      </tr>
    </table>
  </div>
</div>