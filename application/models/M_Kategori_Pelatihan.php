<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kategori_Pelatihan extends CI_Model {

	public function create($id,$nama){
		return $this->db->insert(
			'kategori_pelatihan',
			array(
				'ID_KATEGORI' => $id,
				'NAMA_KATEGORI' => $nama
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('kategori_pelatihan');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('kategori_pelatihan');
		$this->db->where('ID_KATEGORI',$id);
		$this->db->limit(1);
		return $this->db->get()->result();


	}
	public function update($id,$nama){
		$this->db->where('ID_KATEGORI',$id);
		return $this->db->update(
			'kategori_pelatihan',
			array(
				'NAMA_KATEGORI' => $nama
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_KATEGORI',$id);
		return $this->db->delete('kategori_pelatihan');
	}
}
