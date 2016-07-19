	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Rapor Penilaian Per Karyawan
				</div>
			</div>
			<div class="portlet-body">
				<form action="<?= base_url() ?>laporan/view_perkaryawan" method="post" class="form-horizontal">
				<br>
				<div class="row">
					<div class="col-md-12">
						<?php if(isset($outlet)): ?>
						<div class="form-group">
							<label for="periode" class="control-label col-md-4">Outlet </label>
							<div class="col-md-4">
								<select name="outlet" id="outlet" class="form-control" onchange="pilih_karyawan()" required>
									<option value="">-- Pilih Outlet --</option>
									<?php 
										foreach ($outlet as $outlet) {
											echo "<option value='".$outlet->ID_OUTLET."'>".ucfirst(strtolower($outlet->NAMA_OUTLET))."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="periode" class="control-label col-md-4">Periode </label>
							<div class="col-md-4">
								<select name="periode" id="periode" class="form-control" required>
									<option value="">-- Pilih Periode --</option>
									<?php 
										foreach ($periode as $periode) {
											echo "<option value='".$periode->ID_PERIODE2."'>".ucfirst(strtolower($periode->NAMA_PERIODE))."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div id="box-karyawan">
						<div class="form-group">
							<label for="karyawan" class="control-label col-md-4">Nama karyawan </label>
							<div class="col-md-4">
								<select name="karyawan" id="karyawan" class="form-control" required>
									<option value="">-- Pilih Karyawan --</option>
									<?php 
										foreach ($karyawan->result() as $karyawan) {
											echo "<option value='".$karyawan->ID_KARYAWAN."'>".ucfirst(strtolower($karyawan->NAMA_KARYAWAN))."</option>";
										}
									?>
								</select>
							</div>
						</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-4 col-md-4">
								<button type="submit" class="btn blue" name="submit">Lihat Laporan</button>
							</div>
						</div>
					</div>
				</div>
				<br>
				</form>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>

	<script>
		function pilih_karyawan()
		{
			var outlet = $("#outlet").val();
			if (outlet != '')
			{
				$.ajax({
					url 	:'<?= base_url() ?>laporan/get_karyawan',
					type	:'POST',
					data	:{'outlet':outlet},
					success	:function(r)
					{
						$("#box-karyawan").html(r);
					},
					error	:function(r)
					{
						alert("error "+r);
					}
				});
			}else{
				$("#outlet").focus();
			}
		}

	</script>