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

		//mendapatkan periode
		$periode = $this->m_periode->get_periode(date("Y"));

		$list_periode = '';
		foreach ($periode as $p)
		{
			$list_periode .= $p->ID_PERIODE2.',';
		}
		$list_periode 		= substr_replace($list_periode, '',-1,1);
		$id 				= $_SESSION['id_karyawan'];

		$riwayat_penilai 	= $this->m_penilaian->get_kar_grafik($id,$list_periode);
		$isi['riwayat_anda']= '';
		foreach ($riwayat_penilai as $r)
		{
			$isi['riwayat_anda'] .= $r->PENILAIAN_TOTAL.',';
		}

			$data_grafik = '';
		//mendapatkan id periode bulan terakhir
		$bulan = $this->m_periode->get_periode(date("Y-m"));
		if (count($bulan) > 0)
		{
			$id_periode_bulan = $bulan[0]->ID_PERIODE2;
			$riwayat_pegawai = $this->m_penilaian->get_peg_grafik($id,$id_periode_bulan);
			foreach ($riwayat_pegawai as $rp) {
				$data_grafik .= "
						{
			                name: '".$rp->NAMA_KARYAWAN."',
			                y: ".$rp->PENILAIAN_TOTAL.",
			            },
				";
			}
			$isi['data_peg'] = $data_grafik;
		}else{
			$isi['data_peg'] = '';
		}

		$isi['tahun_periode'] = date("Y");
		$isi['bulan_periode'] = date("M");
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
