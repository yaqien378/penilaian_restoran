	<table width="100%" height="102px">
		<tr>
			<td width="100%" style="text-align:center; background:url('././assets/admin/layout4/img/logo-pizza-hut.png') no-repeat left;">
				<h4><b>PT. SARIMELATI KENCANA</b>
				</h4>
				Jl. Manyar Kertoarjo NO. 21, Surabaya
			</td>
		</tr>
	</table>
	<hr>
	<br>
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
	<br>
	<table style="width:100%">
		<tr>
			<td style="width:25%"><b>Nama Karyawan</b></td>
			<td style="width:75%">: 
			<?= ucfirst(strtolower($nama)) ?>
			</td>
		</tr>
		<tr>
			<td style="width:25%"><b>NIK</b></td>
			<td style="width:75%">: 
			<?= $nik ?>
			</td>
		</tr>
		<tr>
			<td style="width:25%"><b>Jabatan</b></td>
			<td style="width:75%">: 
			<?= ucfirst(strtolower($jabatan)) ?></td>
		</tr>
		<tr>
			<td style="width:25%"><b>Penilai</b></td>
			<td style="width:75%">: <?= ucfirst(strtolower($penilai)) ?></td>
		</tr>
	</table>
	<br>
	<table style="width:100%" border="1px" cellspacing="0" cellpadding="4px">
		<thead>
			<tr>
				<th style="width:30%; text-align:center;"> KRITERIA </th>
				<th style="width:10%; text-align:center;"> BOBOT (%) </th>
				<th style="width:10%; text-align:center;"> NILAI </th>
				<th style="width:35%; text-align:center;"> KETERANGAN </th>
				<th style="width:15%; text-align:center;"> B x N </th>
			</tr>
		</thead>
		<tbody>
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
				<td colspan="4" style="text-align:right"><b>Nilai Total</b></td>
				<td style="text-align:center"><b>90</b></td>
			</tr>
		</tbody>
	</table>

	<br>
	
	<?php if($pelatihan != '') {?>
	<p>Sesuai dengan nilai di atas saudara <?= ucfirst(strtolower($nama)) ?> di rekomendasikan untuk mengikuti pelatihan <i><?= ucfirst(strtolower($pelatihan)) ?></i>. Berikut kami sertakan catatan presensi Anda pada <?php echo ucfirst(strtolower($periode)); ?> :</p>
	<table width="150px" style="margin-left:30px;"> 
		<tr>
			<td width="100px">1. Alpha</td>
			<td> : </td>
			<td><?php echo $kehadiran['terlambat']; ?></td>
		</tr>
		<tr>
			<td>2. Izin</td>
			<td> : </td>
			<td><?php echo $kehadiran['absen']; ?></td>
		</tr>
		<tr>
			<td>3. Hadir</td>
			<td> : </td>
			<td><?php echo $kehadiran['sakit']; ?></td>
		</tr>
	</table>
	<?php } ?>

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
