<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	/**
	 * Master outlet
	 */
	public function outlet()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);

		$isi['content']		='master/outlet';
		$isi['judul_menu']	='Maintenance Master';
		$isi['judul']		='Maintenance Master <small>Data Outlet</small>';
		$isi['breadcrumb1']	='Maintenance Master';
		$isi['breadcrumb2']	='Outlet';
		$isi['outlet'] = $this->m_outlet->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function outlet_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_outlet->create($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/outlet');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_outlet->update($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/outlet');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_outlet->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('outlet','ID_OUTLET');
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Outlet</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/outlet_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Jabatan</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Jabatan' id='nama' name='nama' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_outlet->get_id($id);
			foreach ($query as $row) {
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Ubah Data Outlet</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/outlet_act/ubah'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Jabatan</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Jabatan' id='nama' name='nama' value='".$row->NAMA_OUTLET."' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";
			}
		}else{
			redirect('master/outlet');
		}
	}
	
	/**
	 * Master Jabatan
	 */
	public function jabatan()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);

		$isi['content']		='master/jabatan';
		$isi['judul_menu']	='Maintenance Master';
		$isi['judul']		='Maintenance Master <small>Data Jabatan</small>';
		$isi['breadcrumb1']	='Maintenance Master';
		$isi['breadcrumb2']	='Jabatan';
		$isi['jabatan'] = $this->m_jabatan->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function jabatan_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$atasan = $this->input->post('atasan');
			$nama = strtoupper($this->input->post('nama'));
			$golongan = strtoupper($this->input->post('golongan'));
			$akses = strtoupper($this->input->post('akses'));
			$level = strtoupper($this->input->post('level'));

			$query = $this->m_jabatan->create($id,$atasan,$nama,$golongan,$akses,$level);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/jabatan');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$atasan = $this->input->post('atasan');
			$nama = strtoupper($this->input->post('nama'));
			$golongan = strtoupper($this->input->post('golongan'));
			$akses = strtoupper($this->input->post('akses'));
			$level = strtoupper($this->input->post('level'));

			$query = $this->m_jabatan->update($id,$atasan,$nama,$golongan,$akses,$level);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/jabatan');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_jabatan->delete($id);

		}else if($act == 'tambah'){
			$id 	= $this->m_security->gen_id('jabatan','ID_JABATAN');
			$atasan = $this->m_jabatan->get_all();
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Jabatan</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/jabatan_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Jabatan</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Jabatan' id='nama' name='nama' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Golongan</label>
						<div class='col-md-9'>
							<input type='text' class='form-control' placeholder='Golongan' id='golongan' name='golongan' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Akses</label>
						<div class='col-md-9'>
							<select name='akses' id='akses' class='form-control' required>
								<option value=''>-- Pilih Status --</option>
								<option value='OWNER'>Owner</option>
								<option value='RESTORAN MANAGER'>Restoran manager</option>
								<option value='ASSISTEN RESTORAN MANAGER'>assisten restoran manager</option>
								<option value='SHIFT LEADER'>Shift leader</option>
								<option value='CREW'>Crew</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Level</label>
						<div class='col-md-9'>
							<select name='level' id='level' class='form-control' required>
								<option value=''>-- Pilih Jenis --</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Atasan</label>
						<div class='col-md-9'>
							<select name='atasan' id='atasan' class='form-control' required>
								<option value=''>-- Pilih Atasan --</option>";
								foreach ($atasan as $atasan) {
									echo "<option value='".$atasan->ID_JABATAN."'>".$atasan->NAMA_JABATAN."</option>";
								}
							echo "
							</select>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_jabatan->get_id($id);
			$atasan = $this->m_jabatan->get_all();
			foreach ($query as $row) {
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Ubah Data Jabatan</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/jabatan_act/ubah'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Jabatan</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Jabatan' id='nama' name='nama' value='".ucfirst(strtolower($row->NAMA_JABATAN))."' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Golongan</label>
						<div class='col-md-9'>
							<input type='text' class='form-control' placeholder='Golongan' id='golongan' name='golongan' value='".ucfirst(strtolower($row->GOLONGAN))."' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Akses</label>
						<div class='col-md-9'>
							<select name='akses' id='akses' class='form-control' required>
								<option value='".strtolower($row->AKSES)."' selected>".ucfirst(strtolower($row->AKSES))."</option>
								<option value='administrator'>Administrator</option>
								<option value='user'>User</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Level</label>
						<div class='col-md-9'>
							<select name='level' id='level' class='form-control' required>
								<option value='".strtolower($row->LEVEL)."' selected>".ucfirst(strtolower($row->LEVEL))."</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Atasan</label>
						<div class='col-md-9'>
							<select name='atasan' id='atasan' class='form-control' required>
								<option value='".$row->ID_JABATAN_ATASAN."' selected>".ucfirst(strtolower($row->NAMA_JABATAN))."</option>";
								foreach ($atasan as $atasan) {
									echo "<option value='".$atasan->ID_JABATAN."'>".$atasan->NAMA_JABATAN."</option>";
								}
							echo "
							</select>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";
			}
		}else{
			redirect('master/jabatan');
		}
	}
	
	/**
	 * Master Karyawan
	 */
	public function karyawan()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);

		$level = $this->session->userdata('level');

		$isi['content']		='master/karyawan';
		$isi['judul_menu']	='Maintenance Master';
		$isi['judul']		='Maintenance Master <small>Data Karyawan</small>';
		$isi['breadcrumb1']	='Maintenance Master';
		$isi['breadcrumb2']	='Karyawan';

		if ($level == '1') {
			$isi['karyawan'] = $this->m_karyawan->get_all();
		}else{
			$outlet = $this->session->userdata('outlet');
			$isi['karyawan'] = $this->m_karyawan->get_by_outlet($outlet);
		}

		$this->load->view('tampilan_utama',$isi);
	}

	public function karyawan_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));
			$status = strtoupper($this->input->post('status'));
			$jabatan = strtoupper($this->input->post('jabatan'));
			$outlet = strtoupper($this->input->post('outlet'));
			$jk = strtoupper($this->input->post('jk'));
			$pass = $this->input->post('id');

			$query = $this->m_karyawan->create($id,$nama,$status,$jabatan,$outlet,$jk,$pass);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/karyawan');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));
			$status = strtoupper($this->input->post('status'));
			$jabatan = strtoupper($this->input->post('jabatan'));
			$outlet = strtoupper($this->input->post('outlet'));
			$jk = strtoupper($this->input->post('jk'));

			$query = $this->m_karyawan->update($id,$nama,$status,$jabatan,$outlet,$jk);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/karyawan');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_karyawan->delete($id);

		}else if($act == 'tambah'){
			// $id = $this->m_security->gen_id('karyawan','ID_KARYAWAN');
			$jabatan = $this->m_jabatan->get_all();
			$outlet = $this->m_outlet->get_all();
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Karyawan</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/karyawan_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>ID Karyawan</label>
						<div class='col-md-9'>
							<input type='text' class='form-control' placeholder='ID' id='id' name='id' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Karyawan</label>
						<div class='col-md-9'>
							<input type='text' class='form-control' placeholder='Nama Karyawan' id='nama' name='nama' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Status Karyawan</label>
						<div class='col-md-9'>
							<select name='status' id='status' class='form-control' required>
								<option value=''>-- Pilih Status --</option>
								<option value='Owner'>Owner</option>
								<option value='tetap'>Tetap</option>
								<option value='kontrak'>Kontrak</option>
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Jabatan</label>
						<div class='col-md-9'>
							<select name='jabatan' id='jabatan' class='form-control' required>
								<option value=''>-- Pilih Jabatan --</option>";
								foreach ($jabatan as $jabatan) {
									echo "<option value='".$jabatan->ID_JABATAN."'>".ucfirst(strtolower($jabatan->NAMA_JABATAN))."</option>";
								}
							echo
							"</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Jenis Kelamin</label>
						<div class='col-md-9'>
							<div class='radio-list'>
								<label class='radio-inline'>
								<input type='radio' name='jk' id='pria' value='pria'>Pria</label>
								<label class='radio-inline'>
								<input type='radio' name='jk' id='wanita' value='wanita'>Wanita</label>
							</div>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Tempat Kerja</label>
						<div class='col-md-9'>
							<select name='outlet' id='outlet' class='form-control' required>
								<option value=''>-- Pilih Tempat kerja --</option>";
								foreach ($outlet as $outlet) {
									echo "<option value='".$outlet->ID_OUTLET."'>".ucfirst(strtolower($outlet->NAMA_OUTLET))."</option>";
								}
							echo
							"</select>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_karyawan->get_id($id);
			foreach ($query as $row) {
				$jabatan = $this->m_jabatan->get_all();
				$outlet = $this->m_outlet->get_all();
				echo "
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
						<h4 class='modal-title'>Udah Data Karyawan</h4>
					</div>
				 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/karyawan_act/ubah'>
					<div class='modal-body'>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Id Karyawan</label>
							<div class='col-md-9'>
								<input type='text' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' required readonly>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Nama Karyawan</label>
							<div class='col-md-9'>
								<input type='text' class='form-control' placeholder='Nama Karyawan' id='nama' name='nama' value='".ucfirst(strtolower($row->NAMA_KARYAWAN))."' required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Status Karyawan</label>
							<div class='col-md-9'>
								<select name='status' id='status' class='form-control' required>
									<option value='".ucfirst(strtolower($row->STATUS_KARYAWAN))."'>".ucfirst(strtolower($row->STATUS_KARYAWAN))."</option>
									<option value='tetap'>Tetap</option>
									<option value='kontrak'>Kontrak</option>
								</select>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Jabatan</label>
							<div class='col-md-9'>
								<select name='jabatan' id='jabatan' class='form-control' required>
									<option value='".ucfirst(strtolower($row->ID_JABATAN))."'>".ucfirst(strtolower($row->NAMA_JABATAN))."</option>";
									foreach ($jabatan as $jabatan) {
										echo "<option value='".$jabatan->ID_JABATAN."'>".ucfirst(strtolower($jabatan->NAMA_JABATAN))."</option>";
									}
								echo
								"</select>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Tempat Kerja</label>
							<div class='col-md-9'>
								<select name='outlet' id='outlet' class='form-control' required>
									<option value='".ucfirst(strtolower($row->ID_OUTLET))."'>".ucfirst(strtolower($row->NAMA_OUTLET))."</option>";
									foreach ($outlet as $outlet) {
										echo "<option value='".$outlet->ID_OUTLET."'>".ucfirst(strtolower($outlet->NAMA_OUTLET))."</option>";
									}
								echo
								"</select>
							</div>
						</div>
						
						<div class='form-group'>
							<label class='col-md-3 control-label'>Jenis Kelamin</label>
							<div class='col-md-9'>
								<div class='radio-list'>
									<label class='radio-inline'>
									<input type='radio' name='jk' id='pria' value='pria'"; if($row->JENIS_KELAMIN == 'PRIA'){echo "checked";} echo ">Pria</label>
									<label class='radio-inline'>
									<input type='radio' name='jk' id='wanita' value='wanita' "; if($row->JENIS_KELAMIN == 'WANITA'){echo "checked";} echo ">Wanita</label>
								</div>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
						<button type='submit' class='btn blue'>Simpan</button>
					</div>
				 </form>
				</div>";
			}
		}else{
			redirect('master/karyawan');
		}
	}

	
	/**
	 * Master Kehadiran
	 */
	public function kehadiran()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);

		$id = $this->session->userdata('id_karyawan');

		$isi['content']		='master/kehadiran';
		$isi['judul_menu']	='Maintenance Master';
		$isi['judul']		='Maintenance Master <small>Data Kehadiran</small>';
		$isi['breadcrumb1']	='Maintenance Master';
		$isi['breadcrumb2']	='Kehadiran';
		$isi['periode'] = $this->m_periode->get_all();
		$isi['outlet'] = $isi['outlet'] = $this->m_karyawan->get_id($id);;

		$this->load->view('tampilan_utama',$isi);
	}

	public function kehadiran_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){

			$id = $this->input->post('id');
			$karyawan = $this->input->post('karyawan');
			$terlambat = $this->input->post('terlambat');
			$absen = $this->input->post('absen');
			$sakit = $this->input->post('sakit');
			$periode = $this->input->post('periode');
			$outlet = $this->input->post('outlet');

			$jml = count($karyawan);
			for ($i=1; $i <= $jml ; $i++) {
				$kehadiran = $this->m_kehadiran->cek_kehadiran_id($id[$i]);
				$kehadiran = $kehadiran->num_rows();
				if ($kehadiran > 0) {
					$this->m_kehadiran->update($id[$i],$periode,$karyawan[$i],$terlambat[$i],$absen[$i],$sakit[$i]);
				}else{
					$this->m_kehadiran->create($id[$i],$periode,$karyawan[$i],$terlambat[$i],$absen[$i],$sakit[$i]);
				}

			}

			$this->session->set_flashdata('jenis','alert-success');
			$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');

			redirect('master/kehadiran');

		}else if($act == 'cek'){
			$periode = $this->input->post('periode');
			$outlet = $this->input->post('outlet');

			$karyawan = $this->m_karyawan->get_by_outlet($outlet);
			$id 	= $this->m_security->gen_id('kehadiran','ID_KEHADIRAN');

			echo "
				<br>
				<table class='table table-striped table-bordered table-hover' id='sample_3'>
				<thead>
				<tr>
					<th style='width:5%;text-align:center;' >
						No.
					</th>
					<th style='width:25%;text-align:center;'>
						 Nama Karyawan
					</th>
					<th style='width:15%;text-align:center;'>
						 Terlambat
					</th>
					<th style='width:15%;text-align:center;'>
						 Absen
					</th>
					<th style='width:15%;text-align:center;'>
						 Sakit
					</th>
					<th style='width:15%;text-align:center;'>
						 Action
					</th>
				</tr>
				</thead>
				<tbody>
			";

			$count = 1;
			foreach ($karyawan->result() as $karyawan) {
				$id_karyawan = $karyawan->ID_KARYAWAN;
				$kehadiran = $this->m_kehadiran->cek_kehadiran($id_karyawan,$periode);
				$cek_kehadiran = $kehadiran->num_rows();
				if ($cek_kehadiran > 0) {
					foreach ($kehadiran->result() as $kehadiran) {
						echo "
							<tr class='odd gradeX'>
								<td style='text-align:center;'>
									".$count."
								</td>
								<td>
									".$kehadiran->NAMA_KARYAWAN."
								</td>
								<td>
									<input type='hidden' name='id[".$count."]' id='id_".$count."' class='form-control' value='".$kehadiran->ID_KEHADIRAN."' readonly>
									<input type='hidden' name='karyawan[".$count."]' id='karyawan_".$count."' class='form-control' value='".$kehadiran->ID_KARYAWAN."' readonly>
									<input type='number' name='terlambat[".$count."]' id='terlambat_".$count."' class='form-control' value='".$kehadiran->TERLAMBAT."' readonly>
								</td>
								<td>
									<input type='number' name='absen[".$count."]' id='absen_".$count."' class='form-control' value='".$kehadiran->ABSEN."' readonly>
								</td>
								<td>
									<input type='number' name='sakit[".$count."]' id='sakit_".$count."' class='form-control' value='".$kehadiran->SAKIT."' readonly>
								</td>
								<td style='text-align:center;'> 
									<div class='btn-group btn-group-sm btn-group-solid '>
										<button type='button' class='btn blue' onclick='edit($count)' id='edit_".$count."'><i class='fa fa-pencil'></i></button>
									</div>
								</td>
							</tr>
						";
					}
				}else{
					echo "
						<tr class='odd gradeX'>
							<td style='text-align:center;'>
								".$count."
							</td>
							<td>
								".$karyawan->NAMA_KARYAWAN."
							</td>
							<td>
								<input type='hidden' name='id[".$count."]' id='id_".$count."' class='form-control' value='".$id."'>
								<input type='hidden' name='karyawan[".$count."]' id='karyawan_".$count."' class='form-control' value='".$karyawan->ID_KARYAWAN."'>
								<input type='number' name='terlambat[".$count."]' id='terlambat_".$count."' class='form-control' value='0'>
							</td>
							<td>
								<input type='number' name='absen[".$count."]' id='absen_".$count."' class='form-control' value='0'>
							</td>
							<td>
								<input type='number' name='sakit[".$count."]' id='sakit_".$count."' class='form-control' value='0'>
							</td>
							<td style='text-align:center;'> 
							</td>
						</tr>
					";
					$id++;
				}
				$count++;
			}

			echo "
				</tbody>
				</table>

				<div class='row'>
					<div class='col-md-3 pull-right'>
						<div class='pull-right'>
							<a href='".base_url()."master/kehadiran' class='btn default'>Batal</a>
							<button type='submit' class='btn blue'>Simpan</button>
						</div>
					</div>
				</div>
			";
		}else{
			redirect('master/kehadiran');
		}
	}

	
	/**
	 * Master periode
	 */
	public function periode()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		$isi['content']		='master/periode';
		$isi['judul_menu']	='Maintenance Data';
		$isi['judul']		='Maintenance Data <small>Data Periode Penilaian</small>';
		$isi['breadcrumb1']	='Maintenance Data';
		$isi['breadcrumb2']	='Periode Penilaian';
		$isi['periode'] 	= $this->m_periode->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function periode_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));
			$bln_awal = $this->input->post('bln_awal');
			$thn_awal = $this->input->post('thn_awal');

			$bln_akhir = $this->input->post('bln_akhir');
			$thn_akhir = $this->input->post('thn_akhir');
			$keterangan = strtoupper($this->input->post('keterangan'));
			
			//set tanggal akhir yyyy-mm-dd
			if ($bln_akhir == '01' ||$bln_akhir == '03' ||$bln_akhir == '05' ||$bln_akhir == '07' ||$bln_akhir == '08' ||$bln_akhir == '10' ||$bln_akhir == '12')
			{
				$tgl_akhir = '31';
			}else
			if ($bln_akhir == '02')
			{
				if ($thn_akhir % 4 == 0) {
					$tgl_akhir = '29';
				}else{
					$tgl_akhir = '28';
				}
			}else{
				$tgl_akhir = '30';
			}
			$tgl_awal = '01';
			$awal = $thn_awal."-".$bln_awal."-".$tgl_awal;
			$akhir = $thn_akhir."-".$bln_akhir."-".$tgl_akhir;

			$query = $this->m_periode->create($id,$nama,$awal,$akhir,$keterangan);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/periode');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));
			$bln_awal = $this->input->post('bln_awal');
			$thn_awal = $this->input->post('thn_awal');

			$bln_akhir = $this->input->post('bln_akhir');
			$thn_akhir = $this->input->post('thn_akhir');
			$keterangan = strtoupper($this->input->post('keterangan'));
			
			//set tanggal akhir yyyy-mm-dd
			if ($bln_akhir == '01' ||$bln_akhir == '03' ||$bln_akhir == '05' ||$bln_akhir == '07' ||$bln_akhir == '08' ||$bln_akhir == '10' ||$bln_akhir == '12')
			{
				$tgl_akhir = '31';
			}else
			if ($bln_akhir == '02')
			{
				if ($thn_akhir % 4 == 0) {
					$tgl_akhir = '29';
				}else{
					$tgl_akhir = '28';
				}
			}else{
				$tgl_akhir = '30';
			}
			$tgl_awal = '01';
			$awal = $thn_awal."-".$bln_awal."-".$tgl_awal;
			$akhir = $thn_akhir."-".$bln_akhir."-".$tgl_akhir;


			$query = $this->m_periode->update($id,$nama,$awal,$akhir,$keterangan);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/periode');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_periode->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('periode_kehadiran_dan_penilaian','ID_PERIODE2');
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Periode Penilaian</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/periode_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Periode</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Periode' id='nama' name='nama' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Awal</label>
						<div class='col-md-5'>
							<select name='bln_awal' id='bln_awal' class='form-control' onChange='bulan_awal()' required>
								<option value=''>-- Pilih Bulan --</option>
								<option value='01'>Januari</option>
								<option value='02'>Februari</option>
								<option value='03'>Maret</option>
								<option value='04'>April</option>
								<option value='05'>Mei</option>
								<option value='06'>Juni</option>
								<option value='07'>Juli</option>
								<option value='08'>Agustus</option>
								<option value='09'>September</option>
								<option value='10'>Oktober</option>
								<option value='11'>November</option>
								<option value='12'>Desember</option>
							</select>
						</div>
						<div class='col-md-4'>
							<select name='thn_awal' id='thn_awal' class='form-control' onChange='tahun_awal()' required>
								<option value=''>-- Pilih tahun --</option>";
								$tahun_sekarang = date("Y");
								$n = $tahun_sekarang - 5; //awal tahun yang di tampilkan 5 tahun sebelumnya
								$tahun_tampil = 10;//menampilkan tahun sebayak 10 kali
								for ($i=0; $i < $tahun_tampil ; $i++) { 
									echo "<option value='".$n."'>".$n."</option>";
									$n++;
								}

							echo "
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Akhir</label>
						<div class='col-md-5'>
							<select name='bln_akhir' id='bln_akhir' class='form-control' required>
								<option value=''>-- Pilih Bulan --</option>
								<option value='01'>Januari</option>
								<option value='02'>Februari</option>
								<option value='03'>Maret</option>
								<option value='04'>April</option>
								<option value='05'>Mei</option>
								<option value='06'>Juni</option>
								<option value='07'>Juli</option>
								<option value='08'>Agustus</option>
								<option value='09'>September</option>
								<option value='10'>Oktober</option>
								<option value='11'>November</option>
								<option value='12'>Desember</option>
							</select>
						</div>
						<div class='col-md-4'>
							<select name='thn_akhir' id='thn_akhir' class='form-control' onChange='tahun_akhir()' required>
								<option value=''>-- Pilih tahun --</option>";
								$n = $tahun_sekarang - 5; //awal tahun yang di tampilkan 5 tahun sebelumnya
								$tahun_tampil = 10;//menampilkan tahun sebayak 10 kali
								for ($i=0; $i < $tahun_tampil ; $i++) { 
									echo "<option value='".$n."'>".$n."</option>";
									$n++;
								}
							echo"
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Keterangan</label>
						<div class='col-md-9'>
							<textarea class='form-control' cols='3' rows='7' name='keterangan' id='keterangan'></textarea>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_periode->get_id($id);
			foreach ($query as $row) {
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Ubah Data Periode Penilaian</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/periode_act/ubah'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Periode</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Periode' id='nama' name='nama' value='".ucfirst(strtolower($row->NAMA_PERIODE))."' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Awal</label>
						<div class='col-md-5'>
							<select name='bln_awal' id='bln_awal' class='form-control'  required>";
								$bulan_awal = date("m",strtotime($row->AWAL));
								$format_bulan = $this->bulan_indo($bulan_awal);
								echo "<option value='".$bulan_awal."'>".$format_bulan."</option>";								

								echo "
								<option value='01'>Januari</option>
								<option value='02'>Februari</option>
								<option value='03'>Maret</option>
								<option value='04'>April</option>
								<option value='05'>Mei</option>
								<option value='06'>Juni</option>
								<option value='07'>Juli</option>
								<option value='08'>Agustus</option>
								<option value='09'>September</option>
								<option value='10'>Oktober</option>
								<option value='11'>November</option>
								<option value='12'>Desember</option>
							</select>
						</div>
						<div class='col-md-4'>
							<select name='thn_awal' id='thn_awal' class='form-control' onChange='tahun_awal()' required>";

								echo "<option value='".date("Y",strtotime($row->AWAL))."'>".date("Y",strtotime($row->AWAL))."</option>";
								$tahun_sekarang = date("Y");
								$n = $tahun_sekarang - 5; //awal tahun yang di tampilkan 5 tahun sebelumnya
								$tahun_tampil = 10;//menampilkan tahun sebayak 10 kali
								for ($i=0; $i < $tahun_tampil ; $i++) { 
									echo "<option value='".$n."'>".$n."</option>";
									$n++;
								}

							echo "
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Akhir</label>
						<div class='col-md-5'>
							<select name='bln_akhir' id='bln_akhir' class='form-control' required>";
								$bulan_akhir = date("m",strtotime($row->AKHIR));
								$format_bulan = $this->bulan_indo($bulan_akhir);
								echo "<option value='".$bulan_akhir."'>".$format_bulan."</option>";
								echo "
								<option value='01'>Januari</option>
								<option value='02'>Februari</option>
								<option value='03'>Maret</option>
								<option value='04'>April</option>
								<option value='05'>Mei</option>
								<option value='06'>Juni</option>
								<option value='07'>Juli</option>
								<option value='08'>Agustus</option>
								<option value='09'>September</option>
								<option value='10'>Oktober</option>
								<option value='11'>November</option>
								<option value='12'>Desember</option>
							</select>
						</div>
						<div class='col-md-4'>
							<select name='thn_akhir' id='thn_akhir' class='form-control' onChange='tahun_akhir()' required>";
								echo "<option value='".date("Y",strtotime($row->AKHIR))."'>".date("Y",strtotime($row->AKHIR))."</option>";
								$n = $tahun_sekarang - 5; //awal tahun yang di tampilkan 5 tahun sebelumnya
								$tahun_tampil = 10;//menampilkan tahun sebayak 10 kali
								for ($i=0; $i < $tahun_tampil ; $i++) { 
									echo "<option value='".$n."'>".$n."</option>";
									$n++;
								}
							echo"
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Keterangan</label>
						<div class='col-md-9'>
							<textarea class='form-control' cols='3' rows='7' name='keterangan' id='keterangan'>".ucfirst(strtolower($row->KETERANGAN))."</textarea>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";
			}
		}else{
			redirect('master/periode');
		}
	}
	

	/**
	 * Master range kriteria
	 */
	public function range_kriteria()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		$isi['content']		='master/range_kriteria';
		$isi['judul_menu']	='Maintenance Data';
		$isi['judul']		='Maintenance Data <small>Data Range Kriteria</small>';
		$isi['breadcrumb1']	='Maintenance Data';
		$isi['breadcrumb2']	='Range Kriteria';
		$isi['range'] 	= $this->m_range_kriteria->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function range_kriteria_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$nilai = $awal." - ".$akhir;
			$kriteria = $this->input->post('kriteria');
			$deskripsi = strtoupper($this->input->post('deskripsi'));

			$query = $this->m_range_kriteria->create($id,$kriteria,$nilai,$deskripsi);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/range_kriteria');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$nilai = $awal." - ".$akhir;
			$kriteria = $this->input->post('kriteria');
			$deskripsi = strtoupper($this->input->post('deskripsi'));

			$query = $this->m_range_kriteria->update($id,$kriteria,$nilai,$deskripsi);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/range_kriteria');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_range_kriteria->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('range_kriteria','ID_RANGE_KRITERIA');
			$kriteria = $this->m_kriteria->get_all();
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Range Kriteria</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/range_kriteria_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Kriteria</label>
						<div class='col-md-9'>
							<select class='form-control' id='kriteria' name='kriteria' required>
								<option value=''>-- Pilih Kriteria --</option>";
								foreach ($kriteria as $kriteria) {
									echo "<option value='".$kriteria->ID_KRITERIA."'>".ucfirst(strtolower($kriteria->NAMA_KRITERIA))."</option>";
								}
							
							echo "	
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nilai Range</label>
						<div class='col-md-4'>
							<input type='number' class='form-control col-md-2' id='awal' name='awal' placeholder='Nilai awal' required>
						</div>
						<div class='col-md-4'>
							<input type='number' class='form-control col-md-2' id='akhir' name='akhir' placeholder='Nilai akhir' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Deskripsi</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<textarea class='form-control' cols='3' rows='7' name='deskripsi' id='deskripsi' required></textarea>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$kriteria = $this->m_kriteria->get_all();
			$query = $this->m_range_kriteria->get_id($id);
			foreach ($query as $row) {
				$nilai = $row->NILAI_RANGE_KRITERIA;
				$nilai = explode(' - ', $nilai);
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Ubah Data Range Kriteria</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/range_kriteria_act/ubah'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Kriteria</label>
						<div class='col-md-9'>
							<select class='form-control' id='kriteria' name='kriteria' required>
								<option value='".$row->ID_KRITERIA."'>".ucfirst(strtolower($row->NAMA_KRITERIA))."</option>";
								foreach ($kriteria as $kriteria) {
									echo "<option value='".$kriteria->ID_KRITERIA."'>".ucfirst(strtolower($kriteria->NAMA_KRITERIA))."</option>";
								}
							
							echo "	
							</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nilai Range</label>
						<div class='col-md-4'>
							<input type='number' class='form-control col-md-2' id='awal' name='awal' placeholder='Nilai awal' value='".$nilai[0]."' required>
						</div>
						<div class='col-md-4'>
							<input type='number' class='form-control col-md-2' id='akhir' name='akhir' placeholder='Nilai akhir' value='".$nilai[1]."' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Deskripsi</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<textarea class='form-control' cols='3' rows='7' name='deskripsi' id='deskripsi' required>".ucfirst(strtolower($row->DESKRIPSI_KRITERIA))."</textarea>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";
			}
		}else{
			redirect('master/range_kriteria');
		}
	}
	

	/**
	 * Master range kriteria
	 */
	public function kriteria()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		$isi['content']		='master/kriteria';
		$isi['judul_menu']	='Maintenance Data';
		$isi['judul']		='Maintenance Data <small>Data Kriteria</small>';
		$isi['breadcrumb1']	='Maintenance Data';
		$isi['breadcrumb2']	='Kriteria';
		$isi['kriteria'] 	= $this->m_kriteria->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function kriteria_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));
			$bobot = $this->input->post('bobot');

			$cek_bobot = $this->m_kriteria->get_bobot_total()->row();
			$cek_bobot = $cek_bobot->BOBOT_TOTAL;
			
			$hasil_cek = $cek_bobot + $bobot;

			if ($hasil_cek > 100) {
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>kesalahan!</strong> Bobot Melebihi 100%.');
			}else if ( $bobot < 1) {
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>kesalahan!</strong> Bobot harus lebih dari 0%.');
			}else{
				$query = $this->m_kriteria->create($id,$nama,$bobot);
				if($query > 0){
					$this->session->set_flashdata('jenis','alert-success');
					$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
				}else{
					$this->session->set_flashdata('jenis','alert-danger');
					$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
				}
				
			}

			redirect('master/kriteria');
		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));
			$bobot = $this->input->post('bobot');
			$bobot_awal = $this->input->post('bobot_awal');

			$cek_bobot = $this->m_kriteria->get_bobot_total()->row();
			$cek_bobot = $cek_bobot->BOBOT_TOTAL;
			
			$hasil_cek = $cek_bobot + $bobot - $bobot_awal;

			if ($hasil_cek > 100) {
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>kesalahan!</strong> Bobot Melebihi 100%.');
			}else if ( $bobot < 1) {
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>kesalahan!</strong> Bobot harus lebih dari 0%.');
			}else{
				$query = $this->m_kriteria->update($id,$nama,$bobot);
				if($query > 0){
					$this->session->set_flashdata('jenis','alert-success');
					$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
				}else{
					$this->session->set_flashdata('jenis','alert-danger');
					$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
				}
				
			}
			redirect('master/kriteria');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_kriteria->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('kriteria','ID_KRITERIA');
			$cek_bobot = $this->m_kriteria->get_bobot_total()->row();
			$cek_bobot = $cek_bobot->BOBOT_TOTAL;
			$max = 100 - $cek_bobot;
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Kriteria</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/kriteria_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Kriteria</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' id='nama' name='nama' placeholder='Nama Kriteria' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Bobot (%)</label>
						<div class='col-md-9'>
							<input type='number' class='form-control' id='bobot' name='bobot' placeholder='Bobot Kriteria' required>
							<span>Bobot harus bernilai di antara 1 - ".$max."</span>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_kriteria->get_id($id);
			$cek_bobot = $this->m_kriteria->get_bobot_total()->row();
			$cek_bobot = $cek_bobot->BOBOT_TOTAL;
			$max = 100 - $cek_bobot;
			foreach ($query as $row) {
				$max = $max + $row->BOBOT;
				echo "
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
						<h4 class='modal-title'>Ubah Data Kriteria</h4>
					</div>
				 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/kriteria_act/ubah'>
					<div class='modal-body'>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Nama Kriteria</label>
							<div class='col-md-9'>
								<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
								<input type='hidden' class='form-control' placeholder='bobot_awal' id='bobot_awal' name='bobot_awal' value='".$row->BOBOT."' readonly>
								<input type='text' class='form-control' id='nama' name='nama' placeholder='Nama Kriteria' value='".$row->NAMA_KRITERIA."' required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Bobot (%)</label>
							<div class='col-md-9'>
								<input type='number' class='form-control' id='bobot' name='bobot' placeholder='Bobot Kriteria' value='".$row->BOBOT."' required>
								<span>Bobot harus bernilai di antara 1 - ".$max."</span>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
						<button type='submit' class='btn blue'>Simpan</button>
					</div>
				 </form>
				</div>";
			}
		}else{
			redirect('master/kriteria');
		}
	}
	
	

	/**
	 * Master range kategori pelatihan
	 */
	public function kategori_pelatihan()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		$isi['content']		='master/kategori_pelatihan';
		$isi['judul_menu']	='Maintenance Data';
		$isi['judul']		='Maintenance Data <small>Data Kategori Pelatihan</small>';
		$isi['breadcrumb1']	='Maintenance Data';
		$isi['breadcrumb2']	='Kategori Pelatihan';
		$isi['kategori'] 	= $this->m_kategori_pelatihan->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function kategori_pelatihan_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_kategori_pelatihan->create($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/kategori_pelatihan');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$nama = strtoupper($this->input->post('nama'));

			$query = $this->m_kategori_pelatihan->update($id,$nama);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/kategori_pelatihan');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_kategori_pelatihan->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('kategori_pelatihan','ID_KATEGORI');
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Kategori Pelatihan</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/kategori_pelatihan_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Kategori</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' id='nama' name='nama' placeholder='Nama Kategori' required>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_kategori_pelatihan->get_id($id);
			foreach ($query as $row) {
				echo "
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
						<h4 class='modal-title'>Ubah Data Kategori Pelatihan</h4>
					</div>
				 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/kategori_pelatihan_act/ubah'>
					<div class='modal-body'>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Nama Kategori</label>
							<div class='col-md-9'>
								<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
								<input type='text' class='form-control' id='nama' name='nama' placeholder='Nama Kategori' value='".ucfirst(strtolower($row->NAMA_KATEGORI))."' required>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
						<button type='submit' class='btn blue'>Simpan</button>
					</div>
				 </form>
				</div>";
			}
		}else{
			redirect('master/kategori_pelatihan');
		}
	}
	

	/**
	 * Master pelatihan
	 */
	public function pelatihan()
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		$isi['content']		='master/pelatihan';
		$isi['judul_menu']	='Maintenance Data';
		$isi['judul']		='Maintenance Data <small>Data Pelatihan</small>';
		$isi['breadcrumb1']	='Maintenance Data';
		$isi['breadcrumb2']	='Pelatihan';
		$isi['pelatihan'] 	= $this->m_pelatihan->get_all();

		$this->load->view('tampilan_utama',$isi);
	}

	public function pelatihan_act($act)
	{
		$this->m_security->check();
		$anti_level = array('5','4','3');
		$this->m_security->access($anti_level);


		if($act == 'simpan'){
			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');
			$nama = strtoupper($this->input->post('nama'));
			$ket = strtoupper($this->input->post('ket'));

			$query = $this->m_pelatihan->create($id,$kategori,$nama,$ket);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di tambahkan.');
			}
			redirect('master/pelatihan');

		}else if($act == 'ubah'){
			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');
			$nama = strtoupper($this->input->post('nama'));
			$ket = strtoupper($this->input->post('ket'));

			$query = $this->m_pelatihan->update($id,$kategori,$nama,$ket);

			if($query > 0){
				$this->session->set_flashdata('jenis','alert-success');
				$this->session->set_flashdata('pesan','<strong>Berhasil!</strong> Data berhasil di ubah.');
			}else{
				$this->session->set_flashdata('jenis','alert-danger');
				$this->session->set_flashdata('pesan','<strong>Gagal!</strong> Data gagal di ubah.');
			}
			redirect('master/pelatihan');

		}else if($act == 'hapus'){
			$id = $this->input->post('id');
			$this->m_pelatihan->delete($id);

		}else if($act == 'tambah'){
			$id = $this->m_security->gen_id('pelatihan','ID_PELATIHAN');
			$kategori = $this->m_kategori_pelatihan->get_all();
			echo "
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
					<h4 class='modal-title'>Tambah Data Pelatihan</h4>
				</div>
			 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/pelatihan_act/simpan'>
				<div class='modal-body'>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Nama Periode</label>
						<div class='col-md-9'>
							<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
							<input type='text' class='form-control' placeholder='Nama Pelatihan' id='nama' name='nama' required>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Awal</label>
						<div class='col-md-9'>
							<select name='kategori' id='kategori' class='form-control' required>
								<option value=''>-- Pilih Kategori --</option>";
								foreach ($kategori as $kategori) {
									echo "<option value='".$kategori->ID_KATEGORI."'>".ucfirst(strtolower($kategori->NAMA_KATEGORI))."</option>";
								}
							echo
							"</select>
						</div>
					</div>
					<div class='form-group'>
						<label class='col-md-3 control-label'>Keterangan</label>
						<div class='col-md-9'>
							<textarea class='form-control' cols='3' rows='7' name='ket' id='ket'></textarea>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
					<button type='submit' class='btn blue'>Simpan</button>
				</div>
			 </form>
			</div>";

		}else if($act == 'edit'){
			$id = $this->input->post('id');
			$query = $this->m_pelatihan->get_id($id);
			foreach ($query as $row) {
				$kategori = $this->m_kategori_pelatihan->get_all();
				echo "
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>
						<h4 class='modal-title'>Ubah Data Pelatihan</h4>
					</div>
				 <form class='form-horizontal' role='form' method='post' action='".base_url()."master/pelatihan_act/ubah'>
					<div class='modal-body'>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Nama Periode</label>
							<div class='col-md-9'>
								<input type='hidden' class='form-control' placeholder='ID' id='id' name='id' value='".$id."' readonly>
								<input type='text' class='form-control' placeholder='Nama Pelatihan' id='nama' name='nama' value='".ucfirst(strtolower($row->NAMA_PELATIHAN))."' required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Awal</label>
							<div class='col-md-9'>
								<select name='kategori' id='kategori' class='form-control' required>
									<option value='".$row->ID_KATEGORI."'>".ucfirst(strtolower($row->NAMA_KATEGORI))."</option>";
									foreach ($kategori as $kategori) {
										echo "<option value='".$kategori->ID_KATEGORI."'>".ucfirst(strtolower($kategori->NAMA_KATEGORI))."</option>";
									}
								echo
								"</select>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-3 control-label'>Keterangan</label>
							<div class='col-md-9'>
								<textarea class='form-control' cols='3' rows='7' name='ket' id='ket'>".ucfirst(strtolower($row->KETERANGAN_PELATIHAN))."</textarea>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='reset' class='btn default' data-dismiss='modal'>Batal</button>
						<button type='submit' class='btn blue'>Simpan</button>
					</div>
				 </form>
				</div>";

			}
		}else{
			redirect('master/pelatihan');
		}
	}

	public function bulan_indo($bln)
	{
		switch ($bln) {
			case '01':
				$bulan = 'Januari';
				break;
			case '02':
				$bulan = 'Februari';
				break;
			case '03':
				$bulan = 'Maret';
				break;
			case '04':
				$bulan = 'April';
				break;
			case '05':
				$bulan = 'Mei';
				break;
			case '06':
				$bulan = 'Juni';
				break;
			case '07':
				$bulan = 'Juli';
				break;
			case '08':
				$bulan = 'Agustus';
				break;
			case '09':
				$bulan = 'September';
				break;
			case '10':
				$bulan = 'Oktober';
				break;
			case '11':
				$bulan = 'November';
				break;
			case '12':
				$bulan = 'Desember';
				break;
			
			default:
				$bulan = 'Januari';
				break;
		}
		return $bulan;
	}



}
