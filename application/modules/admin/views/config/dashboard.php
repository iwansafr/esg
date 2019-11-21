<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('table');
$this->table->set_heading(['No','Table','icon','link','<div class="checkbox"><label><input id="selectAllpublish" add="publish" class="selectAll" type="checkbox">Publish</label></div>','color']);
$i = 1;
foreach ($table as $key => $value) 
{
	if($value != 'config' && $value != 'admin_menu')
	{
		$checked = '';
		if(in_array($value, (array) @$dashboard_config['publish_row']))
		{
			$checked = 'checked="checked"';
		}
		$this->table->add_row([$i,$value,'<input type="text" placeholder="fa fa-chart-bar" class="form-control" value="'.@$dashboard_config['icon'][$value].'" name="icon['.$value.']">','<input type="text" placeholder="/admin/config/dashboard" class="form-control" value="'.@$dashboard_config['link'][$value].'" name="link['.$value.']">','<div class="checkbox"><label><input type="checkbox" name="publish_row[]" value="'.$value.'" '.$checked.' class="publish" >Publish</label></div>','<input type="color" value="'.@$dashboard_config['color_row'][$value].'" name="color_row['.$value.']">']);
		$i++;
	}
}
$this->table->add_row(['<button value="submit" name="dashboard" class="btn btn-success btn-sm"><i class="fa fa-floppy-o"></i></button><a href="'.base_url('admin/config/dashboard').'" class="btn btn-sm btn-warning"><i class="fa fa-sync"></i></a>','','','']);
$template = array(
	'table_open'            => '<div class="box"><div class="box-header"><div class="box-title"><h5>Dashboard Setting</h5></div><div class="box-tools"> <button value="submit" name="dashboard" class="btn btn-success btn-sm"><i class="fa fa-floppy-o"></i></button><a href="'.base_url('admin/config/dashboard').'" class="btn btn-sm btn-warning"><i class="fa fa-sync"></i></a></div></div><div class="box-body table-responsive no-padding"><table class="table table-bordered">',
	'thead_open'            => '<thead>',
	'thead_close'           => '</thead>',
	'heading_row_start'     => '<tr>',
	'heading_row_end'       => '</tr>',
	'heading_cell_start'    => '<th>',
	'heading_cell_end'      => '</th>',
	'tbody_open'            => '<tbody>',
	'tbody_close'           => '</tbody>',
	'row_start'             => '<tr>',
	'row_end'               => '</tr>',
	'cell_start'            => '<td>',
	'cell_end'              => '</td>',
	'row_alt_start'         => '<tr>',
	'row_alt_end'           => '</tr>',
	'cell_alt_start'        => '<td>',
	'cell_alt_end'          => '</td>',
	'table_close'           => '</table></div></div>'
);
$this->table->set_template($template);
echo !empty($msg) ? msg($msg[0], $msg[1]) : '';
echo '<form action="" method="post" name="dashboard">';
echo $this->table->generate();
echo '</form>';