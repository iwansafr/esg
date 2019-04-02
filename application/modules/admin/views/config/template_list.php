<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Manage Template</h3>		
	</div>
	<div class="panel-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5>Template List</h5>							
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table">
									<tr>
										<th>Template</th>
										<th>Download</th>
										<th>action</th>
									</tr>
									{templates}
										<tr>
											<td>{title}</td>
											<td><a href="{link}" class="btn btn-sm btn-default"><i class="fa fa-download"></i></a></td>
											<td><a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
										</tr>
									{/templates}
								</table>
							</div>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5>Upload Template</h5>							
						</div>
						<div class="panel-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Choose Template File</label>
									<input type="file" name="template_arch" class="form-control">
								</div>
							</form>
						</div>
						<div class="panel-footer">
							<button class="btn btn-sm btn-default"><i class="fa fa-upload"></i> Upload</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer"></div>
</div>