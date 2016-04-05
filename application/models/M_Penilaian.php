<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Penilaian extends CI_Model {

	public function cek_penilaian($kar_id_karyawan){
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->join('karyawan','karyawan.ID_KARYAWAN = penilaian.KAR_ID_KARYAWAN');
		$this->db->where('KAR_ID_KARYAWAN',$kar_id_karyawan);
		$this->db->limit(1);
		return $this->db->get();
	}

	public function create($id,$periode,$karyawan,$kar,$ket,$nilai){
		return $this->db->insert(
			'penilaian',
			array(
				'ID_PENILAIAN' => $id,
				'ID_PERIODE2' => $periode,
				'ID_KARYAWAN' => $karyawan,
				'KAR_ID_KARYAWAN' => $kar,
				'KETERANGAN_PENILAIAN' => $ket,
				'PENILAIAN_TOTAL' => $nilai
			)
		);
	}

/*	public function update($id,$periode,$karyawan,$terlambat,$absen,$sakit){
		$this->db->where('ID_KEHADIRAN',$id);
		return $this->db->update(
			'kehadiran',
			array(
				'ID_PERIODE2' => $periode,
				'ID_KARYAWAN' => $karyawan,
				'TERLAMBAT' => $terlambat,
				'ABSEN' => $absen,
				'SAKIT' => $sakit
			)
		);
	}

	public function cek_kehadiran_id($id){
		$query = $this->db->query("
			SELECT *
			FROM
				kehadiran
			INNER JOIN periode_kehadiran_dan_penilaian ON kehadiran.ID_PERIODE2 = periode_kehadiran_dan_penilaian.ID_PERIODE2
			INNER JOIN karyawan ON kehadiran.ID_KARYAWAN = karyawan.ID_KARYAWAN
			WHERE
				kehadiran.ID_KEHADIRAN = '".$id."'
		");
		return $query;
	}*/

}
