<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kriteria extends CI_Model {

	public function create($id,$nama,$bobot,$min_nilai){
		return $this->db->insert(
			'kriteria',
			array(
				'ID_KRITERIA' => $id,
				'NAMA_KRITERIA' => $nama,
				'BOBOT' => $bobot,
				'MIN_NILAI' => $min_nilai
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('kriteria');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where('ID_KRITERIA',$id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
	public function get_bobot_total(){
		$this->db->select_sum('BOBOT','BOBOT_TOTAL');
		$this->db->from('kriteria');
		return $this->db->get();
	}
	public function update($id,$nama,$bobot,$min_nilai){		
		$this->db->where('ID_KRITERIA',$id);
		return $this->db->update(
			'kriteria',
			array(
				'NAMA_KRITERIA' => $nama,
				'BOBOT' => $bobot,
				'MIN_NILAI' => $min_nilai
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_KRITERIA',$id);
		return $this->db->delete('kriteria');
	}

	public function get_kriteria($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where_not_in('kriteria.ID_KRITERIA',$id);
		return $this->db->get()->result();
	}

	public function get_by_nama($nama)
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where('kriteria.NAMA_KRITERIA',$nama);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
}
