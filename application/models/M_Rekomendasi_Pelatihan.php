<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Rekomendasi_Pelatihan extends CI_Model {

	public function create($id_penilaian,$id_pelatihan)
	{
		return $this->db->insert(
			'rekomendasi_pelatihan',
			array(
				'ID_PENILAIAN' => $id_penilaian,
				'ID_PELATIHAN' => $id_pelatihan
			)
		);
	}



	public function cek_rekomendasi_pelatihan($id_penilaian)
	{
		return $this->db->query('
			SELECT
				*
			FROM
				rekomendasi_pelatihan
			INNER JOIN pelatihan ON rekomendasi_pelatihan.ID_PELATIHAN = pelatihan.ID_PELATIHAN
			INNER JOIN penilaian ON penilaian.ID_PENILAIAN = rekomendasi_pelatihan.ID_PENILAIAN
			INNER JOIN karyawan AS dinilai ON dinilai.ID_KARYAWAN = penilaian.KAR_ID_KARYAWAN
			WHERE
				rekomendasi_pelatihan.ID_PENILAIAN = "'.$id_penilaian.'"
		');
	}

	public function get_by_outlet_periode($id_outlet,$periode)
	{
		return $this->db->query('
			SELECT *
			FROM
				rekomendasi_pelatihan
			INNER JOIN pelatihan ON rekomendasi_pelatihan.ID_PELATIHAN = pelatihan.ID_PELATIHAN
			INNER JOIN penilaian ON penilaian.ID_PENILAIAN = rekomendasi_pelatihan.ID_PENILAIAN
			INNER JOIN karyawan AS dinilai ON dinilai.ID_KARYAWAN = penilaian.KAR_ID_KARYAWAN
			INNER JOIN jabatan ON jabatan.ID_JABATAN = dinilai.ID_JABATAN
			WHERE
				dinilai.ID_OUTLET = "'.$id_outlet.'"AND
				penilaian.ID_PERIODE2 = "'.$periode.'"			
		');
	}
}
