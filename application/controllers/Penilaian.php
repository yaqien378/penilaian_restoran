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

	public function proses_penilaian()
	{
		// $this->m_security->check();

		$isi['content']		='penilaian/proses_penilaian';
		$isi['judul_menu']	='Proses Penilaian';
		$isi['judul']		='Proses Penilaian';
		$isi['breadcrumb1']	='Penilaian';
		$isi['breadcrumb2']	='Proses Penilaian';

		$this->load->view('tampilan_utama',$isi);
	}

	public function penilaian_act($act)
	{
		// $this->m_security->check();

		if($act == 'simpan'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_outlet->create($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/outlet');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_outlet->update($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/outlet');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_outlet->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('outlet','ID_OUTLET');
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
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
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
			}
		}else{
			redirect('master/outlet');
		}
	}

}
