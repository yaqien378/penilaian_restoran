<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$isi['content']		='master/kriteria';
		$isi['judul_menu']	='Master';
		$isi['judul']		='Master <small>Data Kriteria</small>';
		$isi['breadcrumb1']	='Master';
		$isi['breadcrumb2']	='Kriteria';

		$this->load->view('tampilan_utama',$isi);
	}
}
