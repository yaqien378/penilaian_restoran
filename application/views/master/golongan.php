	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Data Golongan
				</div>
				<div class="actions">
					<a class="btn btn-default btn-sm" data-toggle="modal" href="#modal">
					<i class="fa fa-plus"></i> Tambah Data </a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_3">
				<thead>
				<tr>
					<th style="width:5%">
						No.
					</th>
					<th style="width:20%">
						 ID Golongan
					</th>
					<th style="width:40%">
						 Nama Golongan
					</th>
					<th style="width:25%">
						 Action
					</th>
				</tr>
				</thead>
				<tbody>
				<tr class="odd gradeX">
					<td>
						1
					</td>
					<td>
						 001
					</td>
					<td>
						Golongan 1
					</td>
					<td>
						<div class="btn-group btn-group-sm btn-group-solid ">
							<button type="button" class="btn blue"><i class="fa fa-pencil"></i> Edit</button>
							<button type="button" class="btn red"><i class="fa fa-trash"></i> Hapus</button>
						</div>
					</td>
				</tr>
				<tr class="odd gradeX">
					<td>
						2
					</td>
					<td>
						 002
					</td>
					<td>
						Golongan 2
					</td>
					<td>
						<div class="btn-group btn-group-sm btn-group-solid ">
							<button type="button" class="btn blue"><i class="fa fa-pencil"></i> Edit</button>
							<button type="button" class="btn red"><i class="fa fa-trash"></i> Hapus</button>
						</div>
					</td>
				</tr>
				</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
	<div class="modal fade" id="modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Tambah Golongan</h4>
				</div>
			 <form class="form-horizontal" role="form" method="post" action="#">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Golongan</label>
						<div class="col-md-5">
							<input type="text" class="form-control" placeholder="ID">
							<!-- <span class="help-block">
							A block of help text. </span> -->
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Golongan</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Departemen">
							<!-- <span class="help-block">
							A block of help text. </span> -->
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn blue">Simpan</button>
				</div>
			 </form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->