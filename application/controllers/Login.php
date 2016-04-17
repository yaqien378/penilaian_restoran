<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Setting Login
	 */
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('login');
	}
	
	public function auth()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$query = $this->m_user->auth($user,$pass);

		if(count($query) > 0){
			$user = $this->m_user->get_user($query[0]->ID_KARYAWAN);
			$session_data = array(
				'id_karyawan' => $user[0]->ID_KARYAWAN,
				'nama' => $user[0]->NAMA_KARYAWAN,
				'level' => $user[0]->LEVEL,
				'outlet' => $user[0]->ID_OUTLET,
			);

			$this->session->set_userdata($session_data);
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('pesan','Login gagal !');
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}	
}
