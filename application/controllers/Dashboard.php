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
		// $this->m_security->check();

		$isi['content']		='dashboard/dashboard';
		$isi['judul_menu']	='Dashboard';
		$isi['judul']		='Dashboard <small>laporan statistik</small>';
		$isi['breadcrumb1']	='Dashboard';
		$isi['breadcrumb2']	='';

		$this->load->view('tampilan_utama',$isi);
	}
}
