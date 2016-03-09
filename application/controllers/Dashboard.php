<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='dashboard/dashboard';
		$isi['judul_menu']	='Dashboard';
		$isi['judul']		='Dashboard <small>laporan statistik</small>';
		$isi['breadcrumb1']	='Dashboard';
		$isi['breadcrumb2']	='';

		$this->load->view('tampilan_utama',$isi);
	}
}
