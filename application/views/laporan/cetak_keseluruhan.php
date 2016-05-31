	<table width="100%" height="102px">
		<tr>
			<td width="100%" style="text-align:center; background:url('<?php echo base_url();?>assets/img/logo.png') no-repeat left;">
				<h4><b>NAMA DAN JUDUL DARI ORGANISASI PIZZA HUT WILAYAH SURABAYA</b>
				</h4>
				Jl. Letjen S. Parman No.55 Waru, Telp. (031)8550222<br>
				Surabaya 61256
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
	<table style="width:100%" border="1px" cellspacing="0" cellpadding="4px">
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
			<?php foreach ($penilaian as $value):?>
			<tr>
				<td style="text-align:center;"> <?= $value->ID_KARYAWAN ?> </td>
				<td> <?= ucfirst(strtolower($value->NAMA_KARYAWAN)) ?> </td>
				<td style="text-align:center;"> <?= ucfirst(strtolower($value->NAMA_JABATAN)) ?> </td>
				<td style="text-align:center;"> <?= $value->PENILAIAN_TOTAL ?> </td>
				<td> <?= ucfirst(strtolower($value->NAMA_PELATIHAN)) ?> </td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<br>
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
