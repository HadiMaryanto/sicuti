<?php
	/**
		*
		*/
		class PegawaiModel extends CI_Model
		{

			function __construct()
			{
				parent::__construct();
				$this->load->database();
			}

			public function tampil()
			{
				$this->db->from('sicuti_pegawai');
				$this->db->join('sicuti_jabatan','sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
				$this->db->join('sicuti_unit', 'sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
				$this->db->order_by('pegawai_date_created','desc');
				$query = $this->db->get();
				return $query->result_array();
			}

			public function cek()
			{
				$this->db->from('sicuti_pegawai');
				$this->db->join('sicuti_user','sicuti_pegawai.pegawai_id = sicuti_user.user_pegawai_id','left');
				$this->db->order_by('pegawai_date_created','desc');
				$query = $this->db->get();
				return $query->result_array();
			}
			public function simpan($data)
			{
				$this->db->insert('sicuti_pegawai',$data);
			}
			function get_id($id)
	    {
	      $this->db->join('sicuti_jabatan','sicuti_jabatan.jabatan_id = sicuti_pegawai.pegawai_jabatan_id');
				$this->db->join('sicuti_unit','sicuti_unit.unit_id = sicuti_pegawai.pegawai_unit_id');
	      $dapat = array('pegawai_id'=>$id);
	      return $this->db->get_where('sicuti_pegawai',$dapat);
	    }
			public function ubah($data, $id)
			{
				$this->db->where('pegawai_id',$id);
				$this->db->update('sicuti_pegawai',$data);
			}
			public function delete($id)
			{
				$this->db->delete('sicuti_pegawai',$id);
			}
		}


 ?>
