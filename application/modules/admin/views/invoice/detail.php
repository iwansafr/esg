<?php defined('BASEPATH') OR exit('No direct script access allowed');
$site = $this->esg->get_esg('site')['site'];
$logo = $this->esg->get_esg('site')['logo'];
$contact = $this->esg->get_config('contact');
?>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo @$site['title'] ?> - Invoice #<?php echo @$data['code']; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo image_module('config/site', @$site['image']); ?>">
	<link href="<?php echo base_url('templates/AdminLTE/assets/dist/css/modules/config/') ?>all.min.css" rel="stylesheet">
	<link href="<?php echo base_url('templates/AdminLTE/assets/dist/css/modules/config/') ?>invoice.css" rel="stylesheet">
	<link href="<?php echo base_url('templates/AdminLTE/assets/font-awesome/css/') ?>font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid invoice-container">
			<div class="row invoice-header">
				<div class="invoice-col">
					<p><img src="<?php echo image_module('config/logo', $logo['image']) ?>" class="img-responsive" title="<?php echo @$site['title'] ?>" height="100"></p>
					<h3>Invoice #<?php echo @$data['code']; ?></h3>
				</div>
				<?php
				$style = ($data['status'] == 1) ? 'color : green;' : 'color: red';
				$color = ($data['status'] == 1) ? 'green' : 'red';
				$img   = ($data['status'] == 1) ? 'paid.png' : 'unpaid.png';
				?>
				<div class="invoice-col " style="margin-top: 2%; padding-left: 140px;">
					<img src="<?php echo base_url('images/'.$img) ?>" class="img-responsive" style="margin-lef: 100px;transform :rotate(30deg); height: 50px; height: 60px; width: 230px;">
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="invoice-col right">
					<strong>Pay To</strong>
					<address class="small-text">
						<?php echo $contact['name'] ?><br>
						Adress : <br>
						<?php echo $contact['address'] ?><br>
						Telp : <?php echo $contact['phone'].' / '.$contact['wa'] ?>
					</address>
				</div>
				<div class="invoice-col">
					<strong>Invoiced To</strong>
					<address class="small-text">
						<?php echo $data['receiver'] ?>
					</address>
				</div>
			</div>
			<div class="row">
				<div class="invoice-col right">
					<strong>Payment Method</strong><br>
					<span class="small-text">
						<?php echo (empty($data['payment_method'])) ? 'CASH' : 'TRANSFER BANK'; ?>
					</span>
				</div>
				<div class="invoice-col">
					<strong>Invoice Date</strong><br>
					<span class="small-text">
						<?php echo $data['created'] ?><br><br>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="invoice-col right">
					<strong>Bank Detail</strong><br>
					<?php foreach ($bank as $key => $value): ?>
						<span class="small-text">
							Bank 		: <?php echo $value['bank_name'] ?> <br>
							No Rek 	: <?php echo $value['bank_number'] ?> <br>
							A/N 		: <?php echo $value['person_name'] ?> <br>
						</span>
					<?php endforeach ?>
					<br><br>
				</div>
			</div>
			<br>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Notes</strong></h3>
			</div>
			<div class="panel-body">
				<?php echo $data['notes'] ?>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Invoice Items</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<td><strong>Description</strong></td>
								<td width="25%" class=""><strong>Amount</strong></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$items = $data['items'];
							$items = explode(',',$items);
							$each_item = array();
							$sub_total = 0;
							foreach ($items as $key => $value)
							{
								$value = explode('=', $value);
								if(count($value)>1)
								{
									$each_item[$value[0]] = (int) $value[1];
								}
							}
							foreach ($each_item as $key => $value)
							{
								?>
								<tr>
									<td>
										<?php echo $key ?>
									</td>
									<td class="">
										<?php echo 'Rp. '.number_format($value, 2, ',', '.'); ?>
									</td>
								</tr>
								<?php
								$sub_total += $value;
							}
							if(!empty($data['ppn']))
							{
								$ppn = ($sub_total*10)/100;
								$total = $sub_total+$ppn;
							}else{
								$total = $sub_total;
							}
							?>

							<tr>
								<td class="total-row text-right"><strong>Sub Total</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($sub_total, 2, ',', '.'); ?></td>
							</tr>
							<?php
							if(!empty($ppn))
							{
								?>
								<tr>
									<td class="total-row text-right"><strong>10.00% PPN</strong></td>
									<td class="total-row "><?php echo 'Rp. '.number_format($ppn, 2, ',', '.'); ?></td>
								</tr>
								<?php
							}?>
							<tr>
								<td class="total-row text-right"><strong>Credit</strong></td>
								<td class="total-row ">Rp. 0,00 </td>
							</tr>
							<tr>
								<td class="total-row text-right"><strong>Total</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<p>* Indicates a taxed item.</p>
		<div class="transactions-container small-text">
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<tr>
							<td class=""><strong>Transaction Date</strong></td>
							<td class=""><strong>Gateway</strong></td>
							<td class=""><strong>Transaction ID</strong></td>
							<td class=""><strong>Amount</strong></td>
						</tr>
					</thead>
					<tbody>
														<tr>
								<td class=""><?php echo $data['created'] ?></td>
								<td class=""><?php echo $data['payment_method'];?></td>
								<td class="">
									-
									<?php 
									// echo ($data['payment_method'] == 'cash') ? 'CASH' : 'BCA'; 
									?>
									<?php 
									// echo substr(time(), 0,4).'-'.substr(time(), 5,8) 
									?>
								</td>
								<td class=""><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
													<tr>
							<td class="text-right" colspan="3"><strong>Balance</strong></td>
							<td class="">Rp. 0,00 </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="pull-right btn-group btn-group-sm hidden-print">
			<a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
			<!-- <a href="dl.php?type=i&amp;id=871068" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
		</div>
	</div>
	<!-- <p class=" hidden-print"><a href="clientarea.php">« Back to Client Area</a></p> -->
</body>
</html>
