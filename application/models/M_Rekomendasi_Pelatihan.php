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

	public function distinc_kategori($id_penilaian)
	{
		return $this->db->query('
			SELECT DISTINCT
				pelatihan.ID_KATEGORI,
				pelatihan.NAMA_PELATIHAN
			FROM
				rekomendasi_pelatihan
			INNER JOIN pelatihan ON rekomendasi_pelatihan.ID_PELATIHAN = pelatihan.ID_PELATIHAN
			INNER JOIN penilaian ON penilaian.ID_PENILAIAN = rekomendasi_pelatihan.ID_PENILAIAN
			INNER JOIN karyawan AS dinilai ON dinilai.ID_KARYAWAN = penilaian.KAR_ID_KARYAWAN
			WHERE
				rekomendasi_pelatihan.ID_PENILAIAN = "'.$id_penilaian.'"
		');
	}

	public function pelatihan_by_kategori($id_penilaian,$id_kategori)
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
				rekomendasi_pelatihan.ID_PENILAIAN = '.$id_penilaian.'
				AND
				pelatihan.ID_KATEGORI = '.$id_kategori.'
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
				dinilai.ID_OUTLET = "'.$id_outlet.'" AND
				penilaian.ID_PERIODE2 = "'.$periode.'"			
		');
	}

	public function cek($id_penilaian,$id_pelatihan)
	{
		$this->db->select('*');
		$this->db->from('rekomendasi_pelatihan');
		$this->db->where('ID_PENILAIAN',$id_penilaian);
		$this->db->where('ID_PELATIHAN',$id_pelatihan);
		return $this->db->get()->result();
	}

	public function join_all(array $cond = null)
	{
		return $this->db->select('*')
				->from('rekomendasi_pelatihan')
				->join('pelatihan','pelatihan.ID_PELATIHAN = rekomendasi_pelatihan.ID_PELATIHAN')
				->where($cond)
				->get()
				->result();
	}	

	// public function cek_by_pelatihan()
	// {
	// 	return $this->db->select('*')
	// 			->from('rekomendasi_pelatihan')
	// 			->join('pelatihan','pelatihan.ID_PELATIHAN = rekomendasi_pelatihan.ID_PELATIHAN')
	// 			->where($cond)
	// 			->get()
	// 			->result();
	// }
}
