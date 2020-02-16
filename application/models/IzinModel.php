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
      $this->db->order_by('izin_tanggal_dibuat','desc');
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
    public function countIzin($konfirmasi)
    {
      $this->db->from('tb_izin');
      $this->db->where('izin_status_pimpinan',$konfirmasi);
      $this->db->where('izin_status_kepala_bidang',$konfirmasi);
      $query = $this->db->get();
      return $query->num_rows();
    }
    public function konfirIzin($konfirmasi)
    {
      $this->db->from('tb_izin');
      $this->db->where('izin_status_pimpinan',$konfirmasi);
      $this->db->where('izin_status_kepala_bidang',$konfirmasi);
      $query = $this->db->get();
      return $query->num_rows();
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
      $this->db->join('sicuti_jabatan', 'sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userA($user1)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user1);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userB($user2)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user2);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userC($user3)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user3);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userD($user4)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user4);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userE($user5)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user5);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userF($user6)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user6);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userG($user7)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user7);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userH($user8)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user8);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userI($user9)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user9);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userJ($user10)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user10);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userK($user11)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user11);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userL($user12)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user12);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userM($user13)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user13);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function userN($user14)
    {
      $this->db->from('sicuti_user');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $this->db->where('user_level',$user14);
      $query = $this->db->get();
      return $query->row_array();
    }
  }



 ?>
