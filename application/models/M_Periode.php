<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Periode extends CI_Model {

	public function create($id,$nama,$awal,$akhir,$keterangan){
		return $this->db->insert(
			'periode_kehadiran_dan_penilaian',
			array(
				'ID_PERIODE2' => $id,
				'NAMA_PERIODE' => $nama,
				'AWAL' => $awal,
				'AKHIR' => $akhir,
				'KETERANGAN' => $keterangan
			)
		);
	}
	public function get_all(){
		$this->db->select('*');
		$this->db->from('periode_kehadiran_dan_penilaian');
		return $this->db->get()->result();

	}
	public function get_id($id){
		$this->db->select('*');
		$this->db->from('periode_kehadiran_dan_penilaian');
		$this->db->where('ID_PERIODE2',$id);
		$this->db->limit(1);
		return $this->db->get()->result();


	}
	public function update($id,$nama,$awal,$akhir,$keterangan){		
		$this->db->where('ID_PERIODE2',$id);
		return $this->db->update(
			'periode_kehadiran_dan_penilaian',
			array(
				'NAMA_PERIODE' => $nama,
				'AWAL' => $awal,
				'AKHIR' => $akhir,
				'KETERANGAN' => $keterangan
			)
		);
	}
	public function delete($id){
		$this->db->where('ID_PERIODE2',$id);
		return $this->db->delete('periode_kehadiran_dan_penilaian');
	}
}
