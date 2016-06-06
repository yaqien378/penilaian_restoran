	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Rapor Penilaian Keseluruhan
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%;">
							<tr>
								<td style="text-align:center;">
									<b><u>LAPORAN PENILAIAN KARYAWAN</u></b>
								</td>
							</tr>
							<tr>
								<td style="text-align:center;">
									<?= $periode ?>
								</td>
							</tr>
						</table>						
					</div>
				</div>
				<br>
				<div class="table-scrollable">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width:15%; text-align:center;"> NIK </th>
								<th style="width:30%; text-align:center;"> NAMA KARYAWAN </th>
								<th style="width:20%; text-align:center;"> JABATAN </th>
								<th style="width:15%; text-align:center;"> NILAI </th>
								<th style="width:20%; text-align:center;"> REKOMENDASI </th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($penilaian)){?>
							<?php foreach ($penilaian as $value):?>
							<tr>
								<td style="text-align:center;"> <?= $value->ID_KARYAWAN ?> </td>
								<td> <?= ucfirst(strtolower($value->NAMA_KARYAWAN)) ?> </td>
								<td style="text-align:center;"> <?= ucfirst(strtolower($value->NAMA_JABATAN)) ?> </td>
								<td style="text-align:center;"> <?= $value->PENILAIAN_TOTAL ?> </td>
								<td> <?= ucfirst(strtolower($value->NAMA_PELATIHAN)) ?> </td>
							</tr>
							<?php endforeach; ?>
							<?php }else{ ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%;">
							<tr>
								<td style="width:70%;text-align:center;"></td>
								<td style="width:30%;text-align:center;">
									<p>Surabaya, <?= date("d M Y") ?></p>
									<p>Dicetak oleh,</p>
									<br>
									<br>
									<br>
									<p><b><u><?= $this->session->userdata('nama') ?></u></b></p>
									<p><?= $this->session->userdata('id_karyawan') ?></p>
								</td>
							</tr>
						</table>						
					</div>
				</div>
				<div>
					<?php if (isset($penilaian)){?>
					*NB : 
					<a href="<?php echo base_url(); ?>laporan/cetak_keseluruhan/<?= $id_periode ?>/<?= $id_outlet ?>" ><i class="fa fa-file-pdf-o"></i> Cetak ke Pdf</a>
					<?php } ?>
				</div>
				<div>

				</div>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>