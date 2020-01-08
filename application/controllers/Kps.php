<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }
			$this->load->model('crud');	//22-12-2019
			$this->load->library('session');

			$this->load->model('Kps_model');
	}

	public function index() {
		redirect(base_url('kps/daftarJudul'));
	}
// ------------------------------------------------------------------------------------------------
	public function daftarJudul(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datapembimbing = $this->crud->gw('dosen', array('departemen_dosen' => $sessiondepartemen));

		$datatampil = $this->Kps_model->tampil_data($sessiondepartemen);

		$sessionjurusan = $this->session->userdata('jurusan');
		$datapenguji = $this->crud->gw('dosen', array('jurusan_dosen' => $sessionjurusan));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_judul',
										'pembimbing'				=> $datapembimbing,
										'penguji'						=> $datapenguji,
										'datatampil'				=> $datatampil
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function get_nama(){
		$nim = $this->input->post('nim');
		$data = $this->Kps_model->get_nama($nim);
		echo json_encode($data);
	}

	public function tambah_judul(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$data = array(
			'nim'					=> $this->input->post('penelitian_nim'),
			'judul'				=> $this->input->post('penelitian_judul'),
			'pembimbing1'	=> $this->input->post('penelitian_pembimbing1'),
			'pembimbing2'	=> $this->input->post('penelitian_pembimbing2'),
			'penguji1'		=> $this->input->post('penelitian_penguji1'),
			'penguji2'		=> $this->input->post('penelitian_penguji2'),
			'judul_departemen'	=> $sessiondepartemen
		);

		$this->crud->i('judul', $data);
		redirect('kps/daftarJudul');
	}

	public function edit_judul(){
		$id = $this->uri->segment(3);

		$data = array(
			'judul'				=> $this->input->post('penelitian_judul_edit'),
			'pembimbing1'	=> $this->input->post('penelitian_pembimbing1_edit'),
			'pembimbing2'	=> $this->input->post('penelitian_pembimbing2_edit'),
			'penguji1'		=> $this->input->post('penelitian_penguji1_edit'),
			'penguji2'		=> $this->input->post('penelitian_penguji2_edit')
		);

		$datajudul = array(
			'seminar_status'	=> 'rejected'
		);

		$this->crud->u('seminar', $datajudul, array('seminar_nim' => $id));
		$this->crud->u('judul', $data, array('nim' => $id));
		redirect('kps/daftarJudul');
	}

	public function hapus_judul(){
		$id = $this->uri->segment(3);
		$this->crud->d('judul', array('nim' => $id));
		redirect('kps/daftarJudul');
	}
// ------------------------------------------------------------------------------------------------
	public function seminarHasil(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatampilseminar = $this->Kps_model->tampil_data_seminar_hasil($sessiondepartemen);

		$datawaktuhasil = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));
		$datatempathasil = $this->crud->gw('tempat_ujian', array('tempat_ujian_departemen' => $sessiondepartemen));
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/seminar_hasil',
										'datatampilseminar' => $datatampilseminar,
										'datawaktuhasil'		=> $datawaktuhasil,
										'datatempathasil'		=> $datatempathasil
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
	public function tambah_seminar_hasil(){
		$nim = $this->input->post('ujian_hasil_nim');

		$data = array(
			'seminar_nim'								=> $nim,
			'seminar_tanggal'						=> $this->input->post('ujian_hasil_tanggal'),
			'seminar_waktu'							=> $this->input->post('ujian_hasil_waktu'),
			'seminar_tempat'						=> $this->input->post('ujian_hasil_tempat'),
			'seminar_pembimbing1_nama'	=> $this->input->post('ujian_hasil_pembimbing1'),
			'seminar_pembimbing1_status'=> 'menunggu',
			'seminar_pembimbing2_nama'	=> $this->input->post('ujian_hasil_pembimbing2'),
			'seminar_pembimbing2_status'=> 'menunggu',
			'seminar_penguji1_nama'			=> $this->input->post('ujian_hasil_penguji1'),
			'seminar_penguji1_status'		=> 'menunggu',
			'seminar_penguji2_nama'			=> $this->input->post('ujian_hasil_penguji2'),
			'seminar_penguji2_status'		=> 'menunggu',
			'seminar_jenis'							=> 'seminar hasil',
			'seminar_status'						=> 'aktif'
		);

		$datastatusujian = array(
			'request_hasil'		=> '1'
		);

		$this->crud->i('seminar', $data);
		$this->crud->u('mahasiswa', $datastatusujian, array('nim' => $nim));
		redirect('kps/seminarHasil');
	}

	public function hapus_seminar(){
		$id = $this->uri->segment(3);

		$nim = $this->db->query("SELECT seminar_nim FROM seminar WHERE seminar_id = '$id'")->result();
		foreach ($nim as $nim) {
			$nima = $nim->seminar_nim;
		}

		$data = array(
			'request_hasil' => '0'
		);

		$this->crud->u('mahasiswa', $data, array('nim' => $nima));
		$this->crud->d('seminar', array('seminar_id' => $id));
		redirect('kps/seminarHasil');
	}

	public function data_seminar(){
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM seminar LEFT JOIN mahasiswa ON seminar.seminar_nim=mahasiswa.nim
		WHERE seminar.seminar_id = '$id'")->result();
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function ujianSkripsi(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatampiltutup = $this->Kps_model->tampil_data_seminar_tutup($sessiondepartemen);
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/ujian_skripsi',
										'datatampiltutup'	=> $datatampiltutup
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
	public function tambah_seminar_tutup(){
		$nim = $this->input->post('ujian_tutup_nim');
		$data = array(
			'seminar_nim'			=> $nim,
			'seminar_tanggal'	=> $this->input->post('ujian_tutup_tanggal'),
			'seminar_waktu'		=> $this->input->post('ujian_tutup_waktu'),
			'seminar_tempat'	=> $this->input->post('ujian_tutup_tempat'),
			'seminar_jenis'		=> 'seminar tutup'
		);

		$datastatusujiantutup = array(
			'request_tutup'	=> '1'
		);
		$this->crud->i('seminar', $data);
		$this->crud->u('mahasiswa', $datastatusujiantutup, array('nim' => $nim));
		redirect('kps/ujianSkripsi');
	}
// ------------------------------------------------------------------------------------------------
	public function persetujuanJadwalHasil(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_hasil',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
// ------------------------------------------------------------------------------------------------
	public function persetujuanJadwalTutup(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_tutup',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
// ------------------------------------------------------------------------------------------------
	public function daftarMahasiswa(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$sessionusername = $this->session->userdata('username');

		$mahasiswadata = $this->crud->gw('mahasiswa', array('departemen' => $sessiondepartemen));
		$departemendata = $this->crud->gw('kps', array('username' => $sessionusername));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_mahasiswa',
										'mahasiswadata'			=> $mahasiswadata,
										'departemendata'		=> $departemendata
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_mahasiswa(){
		$datamahasiswa = array(
			'nama'					=> $this->input->post('mahasiswa_nama'),
			'nim'						=> $this->input->post('mahasiswa_nim'),
			'departemen'		=> $this->input->post('mahasiswa_departemen'),
			'angkatan'			=> $this->input->post('mahasiswa_angkatan'),
			'strata'				=> $this->input->post('mahasiswa_strata')
		);

		$datausermahasiswa = array(
			'username'					=> $this->input->post('mahasiswa_nim'),
			'password'					=> md5($this->input->post('mahasiswa_password')),
			'nama_user'					=> $this->input->post('mahasiswa_nama'),
			'departemen'				=> $this->input->post('mahasiswa_departemen'),
			'role'							=> 'mahasiswa'
		);

		$this->crud->i('mahasiswa', $datamahasiswa);
		$this->crud->i('user', $datausermahasiswa);
		redirect('kps/daftarMahasiswa');
	}

	public function edit_mahasiswa(){
		$id = $this->uri->segment(3);
		$data = array(
			'nim'								=> $this->input->post('mahasiswa_nim_edit'),
			'nama'							=> $this->input->post('mahasiswa_nama_edit'),
			'angkatan'					=> $this->input->post('mahasiswa_angkatan_edit'),
			'strata'						=> $this->input->post('mahasiswa_strata_edit')
		);

		$datam = array(
			'username'	=> $this->input->post('mahasiswa_nim_edit'),
			'password'	=> md5($this->input->post('mahasiswa_password_edit')),
			'nama_user'	=> $this->input->post('mahasiswa_nama_edit')
		);

		$this->crud->u('mahasiswa', $data, array('nim' => $id));
		$this->crud->u('user', $datam, array('username' => $id));
		redirect('kps/daftarMahasiswa');
	}

	public function hapus_mahasiswa(){
		$id = $this->uri->segment(3);
		$this->crud->d('mahasiswa', array('nim' => $id));
		$this->crud->d('user', array('username' => $id));
		redirect('kps/daftarMahasiswa');
	}

	public function data_mahasiswa(){
		$nim = $this->input->post('id');
		$data = $this->crud->gw('mahasiswa', array('nim' => $nim));
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function daftarDosen(){
		$sessionusername = $this->session->userdata('username');
		$sessionjurusan = $this->session->userdata('jurusan');

		$departemensession = $this->crud->gw('kps', array('username' => $sessionusername));
		$dosendata = $this->crud->gw('dosen', array('jurusan_dosen' => $sessionjurusan));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_dosen',
										'dosendata'					=> $dosendata, //22-12-2019
										'departemensession'	=> $departemensession
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_dosen(){
		$sessionjurusan = $this->session->userdata('jurusan');

		$datadosen = array(
			'nip'								=> $this->input->post('dosen_nip'),
			'nama_dosen'				=> $this->input->post('dosen_nama'),
			'departemen_dosen'	=> $this->input->post('dosen_departemen'),
			'jurusan_dosen'			=> $sessionjurusan
		);

		$datauserdosen = array(
			'username'					=> $this->input->post('dosen_nip'),
			'password'					=> md5($this->input->post('dosen_password')),
			'nama_user'					=> $this->input->post('dosen_nama'),
			'departemen'				=> $this->input->post('dosen_departemen'),
			'role'							=> 'dosen',
			'jurusan'						=> $sessionjurusan
		);

		$this->crud->i('dosen', $datadosen);
		$this->crud->i('user', $datauserdosen);
		redirect('kps/daftarDosen');
	}

	public function edit_dosen(){
		$id = $this->uri->segment(3);
		$data = array(
			'nip'								=> $this->input->post('dosen_nim_edit'),
			'nama_dosen'				=> $this->input->post('dosen_nama_edit')
		);

		$datad = array(
			'username'	=> $this->input->post('dosen_nim_edit'),
			'password'	=> md5($this->input->post('dosen_password_edit')),
			'nama_user'	=> $this->input->post('dosen_nama_edit')
		);

		$this->crud->u('dosen', $data, array('nip' => $id));
		$this->crud->u('user', $datad, array('username' => $id));
		redirect('kps/daftarDosen');
	}

	public function hapus_dosen(){
		$id = $this->uri->segment(3);
		$this->crud->d('dosen', array('nip' => $id));
		$this->crud->d('user', array('username' => $id));
		redirect('kps/daftarDosen');
	}

	public function data_dosen(){
		$nip = $this->input->post('id');
		$data = $this->crud->gw('dosen', array('nip' => $nip));
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function masterDataWaktu(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datawaktumaster = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/master_data_waktu',
										'datawaktumaster'		=> $datawaktumaster
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_waktu(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$data = array(
			'waktu_mulai'				=> $this->input->post('waktu_mulai'),
			'waktu_selesai'			=> $this->input->post('waktu_selesai'),
			'waktu_departemen'	=> $sessiondepartemen
		);

		$this->crud->i('waktu_ujian', $data);
		redirect('kps/masterDataWaktu');
	}

	public function edit_waktu(){
		$id = $this->uri->segment(3);
		$data = array(
			'waktu_mulai'		=> $this->input->post('waktu_mulai_edit'),
			'waktu_selesai'	=> $this->input->post('waktu_selesai_edit')
		);

		$this->crud->u('waktu_ujian', $data, array('waktu_ujian_id' => $id));
		redirect('kps/masterDataWaktu');
	}

	public function hapus_waktu(){
		$id = $this->uri->segment(3);
		$this->crud->d('waktu_ujian', array('waktu_ujian_id' => $id));
		redirect('kps/masterDataWaktu');
	}

	public function data_waktu(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('waktu_ujian', array('waktu_ujian_id' => $id));
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function masterDataTempat(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatempatmaster = $this->crud->gw('tempat_ujian', array('tempat_ujian_departemen' => $sessiondepartemen));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/master_data_tempat',
										'datatempatmaster'	=> $datatempatmaster
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_tempat(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$data = array(
			'tempat_ujian_nama'				=> $this->input->post('tempat'),
			'tempat_ujian_departemen'	=> $sessiondepartemen
		);

		$this->crud->i('tempat_ujian', $data);
		redirect('kps/masterDataTempat');
	}

	public function edit_tempat(){
		$id = $this->uri->segment(3);
		$data = array(
			'tempat_ujian_nama'		=> $this->input->post('tempat_nama_edit')
		);

		$this->crud->u('tempat_ujian', $data, array('tempat_ujian_id' => $id));
		redirect('kps/masterDataTempat');
	}

	public function hapus_tempat(){
		$id = $this->uri->segment(3);
		$this->crud->d('tempat_ujian', array('tempat_ujian_id' => $id));
		redirect('kps/masterDataTempat');
	}

	public function data_tempat(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('tempat_ujian', array('tempat_ujian_id' => $id));
		echo json_encode($data);
	}
}
