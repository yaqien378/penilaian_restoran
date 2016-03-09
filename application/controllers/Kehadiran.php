<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='master/kehadiran';
		$isi['judul_menu']	='Master';
		$isi['judul']		='Master <small>Rekap Data Kehadiran</small>';
		$isi['breadcrumb1']	='Master';
		$isi['breadcrumb2']	='Kehadiran';

		$this->load->view('tampilan_utama',$isi);
	}
}
