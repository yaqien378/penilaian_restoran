	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Rapor Penilaian Keseluruhan
				</div>
			</div>
			<div class="portlet-body">
				<form action="#" method="post" class="form-horizontal">
				<br>
				<div class="row">
					<div class="col-md-12">
						
					<div class="form-group">
						<label for="periode" class="control-label col-md-4">Periode </label>
						<div class="col-md-4">
							<select name="periode" id="periode" class="form-control" onchange="set()">
								<option value="">-- Pilih Periode --</option>
								<?php 
									foreach ($periode as $periode) {
										echo "<option value='".$periode->ID_PERIODE2."'>".ucfirst(strtolower($periode->NAMA_PERIODE))."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="periode" class="control-label col-md-4">Outlet</label>
						<div class="col-md-4">
							<select name="outlet" id="outlet" class="form-control" onchange="cek()">
								<option value="">-- Pilih Outlet --</option>
								<?php 
									foreach ($outlet as $outlet) {
										echo "<option value='".$outlet->ID_OUTLET."'>".ucfirst(strtolower($outlet->NAMA_OUTLET))."</option>";
									}
								?>
							</select>
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