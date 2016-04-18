<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends CI_Model {

	public function auth($user,$pass){
		return $this->db->get_where(
			'karyawan',
			array(
				'ID_KARYAWAN' => $user,
				'PASSWORD' => md5($pass)
			),
			1
		)->result();
	}

	public function get_user($id){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan','jabatan.ID_JABATAN = karyawan.ID_JABATAN');
		$this->db->where('ID_KARYAWAN', $id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
}
