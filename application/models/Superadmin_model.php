<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Superadmin_model extends CI_Model{

    public function show_data(){
      $this->db->order_by('id_departemen', 'ASC');
      return $this->db->from('departemen')->get()->result();
    }

    public function show_data_kps(){
      $this->db->order_by('username', 'ASC');
      return $this->db->from('kps')->get()->result();
    }

    public function upload_file($filename){
      $this->load->library('upload'); //load library upload

      $config['upload_path'] = './excel/';
      $config['allowed_types'] = 'xlsx';
      $config['max_size'] = '2048';
      $config['overwrite'] = true;
      $config['filename'] = $filename;

      $this->upload->initialize($config); //load konfigurasi uploadnya
      if ($this->upload->do_upload('file')) { //lakukan upload dan cek jika proses upload berhasil
        //jika berhasil
        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        return $return;
      } else {
        //jika gagal
        $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        return $return;
      }
    }

    //fungsi untuk melakukan insert lebih dari satu data_kps
    public function insert_multiple($data){
      $this->db->insert_batch('dosen', $data);
    }

    public function insert_multiples($datauser){
      $this->db->insert_batch('dosen', $datauser);
    }

  }
