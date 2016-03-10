	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Data Kriteria
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
					<th style="width:15%">
						 ID Kriteria
					</th>
					<th style="width:20%">
						 Kriteria
					</th>
					<th style="width:40%">
						 Keterangan
					</th>
					<th style="width:20%">
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
						Baik
					</td>
					<td>
						Semua Tentang hal baik
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
					<h4 class="modal-title">Tambah Kriteria</h4>
				</div>
			 <form class="form-horizontal" role="form" method="post" action="#">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Kriteria</label>
						<div class="col-md-5">
							<input type="text" class="form-control" placeholder="ID">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Kriteria</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Kriteria">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Keterangan</label>
						<div class="col-md-9">
							<textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
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