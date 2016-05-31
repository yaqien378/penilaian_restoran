<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	/**
	 * Penilaian karyawan
	 */
	public function penilaian_view()
	{
		$this->m_security->check();
		$anti_level = array('5');
		$this->m_security->access($anti_level);

		$id = $this->session->userdata('id_karyawan');

		$isi['content']		='penilaian/penilaian';
		$isi['judul_menu']	='Penilaian';
		$isi['judul']		='Penilaian';
		$isi['breadcrumb1']	='Penilaian';
		$isi['breadcrumb2']	='';
		$isi['periode'] = $this->m_periode->get_all();

		$level = $this->session->userdata('level');
		if ($level == '1') {
			$isi['outlet'] = $this->m_outlet->get_all();//menampilkan semua outlet untuk level owner
		}else{
			$isi['outlet'] = $this->m_karyawan->get_id($id);//mendapatkan nama outlet berdasarkan karyawan
		}

		$this->load->view('tampilan_utama',$isi);
	}

	public function proses_penilaian($id_karyawan,$periode)
	{
		$this->m_security->check();
		$anti_level = array('5');
		$this->m_security->access($anti_level);

		$isi['content']		='penilaian/proses_penilaian';
		$isi['judul_menu']	='Proses Penilaian';
		$isi['judul']		='Proses Penilaian';
		$isi['breadcrumb1']	='Penilaian';
		$isi['breadcrumb2']	='Proses Penilaian';

		$isi['karyawan']	=$this->m_karyawan->get_id($id_karyawan);
		$isi['kriteria']	=$this->m_kriteria->get_all();
		$isi['periode']		=$periode;
		$isi['id']			=$this->m_security->gen_id('penilaian','ID_PENILAIAN');
		


		$this->load->view('tampilan_utama',$isi);
	}

	public function penilaian_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5');
		$this->m_security->access($anti_level);

		if($act == 'simpan'){
			$id_penilaian = $this->input->post('id_penilaian');
			$periode = $this->input->post('periode');
			$id_karyawan = $this->session->userdata('id_karyawan');
			$kar_id_karyawan = $this->input->post('id_karyawan');
			$ket = '';
			$nilai_total = 0;

			$id_kriteria = $this->input->post('id_kriteria');
			$nilai = $this->input->post('nilai');
			$dasar_penilaian = $this->input->post('dasar_penilaian');
			
			//kalkulasi penilaian total
			$count_data = count($id_kriteria);
			for ($i=1; $i <= $count_data; $i++)
			{
				$kriteria = $this->m_kriteria->get_id($id_kriteria[$i]);

				$bobot = $kriteria[0]->BOBOT;

				$nilai_per_kriteria = ($bobot * $nilai[$i]) / 100;

				$nilai_total = $nilai_total + $nilai_per_kriteria;
			}

			//menyimpan penilaian
			$query = $this->m_penilaian->create($id_penilaian,$periode,$id_karyawan,$kar_id_karyawan,$ket,$nilai_total);

			//menyimpan kriteria penilaian karyawan
			for ($i=1; $i <= $count_data; $i++)
			{
				$this->m_kriteria_penilaian_kar->create($id_kriteria[$i],$id_penilaian,$nilai[$i],$dasar_penilaian[$i]);
			}

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('penilaian/penilaian_view');
			
		}else if($act == 'cek'){
			$periode 	= $this->input->post('periode');
			$outlet 	= $this->input->post('outlet');

			$level 		= $this->session->userdata('level'); 
			$id 		= $this->session->userdata('id_karyawan'); 

			$karyawans = $this->m_karyawan->get_by_outlet_level($outlet,$level);//mendapatkan daftar karyawan

			echo "
				<br>
				<table class='table table-striped table-bordered table-hover' id='sample_3'>
					<thead>
						<tr>
							<th style='width:5%;text-align:center;' >
								No.
							</th>
							<th style='width:25%;text-align:center;'>
								 Nama Karyawan
							</th>";
							if ($level!='5') {
							echo "
							<th style='width:15%;text-align:center;'>
								 Proses Penilaian
							</th>";
							}
							echo "
							<th style='width:15%;text-align:center;'>
								 Nilai
							</th>
						</tr>
					</thead>
					<tbody>
			";


			$no = 1;

			foreach ($karyawans->result() as $karyawan) {

				$cek = $this->m_penilaian->cek_penilaian($karyawan->ID_KARYAWAN,$periode);//mengecek karyawan sudah pernah di nilai atau belum
				if ($cek->num_rows() > 0)
				{
					foreach ($cek->result() as $penilaian) {
						
					echo "
					<tr class='odd gradeX'>
							<td style='text-align:center;'>
								".$no."
							</td>
							<td>
								".ucfirst(strtolower($penilaian->NAMA_KARYAWAN))."
							</td>";
							if ($level!='5') {
							echo "
							<td style='text-align:center;'>
								<div class='btn-group btn-group-sm btn-group-solid '>
									<a href='".base_url()."penilaian/proses_penilaian/".$karyawan->ID_KARYAWAN."/".$periode."' class='btn green' id='beri' disabled>Beri Nilai</a>
								</div>
							</td>";
							}
							echo "
							<td style='text-align:center;'>
								".$penilaian->PENILAIAN_TOTAL."
							</td>
						</tr>
					";
					}
				}else{
					echo "
						<tr class='odd gradeX'>
							<td style='text-align:center;'>
								".$no."
							</td>
							<td>
								".ucfirst(strtolower($karyawan->NAMA_KARYAWAN))."
							</td>";
							if ($level!='5') {
							echo "
							<td style='text-align:center;'>
								<div class='btn-group btn-group-sm btn-group-solid '>
									<a href='".base_url()."penilaian/proses_penilaian/".$karyawan->ID_KARYAWAN."/".$periode."' class='btn green' id='beri'>Beri Nilai</a>
								</div>
							</td>";
							}
							echo "
							<td style='text-align:center;'>
								
							</td>
						</tr>
					";
				}
				$no++;
			}


			echo "
					</tbody>
				</table>
			";
		}else{
			redirect('penilaian/penilaian');
		}
	}


	/**
	 * Riwayat Penilaian
	 */
	public function riwayat_penilaian()
	{
		$this->m_security->check();

		$id = $this->session->userdata('id_karyawan');

		$isi['content']		='penilaian/riwayat_penilaian';
		$isi['judul_menu']	='Riwayat Penilaian';
		$isi['judul']		='Penilaian';
		$isi['breadcrumb1']	='Penilaian';
		$isi['breadcrumb2']	='Riwayat penilaian';
		$id 				= $this->session->userdata('id_karyawan');
		$isi['riwayat']		= $this->m_penilaian->cek_riwayat($id);

		$karyawan = $this->m_karyawan->get_id($id);
		foreach ($karyawan as $karyawan) {
			$isi['id_karyawan']	= $karyawan->ID_KARYAWAN;
			$isi['nama']	= $karyawan->NAMA_KARYAWAN;
			$isi['jabatan']	= $karyawan->NAMA_JABATAN;
			$isi['outlet']	= $karyawan->NAMA_OUTLET;
		}

		$this->load->view('tampilan_utama',$isi);
	}

	/*
	*rekomendasi pelatihan
	*/
	public function rekomendasi()
	{
		$this->m_security->check();
		$anti_level = array('1,3,4,5');
		$this->m_security->access($anti_level);

		$id = $this->session->userdata('id_karyawan');

		$isi['content']		='penilaian/rekomendasi';
		$isi['judul_menu']	='Rekomendasi';
		$isi['judul']		='Penilaian';
		$isi['breadcrumb1']	='Penilaian';
		$isi['breadcrumb2']	='Rekomendasi';
		$isi['periode'] = $this->m_periode->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function rekomendasi_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5');
		$this->m_security->access($anti_level);

		if ($act == 'cek') {
			$outlet = $this->session->userdata('outlet');
			$periode = $this->input->post('periode');

			echo "
				<br>
				<table class='table table-striped table-bordered table-hover' id='sample_3'>
					<thead>
						<tr>
							<th style='width:5%;text-align:center;' >
								No.
							</th>
							<th style='width:25%;text-align:center;'>
								 Nama Karyawan
							</th>
							<th style='width:10%;text-align:center;'>
								Nilai akhir
							</th>
							<th style='width:25%;text-align:center;'>
								Keterangan
							</th>
							<th style='width:15%;text-align:center;'>
								 Rekomendasi
							</th>
							<th style='width:15%;text-align:center;'>
								 Proses rekomendasi
							</th>
						</tr>
					</thead>
					<tbody>
			";
			//mengecek apakah karyawan dan periode punya transaksi penilaian

			$karyawans = $this->m_karyawan->get_by_outlet($outlet);
			$no = 1;
			foreach ($karyawans->result() as $karyawan)
			{
				$cek_penilaian = $this->m_penilaian->cek_penilaian($karyawan->ID_KARYAWAN,$periode)->result();
				foreach ($cek_penilaian as $penilaian) {
					if ($penilaian->ID_PENILAIAN)
					{
						$rekomendasi = $this->m_rekomendasi_pelatihan->cek_rekomendasi_pelatihan($penilaian->ID_PENILAIAN)->result();
						if ($rekomendasi)
						{

							echo "
							<tr class='odd gradeX'>
									<td style='text-align:center;'>
										".$no."
									</td>
									<td>
										".ucfirst(strtolower($rekomendasi[0]->NAMA_KARYAWAN))."
									</td>
									<td style='text-align:center;'>
										".$rekomendasi[0]->PENILAIAN_TOTAL."
									</td>
									<td>
										".$rekomendasi[0]->KETERANGAN_PENILAIAN."
									</td>
									<td style='text-align:center;'>
										".ucfirst(strtolower($rekomendasi[0]->NAMA_PELATIHAN))."
									</td>
									<td style='text-align:center;'>
									</td>
								</tr>
							";
							$no++;
						}else{

							echo "
							<tr class='odd gradeX'>
									<td style='text-align:center;'>
										".$no."
									</td>
									<td>
										".ucfirst(strtolower($penilaian->NAMA_KARYAWAN))."
									</td>
									<td style='text-align:center;'>
										".$penilaian->PENILAIAN_TOTAL."
									</td>
									<td>
										".$penilaian->KETERANGAN_PENILAIAN."
									</td>
									<td style='text-align:center;'>
									</td>
									<td style='text-align:center;'>
										<div class='btn-group btn-group-sm btn-group-solid '>
											<a data-toggle='modal' href='#modal' class='btn green' onClick='rekomendasi(".$penilaian->ID_PENILAIAN.")'>Rekomendasi</a>
										</div>
									</td>
								</tr>
							";
							$no++;
						}
												
					}
				}

			}

			echo "
					</tbody>
				</table>
			";
		}else
		if($act == 'rekomendasi')
		{
			$id_penilaian = $this->input->post('id');

			$data = $this->m_kriteria_penilaian_kar->get_by_penilaian($id_penilaian)->result();

			$penilaian = $this->m_penilaian->get_by_id($id_penilaian)->result();

			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Rekomendasi Pelatihan</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."penilaian/rekomendasi_act/simpan'>
				<div class='modal-body'>";
				// echo "<pre>";
				// print_r($penilaian);
				// echo "</pre>";
				echo '
					<table style="width:100%;">
						<tr>
							<td style="width:25%"><b>NIK</b></td>
							<td><b>:</b> '.ucfirst(strtolower($penilaian[0]->ID_KARYAWAN)).'</td>
						</tr>
						<tr>
							<td style="width:25%"><b>Nama Karyawan</b></td>
							<td><b>:</b> '.ucfirst(strtolower($penilaian[0]->NAMA_KARYAWAN)).'</td>
						</tr>
						<tr>
							<td style="width:25%"><b>Jabatan</b></td>
							<td><b>:</b> '.ucfirst(strtolower($penilaian[0]->NAMA_JABATAN)).'</td>
						</tr>
					</table>
				';
				echo '<br>';

					echo '
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width:25%; text-align:center;"> KRITERIA </th>
								<th style="width:15%; text-align:center;"> BOBOT (%) </th>
								<th style="width:15%; text-align:center;"> NILAI </th>
								<th style="width:30%; text-align:center;"> KETERANGAN </th>
								<th style="width:10%; text-align:center;"> B x N </th>
							</tr>
						</thead>
						<tbody>';
						foreach ($data as $value) {
							$BxN = ($value->BOBOT/100)*$value->NILAI;
							echo '
							<tr>
								<td> '.ucfirst(strtolower($value->NAMA_KRITERIA)).' </td>
								<td style="text-align:center;">'.$value->BOBOT.' </td>
								<td style="text-align:center;">'.$value->NILAI.'</td>
								<td>'.ucfirst(strtolower($value->DASAR_PENILAIAN)).'</td>
								<td style="text-align:center;">'.$BxN.'</td>
							</tr>';
						}

						echo '
							<tr>
								<td colspan="4" style="text-align:right;"><b>Nilai Total</b></td>
								<td style="text-align:center;"><b>'.$penilaian[0]->PENILAIAN_TOTAL.'</b></td>
							</tr>
						';

							echo '
						</tbody>
					</table>						
					';
					echo '<br>';
					echo '<input type="hidden" name="penilaian" value="'.$penilaian[0]->ID_PENILAIAN.'" required>';

					echo "
						<div class='form-group'>
							<label class='col-md-3 control-label'><b>Jenis Pelatihan</b></label>
							<div class='col-md-9'>

								<select name='pelatihan' id='pelatihan' class='form-control' required>
									<option value=''>-- Pilih Pelatihan --</option>";
									$pelatihan = $this->m_pelatihan->get_all();
									foreach ($pelatihan as $pelatihan) {
										echo "<option value='".$pelatihan->ID_PELATIHAN."'>".ucfirst(strtolower($pelatihan->NAMA_PELATIHAN))."</option>";
									}
									echo "
								</select>
							</div>
						</div>
					";

				echo	
				"</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";
		}else
		if($act == 'simpan')
		{
			$id_penilaian = $this->input->post('penilaian');
			$id_pelatihan = $this->input->post('pelatihan');

			$query = $this->m_rekomendasi_pelatihan->create($id_penilaian,$id_pelatihan);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Rekomendasi pelatihan berhasil di simpan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Rekomendasi pelatihan gagal di simpan.');
			}
			redirect('penilaian/rekomendasi');
		}




	}

}
