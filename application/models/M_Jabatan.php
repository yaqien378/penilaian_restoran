<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jabatan extends CI_Model {

	public function create($id,$nama,$golongan,$akses,$level){
		return $this->db->insert(
			'jabatan',
			array(
				'ID_JABATAN' => $id,
				'NAMA_JABATAN' => $nama,
				'GOLONGAN' => $golongan,
				'AKSES' => $akses,
				'LEVEL' => $level
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('jabatan');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('jabatan');
		$this->db->where('ID_JABATAN',$id);
		$this->db->limit(1);
		return $this->db->get()->result();


	}
	public function update($id,$nama,$golongan,$akses,$level){
		$this->db->where('ID_JABATAN',$id);
		return $this->db->update(
			'jabatan',
			array(
				'NAMA_JABATAN' => $nama,
				'GOLONGAN' => $golongan,
				'AKSES' => $akses,
				'LEVEL' => $level
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_JABATAN',$id);
		return $this->db->delete('jabatan');
	}
}
