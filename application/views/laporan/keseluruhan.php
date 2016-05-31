	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Rapor Penilaian Keseluruhan
				</div>
			</div>
			<div class="portlet-body">
				<form action="<?= base_url() ?>laporan/view_keseluruhan" method="post" class="form-horizontal">
				<br>
				<div class="row">
					<div class="col-md-12">
						
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