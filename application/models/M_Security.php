<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Security extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function check()
	{
		$nip = $this->session->userdata('id_karyawan');
		if(empty($nip)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	
	public function gen_id($tabel,$kolom)
	{
		$this->db->select_max($kolom,'id');
		$data = $this->db->get($tabel)->result();

		return ($data[0]->id + 1);
	}
}
