<?php
  /**
   *
   */
  class CutiModel extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }
    public function tampil()
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->join('sicuti_jabatan', 'sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $this->db->join('sicuti_user', 'sicuti_user.user_pegawai_id = sicuti_pegawai.pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function simpan($data)
    {
      $this->db->insert('tb_cuti',$data);
    }
    public function ambil_id($id)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->join('sicuti_user', 'sicuti_user.user_pegawai_id = sicuti_pegawai.pegawai_id');
      $this->db->where('cuti_pegawai_id',$id);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function validasi($pegawai_id, $jenis, $tgl)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->where('cuti_tahun',$tgl);
      $this->db->where('cuti_jenis',$jenis);
      $this->db->like('pegawai_id',$pegawai_id);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function cekdate($id, $thn)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->where('pegawai_id',$id);
      $this->db->like('cuti_tahun',$thn);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function tes2($id, $thn)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->where('pegawai_id',$id);
      $this->db->like('cuti_tahun',$thn);
      $query = $this->db->get();
      return $query->row_array();
    }
    public function batas($id)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->where('pegawai_id',$id);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function batas_id()
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $query = $this->db->get();
      return $query->result_array();
    }
    public function tes($id, $jenis, $thn)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai','sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->where('pegawai_id',$id);
      $this->db->where('cuti_tahun', $thn);
      $this->db->like('cuti_jenis',$jenis);
      $query = $this->db->get();
      return $query->result_array();
    }
    public function setujui($data,$id)
    {
      $this->db->where('cuti_pegawai_id',$id);
      $this->db->update('tb_cuti',$data);
    }
    public function tolak($data,$id)
    {
      $this->db->where('cuti_pegawai_id',$id);
      $this->db->update('tb_cuti',$data);
    }
    public function lihat($id)
    {
      $this->db->from('tb_cuti');
      $this->db->join('sicuti_pegawai', 'sicuti_pegawai.pegawai_id = tb_cuti.cuti_pegawai_id');
      $this->db->join('sicuti_jabatan', 'sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
      $this->db->join('sicuti_user', 'sicuti_user.user_pegawai_id = sicuti_pegawai.pegawai_id');
      $this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
      // $this->db->order_by('cuti_tanggal_dibuat','desc');
      $this->db->where('cuti_id',$id);
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
