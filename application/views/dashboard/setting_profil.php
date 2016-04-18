	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Setting Profil
				</div>
			</div>
			<div class="portlet-body">
				<?php 
					if(isset($_SESSION['jenis']) && isset($_SESSION['pesan'])){
						echo "
							<div class='alert ".$_SESSION['jenis']." alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
								".$_SESSION['pesan']."
							</div>
						";
					}
				?>

				<form class='form-horizontal'>
					<?php foreach ($karyawan as $karyawan) : ?>
					<div class='form-group'>
						<label class='col-md-3 control-label'>ID Karyawan</label>
						<div class='col-md-4'>
							<input type='text' class='form-control' placeholder='ID' id='id' name='id' value="<?= $karyawan->ID_KARYAWAN ?>" readonly="true" required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Karyawan</label>
						<div class='col-md-4'>
							<input type='text' class='form-control' placeholder='Nama Karyawan' id='nama' name='nama' value="<?= $karyawan->NAMA_KARYAWAN ?>" readonly="true" required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Status Karyawan</label>
						<div class='col-md-4'>
							<input type='text' class='form-control' placeholder='Status Karyawan' id='status' name='status' value="<?= $karyawan->STATUS_KARYAWAN ?>" readonly="true" required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Jabatan</label>
						<div class='col-md-4'>
							<input type='text' class='form-control' placeholder='Jabatan Karyawan' id='jabatan' name='jabatan' value="<?= $karyawan->NAMA_JABATAN ?>" readonly="true" required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Jenis Kelamin</label>
						<div class='col-md-4'>
							<input type='text' class='form-control' placeholder='Jenis Kelamin' id='jk' name='jk' value="<?= $karyawan->JENIS_KELAMIN ?>" readonly="true" required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Tempat Kerja</label>
						<div class='col-md-4'>
							<input type='text' class='form-control' placeholder='Outlet' id='outlet' name='outlet' value="<?= $karyawan->NAMA_OUTLET ?>" readonly="true" required>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-md-offset-3 col-md-4'>
							<button type='reset' class='btn blue' data-toggle="modal" href="#modal">Ubah Password</button>
						</div>
					</div>
				<?php endforeach; ?>
				</form>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
	<div class="modal fade" id="modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div id="modal-form">
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Ubah Password</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='<?= base_url() ?>dashboard/setting_profil_act'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Password Lama</label>
						<div class='col-md-9'>
							<input type='password' class='form-control' placeholder='Password Lama' id='pass_lama' name='pass_lama' pattern='[a-zA-Z0-9].{8,}' title='Minimal 8 character' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Password Baru</label>
						<div class='col-md-9'>
							<input type='password' class='form-control' placeholder='Password' id='pass' name='pass' pattern='[a-zA-Z0-9].{8,}' title='Minimal 8 character' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Confirm Password Baru</label>
						<div class='col-md-9'>
							<input type='password' class='form-control' placeholder='Confirm Password' id='con_pass' min-length='8' name='con_pass' onBlur='match()' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>			
			</div>
			<!-- /.modal-form -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


	<script>
	function match(){
		var pass = $("#pass").val();
		var con_pass = $("#con_pass").val();

		if (pass != con_pass)
		{
			alert("Confirmasi password harus sama dengan password !");
			$("#con_pass").val('');
		}
	}
	</script>