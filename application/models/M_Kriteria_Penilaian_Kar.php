<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Kriteria_Penilaian_Kar extends CI_Model {

	public function create($kriteria,$penilaian,$nilai,$dasar)
	{
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

	public function get_by_karyawan_and_periode($karyawan,$periode)
	{
		// mendatapkan id_penilaian berdasarkan id_karyawan dan id_periode ->table penilaian
			$penilaian = $this->m_penilaian->get_by_karyawan_periode($karyawan,$periode)->result();

			if ($penilaian != null) {
				$id_penilaian = $penilaian[0]->ID_PENILAIAN;
				// mendapatkan kriteria berdasarkan id_penilaian ->table M_Kriteria_Penilaian_Kar join penilaian, kriteria
					$this->db->select('*');
					$this->db->from('kriteria_penilaian_karyawan');
					$this->db->Join('kriteria','kriteria_penilaian_karyawan.ID_KRITERIA = kriteria.ID_KRITERIA');
					$this->db->Join('penilaian','penilaian.ID_PENILAIAN = kriteria_penilaian_karyawan.ID_PENILAIAN');
					$this->db->where('penilaian.ID_PENILAIAN',$id_penilaian);

					return $this->db->get();
			}else{
				return null;
			}

			// return $id_penilaian;
			// return $penilaian;
	}

	public function get_by_penilaian($id_penilaian)
	{
		return $this->db->query('
			SELECT
				*
			FROM
				kriteria_penilaian_karyawan
			INNER JOIN penilaian ON penilaian.ID_PENILAIAN = kriteria_penilaian_karyawan.ID_PENILAIAN
			INNER JOIN kriteria ON kriteria_penilaian_karyawan.ID_KRITERIA = kriteria.ID_KRITERIA
			INNER JOIN karyawan AS dinilai ON dinilai.ID_KARYAWAN = penilaian.KAR_ID_KARYAWAN
			WHERE
				kriteria_penilaian_karyawan.ID_PENILAIAN = "'.$id_penilaian.'"
		');
	}
}
