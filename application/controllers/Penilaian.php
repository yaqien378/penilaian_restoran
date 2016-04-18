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


}
