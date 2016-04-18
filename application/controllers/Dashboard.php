<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * dashboard
	 */
	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->m_security->check();

		$isi['content']		='dashboard/dashboard';
		$isi['judul_menu']	='Dashboard';
		$isi['judul']		='Dashboard <small>laporan statistik</small>';
		$isi['breadcrumb1']	='Dashboard';
		$isi['breadcrumb2']	='';

		$this->load->view('tampilan_utama',$isi);
	}

	public function setting_profil()
	{
		$this->m_security->check();

		$isi['content']		='dashboard/setting_profil';
		$isi['judul_menu']	='Setting Profil';
		$isi['judul']		='Dashboard <small>Setting Profil</small>';
		$isi['breadcrumb1']	='Dashboard';
		$isi['breadcrumb2']	='Setting Profil';
		$id = $this->session->userdata('id_karyawan');
		$isi['karyawan']	= $this->m_karyawan->get_id($id);

		$this->load->view('tampilan_utama',$isi);
	}
	
	public function setting_profil_act()
	{
		$this->m_security->check();

		$pass_lama = $this->input->post('pass_lama');
		$pass = $this->input->post('pass');

		$id = $this->session->userdata('id_karyawan');

		$karyawan = $this->m_karyawan->get_id($id);
		if ($karyawan[0]->PASSWORD == md5($pass_lama)) {
			$this->m_karyawan->update_pass($id,$pass);
			$this->session->set_flashdata('jenis','alert-success');
			$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Password berhasil di ubah.');
		}else{
			$this->session->set_flashdata('jenis','alert-danger');
			$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Password lama salah !');
		}
		redirect('dashboard/setting_profil');
	}
}
