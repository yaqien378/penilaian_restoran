<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Range_Kriteria extends CI_Model {

	public function create($id,$nilai,$deskripsi){
		return $this->db->insert(
			'range_kriteria',
			array(
				'ID_RANGE_KRITERIA' => $id,
				'NILAI_RANGE_KRITERIA' => $nilai,
				'DESKRIPSI_KRITERIA' => $deskripsi
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('range_kriteria');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('range_kriteria');
		$this->db->where('ID_RANGE_KRITERIA',$id);
		$this->db->limit(1);
		return $this->db->get()->result();


	}
	public function update($id,$nilai,$deskripsi){		
		$this->db->where('ID_RANGE_KRITERIA',$id);
		return $this->db->update(
			'range_kriteria',
			array(
				'NILAI_RANGE_KRITERIA' => $nilai,
				'DESKRIPSI_KRITERIA' => $deskripsi
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_RANGE_KRITERIA',$id);
		return $this->db->delete('range_kriteria');
	}
}
