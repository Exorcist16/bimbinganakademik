<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Superadmin_model extends CI_Model{

    public function get_jurusan(){
      $this->db->from('jurusan');
      $query = $this->db->get();

      return $query;
    }

    public function get_departemen($id){
      $this->db->from('departemen');
      $this->db->where('id_jurusan_departemen', $id);
      $query = $this->db->get();

      return $query->result();
    }

    public function show_data(){
      $this->db->order_by('id_departemen', 'ASC');
      return $this->db->from('departemen')->join('jurusan', 'jurusan.id_jurusan=departemen.id_jurusan_departemen')
      ->get()->result();
    }

    public function show_data_kps(){
      $this->db->order_by('username', 'ASC');
      return $this->db->from('kps')->join('jurusan', 'jurusan.id_jurusan=kps.jurusan')
      ->get()->result();
    }

  }
