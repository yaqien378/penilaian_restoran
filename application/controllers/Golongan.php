<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='master/golongan';
		$isi['judul_menu']	='Master';
		$isi['judul']		='Master <small>Data Golongan</small>';
		$isi['breadcrumb1']	='Master';
		$isi['breadcrumb2']	='Golongan';

		$this->load->view('tampilan_utama',$isi);
	}
}
