<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }

	/**
	 * laporan perkaryawan
	 */
	public function perkaryawan()
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);

		$isi['content']		='laporan/perkaryawan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small> Rapor Penilaian Perkaryawan</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Rapor Penilaian Perkaryawan';
		$isi['periode'] = $this->m_periode->get_all();
		$id_outlet = $this->session->userdata('outlet');
		if ($id_outlet == '1') {
			$isi['karyawan'] = $this->m_karyawan->get_all();
		}else{
			$isi['karyawan'] = $this->m_karyawan->get_by_outlet($id_outlet);
		}

		$this->load->view('tampilan_utama',$isi);
	}

	public function view_perkaryawan()
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);

		$isi['content']		='laporan/view_perkaryawan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small> Rapor Penilaian Perkaryawan</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Rapor Penilaian Perkaryawan';
		$isi['breadcrumb3']	='view';

		$periode = $this->input->post('periode');
		$karyawan = $this->input->post('karyawan');
		$query = $this->m_kriteria_penilaian_kar->get_by_karyawan_and_periode($karyawan,$periode);

		$isi['periode'] = $this->m_periode->get_id($periode)[0]->NAMA_PERIODE;

		if (isset($query)) {
			$id_penilaian = $this->m_penilaian->get_by_karyawan_periode($karyawan,$periode)->result()[0]->ID_PENILAIAN;
			$data = $this->m_penilaian->get_id_for_laporan($id_penilaian)->result();
			$rekomendasi = $this->m_rekomendasi_pelatihan->cek_rekomendasi_pelatihan($id_penilaian)->result();
			if ($rekomendasi) {
				$isi['id_pelatihan'] = $rekomendasi[0]->ID_PELATIHAN;
				$isi['pelatihan'] = $rekomendasi[0]->NAMA_PELATIHAN;
			}else{
				$isi['id_pelatihan'] = '';
				$isi['pelatihan'] = '';
			}
			$isi['id_penilaian'] = $id_penilaian;
			$isi['nama'] = $data[0]->KARYAWAN_DINILAI;
			$isi['nik'] = $data[0]->NIK;
			$isi['jabatan'] = $data[0]->JABATAN;
			$isi['penilai'] = $data[0]->PENILAI;
			$isi['nilai_total'] = $data[0]->PENILAIAN_TOTAL;
			$isi['kriteria_penilaian'] = $query->result();
		}else{
			$isi['id_penilaian'] = '';
			$isi['id_pelatihan'] = '';
			$isi['nama'] = '';
			$isi['nik'] = '';
			$isi['jabatan'] = '';
			$isi['penilai'] = '';
			$isi['kriteria_penilaian'] = null;	
			$isi['pelatihan'] = '';	
			$isi['nilai_total'] = '';	
		}
		$this->load->view('tampilan_utama',$isi);
	}

	public function cetak_perkaryawan($id_penilaian,$id_pelatihan='')
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);

		$data = $this->m_penilaian->get_id_for_laporan($id_penilaian)->result();
		$rekomendasi = $this->m_rekomendasi_pelatihan->cek_rekomendasi_pelatihan($id_penilaian)->result();

		if ($rekomendasi) {
			$isi['pelatihan'] = $rekomendasi[0]->NAMA_PELATIHAN;
		}else{
			$isi['pelatihan'] = '';
		}
		$isi['nama'] = $data[0]->KARYAWAN_DINILAI;
		$isi['nik'] = $data[0]->NIK;
		$isi['jabatan'] = $data[0]->JABATAN;
		$isi['penilai'] = $data[0]->PENILAI;
		$isi['nilai_total'] = $data[0]->PENILAIAN_TOTAL;
		$isi['periode'] = $this->m_periode->get_id($data[0]->ID_PERIODE2)[0]->NAMA_PERIODE;

		$query = $this->m_kriteria_penilaian_kar->get_by_karyawan_and_periode($data[0]->KAR_ID_KARYAWAN,$data[0]->ID_PERIODE2);
		$isi['kriteria_penilaian'] = $query->result();

		$fileName = 'Hasil Penilaian '.ucfirst(strtolower($data[0]->KARYAWAN_DINILAI));

		$this->pdf->load_view('laporan/cetak_perkaryawan',$isi);
		$this->pdf->render();
		$this->pdf->stream($fileName);
	}

	/**
	 * laporan keseluruhan
	 */
	public function keseluruhan()
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);


		$isi['content']		='laporan/keseluruhan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small> Rapor Penilaian Keseluruah</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Rapor Penilaian Keseluruhan';
		$isi['periode'] = $this->m_periode->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function view_keseluruhan()	
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);


		$isi['content']		='laporan/view_keseluruhan';
		$isi['judul_menu']	='Laporan';
		$isi['judul']		='Laporan <small> Rapor Penilaian Keseluruhan</small>';
		$isi['breadcrumb1']	='Laporan';
		$isi['breadcrumb2']	='Rapor Penilaian Keseluruhan';
		$isi['breadcrumb3']	='view';


		$periode = $this->input->post('periode');
		$outlet = $this->session->userdata('outlet');
		if (!$periode) {
			redirect('laporan/keseluruhan');
		}

		$isi['periode'] = $this->m_periode->get_id($periode)[0]->NAMA_PERIODE;
		$isi['id_periode'] = $periode;
		//mendapatkan data yang akan di tampilkan
		$penilaian = $this->m_rekomendasi_pelatihan->get_by_outlet_periode($outlet,$periode)->result();

		if ($penilaian) {
			$isi['penilaian'] = $penilaian;
		}
		$this->load->view('tampilan_utama',$isi);


	}


	public function cetak_keseluruhan($periode)
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);

		$outlet = $this->session->userdata('outlet');

		$isi['periode'] = $this->m_periode->get_id($periode)[0]->NAMA_PERIODE;
		$penilaian = $this->m_rekomendasi_pelatihan->get_by_outlet_periode($outlet,$periode)->result();		
		
		$isi['penilaian'] = $penilaian;

		$fileName = 'Laporan Keseluruhan';

		$this->pdf->load_view('laporan/cetak_keseluruhan',$isi);
		$this->pdf->render();
		$this->pdf->stream($fileName);
	}


}
