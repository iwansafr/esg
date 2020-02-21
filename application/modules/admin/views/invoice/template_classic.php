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
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<style type="text/css">
		#invoice{
			padding: 30px;
		}
		.invoice {
			position: relative;
			background-color: #FFF;
			min-height: 680px;
			padding: 15px
		}
		.invoice header {
			padding: 10px 0;
			margin-bottom: 20px;
			border-bottom: 1px solid #3989c6
		}
		.invoice .company-details {
			text-align: right
		}
		.invoice .company-details .name {
			margin-top: 0;
			margin-bottom: 0
		}
		.invoice .contacts {
			margin-bottom: 20px
		}
		.invoice .invoice-to {
			text-align: left
		}
		.invoice .invoice-to .to {
			margin-top: 0;
			margin-bottom: 0
		}
		.invoice .invoice-details {
			text-align: right
		}
		.invoice .invoice-details .invoice-id {
			margin-top: 0;
			color: #3989c6
		}
		.invoice main {
			padding-bottom: 50px
		}
		.invoice main .thanks {
			margin-top: -100px;
			font-size: 2em;
			margin-bottom: 50px
		}
		.invoice main .notices {
			padding-left: 6px;
			border-left: 6px solid #3989c6
		}
		.invoice main .notices .notice {
			font-size: 1.2em
		}
		.invoice table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			margin-bottom: 20px
		}
		.invoice table td,.invoice table th {
			padding: 15px;
			background: #eee;
			border-bottom: 1px solid #fff
		}
		.invoice table th {
			white-space: nowrap;
			font-weight: 400;
			font-size: 16px
		}
		.invoice table td h3 {
			margin: 0;
			font-weight: 400;
			color: #3989c6;
			font-size: 1.2em
		}
		.invoice table .qty,.invoice table .total,.invoice table .unit {
			text-align: right;
			font-size: 1.2em
		}
		.invoice table .no {
			color: #fff;
			font-size: 1.6em;
			background: #3989c6
		}
		.invoice table .unit {
			background: #ddd
		}
		.invoice table .total {
			background: #3989c6;
			color: #fff
		}
		.invoice table tbody tr:last-child td {
			border: none
		}
		.invoice table tfoot td {
			background: 0 0;
			border-bottom: none;
			white-space: nowrap;
			text-align: right;
			padding: 10px 20px;
			font-size: 1.2em;
			border-top: 1px solid #aaa
		}
		.invoice table tfoot tr:first-child td {
			border-top: none
		}
		.invoice table tfoot tr:last-child td {
			color: #3989c6;
			font-size: 1.4em;
			border-top: 1px solid #3989c6
		}
		.invoice table tfoot tr td:first-child {
			border: none
		}
		.invoice footer {
			width: 100%;
			text-align: center;
			color: #777;
			border-top: 1px solid #aaa;
			padding: 8px 0
		}

		@media print {
			.invoice {
				font-size: 11px!important;
				overflow: hidden!important
			}

			.invoice footer {
				position: absolute;
				bottom: 10px;
				page-break-after: always
			}

			.invoice>div:last-child {
				page-break-before: always
			}
			.hidden-print {
 				display: none !important;
 			}
		}
	</style>
</head>
<body>
	<div id="invoice">
		<div class="toolbar hidden-print">
			<div class="text-right">
				<button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
				<!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
			</div>
			<hr>
		</div>
		<div class="invoice overflow-auto">
			<div style="min-width: 600px">
				<header>
					<div class="row">
						<div class="col">
							<a target="_blank" href="<?php echo $site['link'] ?>">
								<img src="<?php echo image_module('config/logo',$logo['image']) ?>" width="250" data-holder-rendered="true" />
								</a>
						</div>
						<div class="col company-details">
							<h2 class="name">
								<a target="_blank" href="<?php echo $site['link'] ?>">
								<?php echo $site['title'] ?>
								</a>
							</h2>
							<div><?php echo $contact['address'] ?></div>
							<div><?php echo $contact['phone'] ?></div>
							<div><?php echo $contact['email'] ?></div>
						</div>
					</div>
				</header>
				<main>
					<div class="row contacts">
						<div class="col invoice-to">
							<div class="text-gray-light">INVOICE TO:</div>
							<h2 class="to"><?php echo $data['receiver'] ?></h2>
							<!-- <div class="address">-</div> -->
							<!-- <div class="email"><a href="mailto:john@example.com">john@example.com</a></div> -->
						</div>
						<div class="col invoice-details">
							<h1 class="invoice-id">INVOICE <?php echo $data['code'] ?></h1>
							<div class="date">Date of Invoice: <?php echo date('d/m/Y', strtotime($data['created'])) ?></div>
							<div class="date">Due Date: <?php echo date('d/m/Y', strtotime($data['updated'])) ?></div>
						</div>
					</div>
					<table border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<th>#</th>
								<th class="text-left">DESCRIPTION</th>
								<th class="text-right">TOTAL</th>
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
							$i = 1;
							foreach ($each_item as $key => $value)
							{
								?>
								<tr>
									<td class="no"><?php echo $i ?></td>
									<td class="text-left"><h3>
										<?php echo $key ?>
									</td>
									<td class="total"><?php echo 'Rp. '.number_format($value, 2, ',', '.'); ?></td>
								</tr>
								<?php
								$sub_total += $value;
								$i++; 
							}
							if(!empty($data['ppn']))
							{
								$ppn = ($sub_total*10)/100;
								$total = $sub_total+$ppn;
							}else{
								$total = $sub_total;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2">SUBTOTAL</td>
								<td><?php echo 'Rp. '.number_format($sub_total, 2, ',', '.'); ?></td>
							</tr>
							<?php
							if(!empty($ppn))
							{
								?>
								<tr>
									<td colspan="2">10% PPN</td>
									<td><?php echo 'Rp. '.number_format($ppn, 2, ',', '.'); ?></td>
								</tr>
								<?php
							}?>
							<tr>
								<td colspan="2">GRAND TOTAL</td>
								<td><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
						</tfoot>
					</table>
					<div class="thanks">Thank you!</div>
					<!-- <div class="notices">
						<div>NOTICE:</div>
						<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
					</div> -->
				</main>
				<footer>
					Invoice was created on a computer and is valid without the signature and seal.
				</footer>
			</div>
			<div></div>
		</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#printInvoice').click(function(){
	  Popup($('.invoice')[0].outerHTML);
	  function Popup(data) 
	  {
		window.print();
		return true;
	  }
	});
	</script>
</body>
</html>
