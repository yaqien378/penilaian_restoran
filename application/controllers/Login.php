<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Setting Login
	 */
	public function index()
	{
		$this->load->view('login');
	}
	
	public function GetLogin()
	{
		redirect('dashboard');
	}
}
