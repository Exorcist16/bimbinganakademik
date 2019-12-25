<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps_model extends CI_Model{

  function get_data($nim){
    $this->db->like('nim', $nim, 'both');
    $this->db->order_by('nim', 'ASC');
    $this->db->limit(10);
    return $this->db->get('mahasiswa')->result();
  }
}