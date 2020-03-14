<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');

        $this->load->model('crud');
    }

    public function index() {
         $this->load->view('auth');
    }

    public function subscription_check() {
      $username = $this->session->userdata('username');
      $count = $this->db->query("SELECT COUNT(*)
              AS subscription FROM `subscription` WHERE username = '$username'")->result();
      echo json_encode($count);
    }

    public function cekLogin(){
        $username = $this->input->post('username');
        $cek_pass = $this->input->post('password');
        $password = md5($cek_pass);
        $this->AuthModel->login($username, $password);
    }

    public function profil_mahasiswa(){
      $nim = $this->session->userdata('username');
      $detail = $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
         ON mahasiswa.nim = judul.nim WHERE mahasiswa.nim = '$nim'")->result();
      $data = array(  'title'             => 'Auth',
                      'isi'               => 'admin/_layout/profil_mahasiswa',
                      'detail'            => $detail
                  );
      $this->load->view('admin/_layout/wrapper', $data);
    }

    public function tambah_foto_mahasiswa(){
      $nim = $this->session->userdata('username');
      $profil = $this->crud->gd('mahasiswa', array('nim' => $nim));
      $detail = $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
         ON mahasiswa.nim = judul.nim WHERE mahasiswa.nim = '$nim'")->result();
      // var_dump($this->input->post('foto_mhs'));
      // die();
      $data = array(  'title'             => 'Auth',
                      'isi'               => 'admin/_layout/profil_mahasiswa',
                      'detail'            => $detail);
      $foto = upload_image('foto_mhs', 'tambah', 'fotouser', '', $data);
    }

    public function profil_dosen(){
      $nip = $this->session->userdata('username');
      $detail = $this->db->query("SELECT * FROM dosen WHERE nip = '$nip'")->result();
      $data = array(  'title'             => 'Auth',
                      'isi'               => 'admin/_layout/profil_dosen',
                      'detail'            => $detail
                  );
      $this->load->view('admin/_layout/wrapper', $data);
    }

    public function get_pass(){
      $id = $this->session->userdata('username');
      $pass = md5($this->input->post('pass'));
      $db = $this->db->query("SELECT password FROM user WHERE username = '$id'")->result();
      foreach ($db as $row) {
        $data = array(
          'password'  => $row->password,
          'passlama'  => $pass
        );
      }
      echo json_encode($data);
    }

    public function ganti_pass(){
      $id = $this->session->userdata('username');
      $data = array(
        'password' => md5($this->input->post('pass_baru'))
      );
      $this->crud->u('user', $data, array('username' => $id));

      redirect('superadmin/dashboard');
    }

    public function ganti_pass_kps(){
      $id = $this->session->userdata('username');
      $data = array(
        'password' => md5($this->input->post('pass_baru_kps'))
      );
      $this->crud->u('user', $data, array('username' => $id));

      redirect('kps/daftarJudul');
    }

    public function ganti_pass_mahasiswa(){
      $id = $this->session->userdata('username');
      $data = array(
        'password' => md5($this->input->post('pass_baru_mhs'))
      );
      $this->crud->u('user', $data, array('username' => $id));

      redirect('mahasiswa/beranda');
    }

    public function ganti_pass_dosen(){
      $id = $this->session->userdata('username');
      $data = array(
        'password' => md5($this->input->post('pass_baru_dosen'))
      );
      $this->crud->u('user', $data, array('username' => $id));

      redirect('dosen/dashboard');
    }

    public function logout(){
        $waktu = date("Y-m-d H:i:s");
        $where = array(
            "id_user" => $this->session->userdata('id_user'),
        );

        // $items = array(
        //     "last_login" => $waktu,
        // );
        // $this->Crud->u('user', $items, $where );
        $this->session->sess_destroy();
        redirect('auth');
    }
}
