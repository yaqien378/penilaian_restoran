<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Karyawan extends CI_Model {

	public function create($id,$nama,$status,$jabatan,$outlet,$jk,$pass){
		return $this->db->insert(
			'karyawan',
			array(
				'ID_KARYAWAN' => $id,
				'ID_JABATAN' => $jabatan,
				'ID_OUTLET' => $outlet,
				'NAMA_KARYAWAN' => $nama,
				'STATUS_KARYAWAN' => $status,
				'JENIS_KELAMIN' => $jk,
				'PASSWORD' => md5($pass)
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan','jabatan.ID_JABATAN = karyawan.ID_JABATAN');
		$this->db->join('outlet','outlet.ID_OUTLET = karyawan.ID_OUTLET');
		return $this->db->get();

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
	public function get_by_outlet_level($outlet,$level){

		//setting bawahan
		switch ($level) {
			case '1':
				$level = '2';
				break;
			case '2':
				$level = '3';
				break;
			case '3':
				$level = '4';
				break;
			case '5':
				$level = '5';
				break;
			default:
				$level = '5';
				break;
		}

		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan','jabatan.ID_JABATAN = karyawan.ID_JABATAN');
		$this->db->join('outlet','outlet.ID_OUTLET = karyawan.ID_OUTLET');
		$this->db->where('karyawan.ID_OUTLET',$outlet);
		$this->db->where('jabatan.LEVEL',$level);
		return $this->db->get();
	}
	public function update($id,$nama,$status,$jabatan,$outlet,$jk,$pass){
		$this->db->where('ID_KARYAWAN',$id);
		return $this->db->update(
			'karyawan',
			array(
				'ID_JABATAN' => $jabatan,
				'ID_OUTLET' => $outlet,
				'NAMA_KARYAWAN' => $nama,
				'STATUS_KARYAWAN' => $status,
				'JENIS_KELAMIN' => $jk,
				'PASSWORD' => md5($pass)
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_KARYAWAN',$id);
		return $this->db->delete('karyawan');
	}
}
