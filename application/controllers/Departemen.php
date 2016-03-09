<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='master/departemen';
		$isi['judul_menu']	='Master';
		$isi['judul']		='Master <small>Data Departemen</small>';
		$isi['breadcrumb1']	='Master';
		$isi['breadcrumb2']	='Departemen';

		$this->load->view('tampilan_utama',$isi);
	}
}
