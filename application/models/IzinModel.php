<?php
  /**
   *
   */
  class IzinModel extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function tampil()
    {
      $this->db->from('tb_izin');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = tb_izin.izin_pegawai_id');
      $this->db->join('sicuti_jabatan', 'sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $this->db->join('sicuti_user', 'sicuti_user.user_pegawai_id = sicuti_pegawai.pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function simpan($data)
    {
      $this->db->insert('tb_izin',$data);
    }
    public function setujui($data,$id)
    {
      $this->db->where('cuti_pegawai_id',$id);
      $this->db->update('tb_izin',$data);
    }
    public function tolak($data,$id)
    {
      $this->db->where('cuti_pegawai_id',$id);
      $this->db->update('tb_izin',$data);
    }
  }


 ?>
