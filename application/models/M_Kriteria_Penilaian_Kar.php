<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kriteria_Penilaian_Kar extends CI_Model {

	public function create($kriteria,$penilaian,$nilai,$dasar){
		return $this->db->insert(
			'kriteria_penilaian_karyawan',
			array(
				'ID_KRITERIA' => $kriteria,
				'ID_PENILAIAN' => $penilaian,
				'NILAI' => $nilai,
				'DASAR_PENILAIAN' => $dasar
			)
		);
	}
}
