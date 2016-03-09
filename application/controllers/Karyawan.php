<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='master/karyawan';
		$isi['judul_menu']	='Master';
		$isi['judul']		='Master <small>Data Karyawan</small>';
		$isi['breadcrumb1']	='Master';
		$isi['breadcrumb2']	='Karyawan';

		$this->load->view('tampilan_utama',$isi);
	}
}
