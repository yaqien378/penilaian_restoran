<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kehadiran extends CI_Model {

	public function create($id,$periode,$karyawan,$terlambat,$absen,$sakit){
		return $this->db->insert(
			'kehadiran',
			array(
				'ID_KEHADIRAN' => $id,
				'ID_PERIODE2' => $periode,
				'ID_KARYAWAN' => $karyawan,
				'TERLAMBAT' => $terlambat,
				'ABSEN' => $absen,
				'SAKIT' => $sakit
			)
		);
	}

	public function update($id,$periode,$karyawan,$terlambat,$absen,$sakit){
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
	
	public function cek_kehadiran($karyawan,$periode){
		$query = $this->db->query("
			SELECT *
			FROM
				kehadiran
			INNER JOIN periode_kehadiran_dan_penilaian ON kehadiran.ID_PERIODE2 = periode_kehadiran_dan_penilaian.ID_PERIODE2
			INNER JOIN karyawan ON kehadiran.ID_KARYAWAN = karyawan.ID_KARYAWAN
			WHERE
				kehadiran.ID_PERIODE2 = '".$periode."' AND
				kehadiran.ID_KARYAWAN = '".$karyawan."'
		");
		return $query;
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
	}

}
