	<div class="col-md-12 col-sm-12">
		<!-- BEGIN-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Rekap Data Kehadiran
				</div>
			</div>
			<div class="portlet-body">
				<h4><b>Cari Karyawan</b></h4>
				<form class="form-inline" role="form">
					<div class="form-group">
						<div class="col-md-offset-1 col-md-6">
							<input type="text" class="form-control" id="cari" placeholder="Nomer Induk Karyawan">
						</div>
					</div>
					<button type="submit" class="btn green"><i class="fa fa-search"></i> Cari</button>
				</form>
				<hr>

				<h4><b>Data Karyawan</b></h4>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Nama</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="nama" placeholder="Nama Karyawan">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Departemen</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="departemen" placeholder="Departemen">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Golongan</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="golongan" placeholder="Golongan">
						</div>
					</div>
				</form>
				<hr>
				<h4><b>Rekap Kehadiran</b></h4>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">ID</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="id" placeholder="ID">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Bulan</label>
						<div class="col-md-2">
							<select name="bulan_awal" id="bulan_awal" class="col-md-6 form-control">
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">Mei</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Agu</option>
								<option value="9">Sep</option>
								<option value="10">Okt</option>
								<option value="11">Nov</option>
								<option value="12">Des</option>
							</select>
						</div>
						<div class="col-md-1" style="width: 30px;">
							<span>-</span>
						</div>
						<div class="col-md-2">
							<select name="bulan_akhir" id="bulan_akhir" class="col-md-6 form-control">
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">Mei</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Agu</option>
								<option value="9">Sep</option>
								<option value="10">Okt</option>
								<option value="11">Nov</option>
								<option value="12">Des</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Tahun</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="tahun" placeholder="Tahun">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Tanggal</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="tanggal" placeholder="Tanggal">
						</div>
					</div>
				<hr>

					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Terlambat</label>
						<div class="col-md-2">
							<input type="text" class="form-control" id="terlambat" placeholder="Terlambat">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Absen</label>
						<div class="col-md-2">
							<input type="text" class="form-control" id="absen" placeholder="Absen">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Sakit</label>
						<div class="col-md-2">
							<input type="text" class="form-control" id="sakit" placeholder="Sakit">
						</div>
					</div>
				<hr>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button type="submit" class="btn green">Simpan</button>
						<button type="submit" class="btn btn-default">Batal</button>
					</div>
				</div>
				</form>

			</div>
		</div>
		<!-- END-->
	</div>