<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Outlet extends CI_Model {

	public function create($id,$nama){
		return $this->db->insert(
			'outlet',
			array(
				'ID_OUTLET' => $id,
				'NAMA_OUTLET' => $nama
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('outlet');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('outlet');
		$this->db->where('ID_OUTLET',$id);
		$this->db->limit(1);
		return $this->db->get()->result();


	}
	public function update($id,$nama){
		$this->db->where('ID_OUTLET',$id);
		return $this->db->update(
			'outlet',
			array(
				'NAMA_OUTLET' => $nama
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_OUTLET',$id);
		return $this->db->delete('outlet');
	}
}
