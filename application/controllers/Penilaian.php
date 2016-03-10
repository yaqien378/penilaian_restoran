<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='laporan/all';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small>Data Keseluruhan</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Keseluruhan';

		$this->load->view('tampilan_utama',$isi);
	}

	public function perkaryawan()
	{
		$isi['content']		='laporan/perkaryawan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small>Data per Karyawan</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Karyawan';

		$this->load->view('tampilan_utama',$isi);
	}
}
