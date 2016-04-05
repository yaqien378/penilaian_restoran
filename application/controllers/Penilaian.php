<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	/**
	 * Penilaian
	 */
	public function penilaian_view()
	{
		// $this->m_security->check();

		$isi['content']		='penilaian/penilaian';
		$isi['judul_menu']	='Penilaian';
		$isi['judul']		='Penilaian';
		$isi['breadcrumb1']	='Penilaian';
		$isi['breadcrumb2']	='';
		$isi['periode'] = $this->m_periode->get_all();
		$isi['outlet'] = $this->m_outlet->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function proses_penilaian($id_karyawan,$periode)
	{
		// $this->m_security->check();

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
		// $this->m_security->check();

		if($act == 'simpan'){
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			$id_penilaian = $this->input->post('id_penilaian');
			$periode = $this->input->post('periode');
			$id_karyawan = '1';
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

		}else if($act == 'ubah'){
			/*$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_outlet->update($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/outlet');*/

		}else if($act == 'hapus'){
			/*$id = $this->input->post('id');
			$this->m_outlet->delete($id);*/

		}else if($act == 'tambah'){
			/*$id = $this->m_security->gen_id('outlet','ID_OUTLET');
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Outlet</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/outlet_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Jabatan</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Jabatan' id='nama' name='nama'>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";*/

		}else if($act == 'edit'){
			/*$id = $this->input->post('id');
			$query = $this->m_outlet->get_id($id);
			foreach ($query as $row) {
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Ubah Data Outlet</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/outlet_act/ubah'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Jabatan</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Jabatan' id='nama' name='nama' value='".$row->NAMA_OUTLET."'>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";
			}*/
		
		}else if($act == 'cek'){
			$periode = $this->input->post('periode');
			$outlet = $this->input->post('outlet');

			$karyawan = $this->m_karyawan->get_by_outlet($outlet);//mendapatkan daftar karyawan

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
							<th style='width:15%;text-align:center;'>
								 Proses Penilaian
							</th>
							<th style='width:15%;text-align:center;'>
								 Nilai
							</th>
						</tr>
					</thead>
					<tbody>
			";
			$no = 1;
			foreach ($karyawan->result() as $karyawan) {

				$cek = $this->m_penilaian->cek_penilaian($karyawan->ID_KARYAWAN);//mengecek karyawan sudah pernah di nilai atau belum
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
							</td>
							<td style='text-align:center;'>
								<div class='btn-group btn-group-sm btn-group-solid '>
									<a href='".base_url()."penilaian/proses_penilaian/".$karyawan->ID_KARYAWAN."/".$periode."' class='btn green' id='beri' disabled>Beri Nilai</a>
								</div>
							</td>
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
							</td>
							<td style='text-align:center;'>
								<div class='btn-group btn-group-sm btn-group-solid '>
									<a href='".base_url()."penilaian/proses_penilaian/".$karyawan->ID_KARYAWAN."/".$periode."' class='btn green' id='beri'>Beri Nilai</a>
								</div>
							</td>
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

}
