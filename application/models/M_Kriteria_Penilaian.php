<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kriteria_Penilaian extends CI_Model {

	public function create($id_pelatihan,$id_kriteria){
		return $this->db->insert(
			'kriteria_penilaian',
			array(
				'ID_PELATIHAN' => $id_pelatihan,
				'ID_KRITERIA' => $id_kriteria
			)
		);
	}
	public function get_all()		
	{
		return $this->db->get('kriteria_penilaian')->result();
	}

	public function get_by_pelatihan($id){
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		$this->db->join('kriteria','kriteria.ID_KRITERIA = kriteria_penilaian.ID_KRITERIA');
		$this->db->where('kriteria_penilaian.ID_PELATIHAN',$id);
		return $this->db->get()->result();
	}

	public function get_by_pelatihan_all(){
		$this->db->select('kriteria_penilaian.ID_PELATIHAN');
		$this->db->distinct();
		$this->db->select('NAMA_PELATIHAN');
		$this->db->from('kriteria_penilaian');
		$this->db->join('pelatihan','pelatihan.ID_PELATIHAN = kriteria_penilaian.ID_PELATIHAN');
		return $this->db->get()->result();
	}

	public function get_where(array $cond = null)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		if (count($cond) > 0)
			$this->db->where($cond);
		return $this->db->get()->result();
	}
	
	public function get_kriteria($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		$this->db->join('kriteria','kriteria.ID_KRITERIA = kriteria_penilaian.ID_KRITERIA');
		$this->db->where_not_in('kriteria_penilaian.ID_KRITERIA',$id);
		return $this->db->get()->result();
	}

	public function delete($id){
		$this->db->where('ID_PELATIHAN',$id);
		return $this->db->delete('kriteria_penilaian');
	}
}
