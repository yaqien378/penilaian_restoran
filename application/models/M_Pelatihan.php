<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pelatihan extends CI_Model {

	public function create($id,$kategori,$nama,$ket){
		return $this->db->insert(
			'pelatihan',
			array(
				'ID_PELATIHAN' => $id,
				'ID_KATEGORI' => $kategori,
				'NAMA_PELATIHAN' => $nama,
				'KETERANGAN_PELATIHAN' => $ket
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->join('kategori_pelatihan','kategori_pelatihan.ID_KATEGORI = pelatihan.ID_KATEGORI');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->join('kategori_pelatihan','kategori_pelatihan.ID_KATEGORI = pelatihan.ID_KATEGORI');
		$this->db->where('ID_PELATIHAN',$id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}

	public function get_by_not_list($id)
	{
		return $this->db->query('SELECT * FROM pelatihan WHERE ID_PELATIHAN NOT IN ('.$id.') ')->result();
	}

	public function update($id,$kategori,$nama,$ket){
		$this->db->where('ID_PELATIHAN',$id);
		return $this->db->update(
			'pelatihan',
			array(
				'ID_KATEGORI' => $kategori,
				'NAMA_PELATIHAN' => $nama,
				'KETERANGAN_PELATIHAN' => $ket
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_PELATIHAN',$id);
		return $this->db->delete('pelatihan');
	}
}
