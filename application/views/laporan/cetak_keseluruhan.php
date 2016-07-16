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
				<td>
				 <?php
			 		$pelatihan = $this->m_rekomendasi_pelatihan->join_all(array('rekomendasi_pelatihan.ID_PENILAIAN'=>$value->ID_PENILAIAN));
			 		if (count($pelatihan) > 0)
			 		{
			 			foreach ($pelatihan as $p)
			 			{
			 				echo ucfirst(strtolower($p->NAMA_PELATIHAN)).", ";
			 			}
			 		}
			 	?> 
				 </td>
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
