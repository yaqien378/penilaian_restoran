<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	/**
	 * laporan perkaryawan
	 */
	public function perkaryawan()
	{
		// $this->m_security->check();

		$isi['content']		='laporan/perkaryawan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small> Rapor Penilaian Perkaryawan</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Rapor Penilaian Perkaryawan';
		$isi['periode'] = $this->m_periode->get_all();
		$isi['karyawan'] = $this->m_karyawan->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	/**
	 * laporan keseluruhan
	 */
	public function keseluruhan()
	{
		// $this->m_security->check();

		$isi['content']		='laporan/keseluruhan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small> Rapor Penilaian Keseluruah</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Rapor Penilaian Keseluruhan';
		$isi['periode'] = $this->m_periode->get_all();
		$isi['outlet'] = $this->m_outlet->get_all();

		$this->load->view('tampilan_utama',$isi);
	}	

}
