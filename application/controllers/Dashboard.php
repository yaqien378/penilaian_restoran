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
		$isi['riwayat_anda']= '';
		$isi['list_periode_anda']= '';
		$list_periode = '';
		
		// $periode = $this->m_periode->get_periode(date("Y"));
		$periode = $this->m_periode->get_all();
		if (count($periode)>0)
		{
			foreach ($periode as $p)
			{
				$list_periode .= $p->ID_PERIODE2.',';
				// $isi['list_periode_anda'] .= "'".$p->NAMA_PERIODE."',";
			}
			$list_periode 		= substr_replace($list_periode, '',-1,1);
			$id 				= $_SESSION['id_karyawan'];

			$riwayat_penilai 	= $this->m_penilaian->get_kar_grafik($id,$list_periode);
			foreach ($riwayat_penilai as $r)
			{
				$isi['riwayat_anda'] .= $r->PENILAIAN_TOTAL.',';
				$isi['list_periode_anda'] .= "'".$r->NAMA_PERIODE."',";
			}
		}

		$data_grafik = '';
		//mendapatkan id periode bulan terakhir
		$thn_kemarin = date("Y") - 1;
		$prd = $this->m_periode->get_periode($thn_kemarin);
		if (count($prd) > 0)
		{
			$id_periode_thn = $prd[0]->ID_PERIODE2;
			$riwayat_pegawai = $this->m_penilaian->get_peg_grafik($id,$id_periode_thn);
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

		$isi['nama_periode'] = date("Y") - 1;
		// $isi['bulan_periode'] = date("M");
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
