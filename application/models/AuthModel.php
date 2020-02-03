<?php
  /**
   *
   */
  class AuthModel extends CI_MODEL
  {

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function cek($data)
    {
      $query = $this->db->get_where('sicuti_user', $data);
      return $query->row_array();
    }
    public function ambil($id)
    {
      $this->db->from('sicuti_pegawai');
      $this->db->join('sicuti_jabatan','sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $dapat = array('pegawai_id'=>$id);
      $query = $this->db->get_where('sicuti_user', $dapat);
      return $query->row_array();
    }
  }

 ?>
