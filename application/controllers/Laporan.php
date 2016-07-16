<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index()
    {
    	redirect('laporan/perkaryawan');
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
			$isi['outlet'] = $this->m_outlet->get_all();
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
			if (count($rekomendasi) > 0) {
				$isi['pelatihan'] = '';
				foreach ($rekomendasi as $r) {
					$isi['pelatihan'] .= $r->NAMA_PELATIHAN.", ";
				}
				$isi['pelatihan'] = substr_replace($isi['pelatihan'], '', -2,3);
			}else{
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

	public function cetak_perkaryawan($id_penilaian)
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);

		$data = $this->m_penilaian->get_id_for_laporan($id_penilaian)->result();
		$rekomendasi = $this->m_rekomendasi_pelatihan->cek_rekomendasi_pelatihan($id_penilaian)->result();

		if (count($rekomendasi) > 0) {
			$isi['pelatihan'] = '';
			foreach ($rekomendasi as $r) {
				$isi['pelatihan'] .= $r->NAMA_PELATIHAN.", ";
			}
			$isi['pelatihan'] = substr_replace($isi['pelatihan'], '', -2,3);
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
		$this->pdf->stream($fileName, array('Attachment'=>0));
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

		$id_outlet = $this->session->userdata('outlet');

		if ($id_outlet == '1') {
			$isi['outlet'] = $this->m_outlet->get_all();
		}

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
		$cek_outlet = $this->session->userdata('outlet');
		if ($cek_outlet == '1') {
			$outlet = $this->input->post('outlet');
		}

		if (!$periode) {
			redirect('laporan/keseluruhan');
		}

		$isi['id_outlet'] = $outlet;
		$isi['periode'] = $this->m_periode->get_id($periode)[0]->NAMA_PERIODE;
		$isi['id_periode'] = $periode;
		$penilaian = $this->m_penilaian->join_all(array('penilaian.ID_PERIODE2'=>$periode, 'karyawan.ID_OUTLET'=>$outlet));
		if ($penilaian) {
			$isi['penilaian'] = $penilaian;
		}
		$this->load->view('tampilan_utama',$isi);
	}


	public function cetak_keseluruhan($periode,$outlet='')
	{
		$this->m_security->check();
		$anti_level = array('3,4,5');
		$this->m_security->access($anti_level);

		if ($outlet == '') {
			$outlet = $this->session->userdata('outlet');
		}

		$penilaian = $this->m_penilaian->join_all(array('penilaian.ID_PERIODE2'=>$periode, 'karyawan.ID_OUTLET'=>$outlet));		
		$isi['penilaian'] 	= $penilaian;
		$isi['periode'] 	= $this->m_periode->get_id($periode)[0]->NAMA_PERIODE;

		$fileName 			= 'Laporan Keseluruhan';
		$this->pdf->load_view('laporan/cetak_keseluruhan',$isi);
		$this->pdf->render();
		$this->pdf->stream($fileName,array('Attachment'=>0));
	}

	public function get_karyawan()
	{
		$id_outlet = $this->input->post('outlet');

		echo '
			<div class="form-group">
				<label for="karyawan" class="control-label col-md-4">Nama karyawan </label>
				<div class="col-md-4">
					<select name="karyawan" id="karyawan" class="form-control" required>
						<option value="">-- Pilih Karyawan --</option>';
							$karyawan = $this->m_karyawan->get_by_outlet($id_outlet);
							foreach ($karyawan->result() as $karyawan) {
								echo "<option value='".$karyawan->ID_KARYAWAN."'>".ucfirst(strtolower($karyawan->NAMA_KARYAWAN))."</option>";
							}

					echo '
					</select>
				</div>
			</div>
		';


	}

}
