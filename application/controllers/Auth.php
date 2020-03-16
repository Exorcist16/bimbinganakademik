<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

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
    
    public function push_subscription() {
      $subscription = json_decode(file_get_contents('php://input'), true);

      if (!isset($subscription['endpoint'])) {
        echo 'Error: not a subscription';
        return;
      }

      $method = $_SERVER['REQUEST_METHOD'];

      switch ($method) {
        case 'POST':
          // create
          $sub_insert = $this->db->query("INSERT INTO subscription (username, endpoint, p256dh, auth)
            VALUES ('$subscription[username]', '$subscription[endpoint]', '$subscription[publicKey]', '$subscription[authToken]')");
          echo "New record created";
          break;
        case 'PUT':
          // update
          $sub_select = $this->db->query("SELECT * FROM subscription WHERE username='$subscription[username]'")->result();
          if ($sub_select[0]->username == $subscription['username'] && $sub_select[0]->endpoint == $subscription['endpoint'] 
            && $sub_select[0]->p256dh == $subscription['publicKey'] && $sub_select[0]->auth == $subscription['authToken']) {
              echo "No changes on record";
              break;
          } else {
            $sub_update = $this->db->query("UPDATE subscription SET endpoint = '$subscription[endpoint]', 
              p256dh = '$subscription[publicKey]', auth = '$subscription[authToken]' WHERE username = '$subscription[username]'");
            echo "Record updated";
            break;
          };
        default:
          echo "Error: method not handled";
          return;
      };
    }

    public function push_notification_seminar() {
      $input = json_decode(file_get_contents('php://input'), true);

      $query_username = $this->db->query("SELECT nip FROM dosen WHERE nama_dosen='$input[nama_dosen]'")->result();
      $sub_username = $query_username[0]->nip;
      $query_subscription = $this->db->query("SELECT * FROM subscription WHERE username='$sub_username'")->result();

      $nim_mahasiswa = $input['nim_mahasiswa'];
      $nama_mahasiswa = $input['nama_mahasiswa'];
      $ujian_tanggal = $input['ujian_tanggal'];
      $ujian_waktu = $input['ujian_waktu'];
      $ujian_tempat = $input['ujian_tempat'];

      if ($input['jenis'] == 'konfirmasi_seminar_tutup') {
          $title = "Konfirmasi Jadwal Ujian Skripsi Baru";
          $body = "Nama : $nama_mahasiswa ($nim_mahasiswa)\nPada Tanggal $ujian_tanggal di $ujian_tempat.\nWaktu : $ujian_waktu.";
      }
      elseif ($input['jenis'] == 'konfirmasi_seminar_hasil') {
          $title = "Konfirmasi Jadwal Seminar Hasil Baru";
          $body = "Nama : $nama_mahasiswa ($nim_mahasiswa)\nPada Tanggal $ujian_tanggal di $ujian_tempat.\nWaktu : $ujian_waktu.";
      } 
      else {
          $title = "No message";
          $body = "No message";
      }

      echo $query_subscription[0]->username;

      $auth = [
          'GCM' => '267660624424', // deprecated and optional, it's here only for compatibility reasons
          'VAPID' => [
              'subject' => 'mailto:me@website.com', // can be a mailto: or your website address
              'publicKey' => 'BBM3ZhbZ9j0Og57QieQ0dT6MjU5U4sVZcsc5j4dSWTlC3WvFp3Db1GBvwNcyAFfRn9VpiTuYUgcoFDSJYFYGkvo', // (recommended) uncompressed public key P-256 encoded in Base64-URL
              'privateKey' => 'MmNVM1tOf4fgsF76QD-dJYL0iDM3rXBUOdKlZx8JWAo', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
          ],
      ];

      // array of notifications
      $notifications = [
          [
              'subscription' => Subscription::create([ // this is the structure for the working draft from october 2018 (https://www.w3.org/TR/2018/WD-push-api-20181026/) 
                  "endpoint" => $query_subscription[0]->endpoint,
                  "keys" => [
                      'p256dh' => $query_subscription[0]->p256dh,
                      'auth' => $query_subscription[0]->auth
                  ],
              ]),
              'payload' => json_encode([
                  'title' => $title,
                  'body' => $body,
                  'url' => $input['url']
              ]),
          ],
      ];

      $webPush = new WebPush($auth);

      // send multiple notifications with payload
      foreach ($notifications as $notification) {
          $webPush->sendNotification(
              $notification['subscription'],
              $notification['payload']
          );
      }

      /**
       * Check sent results
       * @var MessageSentReport $report
       */
      foreach ($webPush->flush() as $report) {
          $endpoint = $report->getRequest()->getUri()->__toString();

          if ($report->isSuccess()) {
              echo "Message sent successfully for subscription {$endpoint}.";
          } else {
              echo "Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
          }
      }
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
