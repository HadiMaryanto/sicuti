<?php
  /**
   *
   */
  class AkunModel extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function ambil_id($id)
    {
      $this->db->from('sicuti_pegawai');
      $this->db->join('sicuti_jabatan','sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $this->db->where('pegawai_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function aktifkan($data)
    {
      $this->db->insert('sicuti_user',$data);
    }
    public function id_ambil()
    {
      $this->db->from('sicuti_user');
      $query = $this->db->get();
      return $query->row_array();
    }
    public function ganti($id,$data)
    {
      $this->db->where('user_id',$id);
      $this->db->update('sicuti_user',$data);
    }
  }

 ?>
