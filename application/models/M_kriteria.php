<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kriteria extends CI_Model {

	public function create($id,$range,$nama,$bobot){
		return $this->db->insert(
			'kriteria',
			array(
				'ID_KRITERIA' => $id,
				'ID_RANGE_KRITERIA' => $range,
				'NAMA_KRITERIA' => $nama,
				'BOBOT' => $bobot
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->join('range_kriteria','range_kriteria.ID_RANGE_KRITERIA = kriteria.ID_RANGE_KRITERIA');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->join('range_kriteria','range_kriteria.ID_RANGE_KRITERIA = kriteria.ID_RANGE_KRITERIA');
		$this->db->where('ID_KRITERIA',$id);
		$this->db->limit(1);
		return $this->db->get()->result();


	}
	public function update($id,$range,$nama,$bobot){		
		$this->db->where('ID_KRITERIA',$id);
		return $this->db->update(
			'kriteria',
			array(
				'ID_RANGE_KRITERIA' => $range,
				'NAMA_KRITERIA' => $nama,
				'BOBOT' => $bobot
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_KRITERIA',$id);
		return $this->db->delete('kriteria');
	}
}
