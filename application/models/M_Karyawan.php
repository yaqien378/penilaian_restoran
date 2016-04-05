<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Karyawan extends CI_Model {

	public function create($id,$nama,$status,$jabatan,$outlet,$jk,$user,$pass){
		return $this->db->insert(
			'karyawan',
			array(
				'ID_KARYAWAN' => $id,
				'ID_JABATAN' => $jabatan,
				'ID_OUTLET' => $outlet,
				'NAMA_KARYAWAN' => $nama,
				'STATUS_KARYAWAN' => $status,
				'JENIS_KELAMIN' => $jk,
				'USERNAME2' => $user,
				'PASSWORD' => md5($pass)
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan','jabatan.ID_JABATAN = karyawan.ID_JABATAN');
		$this->db->join('outlet','outlet.ID_OUTLET = karyawan.ID_OUTLET');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan','jabatan.ID_JABATAN = karyawan.ID_JABATAN');
		$this->db->join('outlet','outlet.ID_OUTLET = karyawan.ID_OUTLET');
		$this->db->where('ID_KARYAWAN',$id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
	public function get_by_outlet($outlet){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan','jabatan.ID_JABATAN = karyawan.ID_JABATAN');
		$this->db->join('outlet','outlet.ID_OUTLET = karyawan.ID_OUTLET');
		$this->db->where('karyawan.ID_OUTLET',$outlet);
		return $this->db->get();
	}
	public function update($id,$nama,$status,$jabatan,$outlet,$jk,$user,$pass){
		$this->db->where('ID_KARYAWAN',$id);
		return $this->db->update(
			'karyawan',
			array(
				'ID_JABATAN' => $jabatan,
				'ID_OUTLET' => $outlet,
				'NAMA_KARYAWAN' => $nama,
				'STATUS_KARYAWAN' => $status,
				'JENIS_KELAMIN' => $jk,
				'USERNAME2' => $user,
				'PASSWORD' => md5($pass)
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_KARYAWAN',$id);
		return $this->db->delete('karyawan');
	}
}
