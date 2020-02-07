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

  }
