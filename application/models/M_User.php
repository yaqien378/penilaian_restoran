<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	public function auth($user,$pass){
		return $this->db->get_where(
			'karyawan',
			array(
				'username2' => $user,
				'password' => md5($pass)
			),
			1
		)->result();
	}

	public function get_user($id){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->where('ID_KARYAWAN', $id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
}
