
	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Riwayat Penilaian
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
				<form class="form-horizontal">
				<br>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label col-md-2"><b>ID Karyawan : </b></label>
							<label class="control-label col-md-7 "><p class="pull-left"><?= $id_karyawan ?></p></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label col-md-2"><b>Nama Karyawan : </b></label>
							<label class="control-label col-md-7 "><p class="pull-left"><?= $nama ?></p></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label col-md-2"><b>Jabatan : </b></label>
							<label class="control-label col-md-7 "><p class="pull-left"><?= $jabatan ?></p></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="control-label col-md-2"><b>Outlet : </b></label>
							<label class="control-label col-md-7 "><p class="pull-left"><?= $outlet ?></p></label>
						</div>
					</div>
				<br>
				</form>

				<table class="table table-striped table-bordered table-hover" id="sample_3">
					<thead>
						<tr>
							<th style="width:10%;text-align:center;" >
								No.
							</th>
							<th style="width:60%;text-align:center;">
								 Periode
							</th>
							<th style="width:30%;text-align:center;">
								 Nilai
							</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach ($riwayat->result() as $riwayat) : ?>
						<tr class="odd gradeX" id="r<?php echo $riwayat->ID_PENILAIAN; ?>">
							<td style="text-align:center;">
								<?= $no++; ?>
							</td> 
							<td>
								<?php echo ucfirst(strtolower($riwayat->NAMA_PERIODE)); ?>
							</td> 
							<td style="text-align:center;"> 
								<?php echo $riwayat->PENILAIAN_TOTAL; ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>


			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
	<div class="modal fade" id="modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div id="modal-form">
			
			</div>
			<!-- /.modal-form -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
