	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Data Karyawan
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
					<th style="width:10%">
						 ID Karyawan
					</th>
					<th style="width:15%">
						 Nama
					</th>
					<th style="width:10%">
						 Departemen
					</th>
					<th style="width:10%">
						 Golongan
					</th>
					<th style="width:5%">
						 JK
					</th>
					<th style="width:20%">
						 Alamat
					</th>
					<th style="width:15%">
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
						Achmad Ainul yaqin
					</td>
					<td>
						accounting
					</td>
					<td>
						Golongan 1
					</td>
					<td>
						Pria
					</td>
					<td>
						Jl. Raya Luwung No.28 RT.03 RW.02 Beji pasuruan.
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
					<h4 class="modal-title">Tambah Karyawan</h4>
				</div>
			 <form class="form-horizontal" role="form" method="post" action="#">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label">ID Karyawan</label>
						<div class="col-md-5">
							<input type="text" class="form-control" placeholder="ID">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama</label>
						<div class="col-md-9">
							<input type="text" class="form-control" placeholder="Nama Karyawan">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Departemen</label>
						<div class="col-md-9">
							<select name="departemen" id="departemen" class="form-control">
								<option value="accounting">accounting</option>
								<option value="marketing">marketing</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Golongan</label>
						<div class="col-md-9">
							<select name="golongan" id="golongan" class="form-control">
								<option value="golongan1">golongan 1</option>
								<option value="golongan2">golongan 2</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Jenis Kelamin</label>
						<div class="col-md-9">
							<div class="radio-list">
								<label class="radio-inline">
								<input type="radio" name="jk" id="pria" value="pria" checked>Pria</label>
								<label class="radio-inline">
								<input type="radio" name="jk" id="wanita" value="wanita">Wanita</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Alamat</label>
						<div class="col-md-9">
							<textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
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