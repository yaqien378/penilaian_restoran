	<div class="col-md-12 col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-asterisk"></i>Rapor Penilaian Per Karyawan
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
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%">
							<tr>
								<td style="width:15%"><b>Nama Karyawan</b></td>
								<td style="width:80%">: <?= ucfirst(strtolower($nama)) ?></td>
							</tr>
							<tr>
								<td style="width:15%"><b>NIK</b></td>
								<td style="width:80%">: <?= $nik ?></td>
							</tr>
							<tr>
								<td style="width:15%"><b>Jabatan</b></td>
								<td style="width:80%">: <?= ucfirst(strtolower($jabatan)) ?></td>
							</tr>
							<tr>
								<td style="width:15%"><b>Penilai</b></td>
								<td style="width:80%">: <?= ucfirst(strtolower($penilai)) ?></td>
							</tr>
						</table>
					</div>
				</div>
				<br>
				<div class="table-scrollable">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width:25%; text-align:center;"> KRITERIA </th>
								<th style="width:15%; text-align:center;"> BOBOT (%) </th>
								<th style="width:15%; text-align:center;"> NILAI </th>
								<th style="width:30%; text-align:center;"> KETERANGAN </th>
								<th style="width:15%; text-align:center;"> B x N </th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($kriteria_penilaian)){?>
							<?php foreach ($kriteria_penilaian as $value):?>
								<?php $BxN = ($value->BOBOT/100)*$value->NILAI; ?>
							<tr>
								<td> <?= ucfirst(strtolower($value->NAMA_KRITERIA)) ?> </td>
								<td style="text-align:center;"> <?= $value->BOBOT ?> </td>
								<td style="text-align:center;"> <?= $value->NILAI ?> </td>
								<td> <?= ucfirst(strtolower($value->DASAR_PENILAIAN)) ?> </td>
								<td style="text-align:center;"> <?= $BxN ?> </td>
							</tr>
							<?php endforeach; ?>
							<tr>
								<td colspan="4" style="text-align:right;"><b>Nilai Total</b></td>
								<td style="text-align:center;"><b><?= $nilai_total ?></b></td>
							</tr>
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
					<?php if($pelatihan != '') {?>
					<p>Sesuai dengan nilai di atas saudara <?= ucfirst(strtolower($nama)) ?> di rekomendasikan untuk mengikuti pelatihan <i><?= ucfirst(strtolower($pelatihan)) ?></i>.</p>
					<?php } ?>
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
					<?php if (isset($kriteria_penilaian)){?>
					*NB : 
					<a href="<?php echo base_url(); ?>laporan/cetak_perkaryawan/<?= $id_penilaian ?>/<?= $id_pelatihan ?>" ><i class="fa fa-file-pdf-o"></i> Cetak ke Pdf</a>
					<?php } ?>
				</div>
				<div>

				</div>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>