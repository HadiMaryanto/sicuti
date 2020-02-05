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
      $this->db->order_by('cuti_tanggal_dibuat','desc');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function simpan($data)
    {
      $this->db->insert('tb_izin',$data);
    }
    public function setujui($data,$id)
    {
      $this->db->where('izin_pegawai_id',$id);
      $this->db->update('tb_izin',$data);
    }
    public function tolak($data,$id)
    {
      $this->db->where('izin_pegawai_id',$id);
      $this->db->update('tb_izin',$data);
    }
    public function lihat($id)
    {
      $this->db->from('tb_izin');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = tb_izin.izin_pegawai_id');
      $this->db->join('sicuti_jabatan', 'sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $this->db->join('sicuti_user', 'sicuti_user.user_pegawai_id = sicuti_pegawai.pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      // $this->db->order_by('cuti_tanggal_dibuat','desc');
      $this->db->where('izin_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function kepala()
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $query = $this->db->get();
      return $query->row_array();
    }
  }


 ?>
