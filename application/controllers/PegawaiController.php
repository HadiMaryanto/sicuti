<?php
	/**
		*
		*/
		class PegawaiController extends CI_Controller
		{

			function __construct()
			{
				parent::__construct();
				$this->load->model('PegawaiModel');
				$this->load->model('JabatanModel');
				$this->load->model('UnitModel');
			}

			public function index()
			{
				$data['pegawai'] = $this->PegawaiModel->tampil();
				$this->load->view('templates/header');
				$this->load->view('pegawai/index',$data);
				$this->load->view('templates/footer');
			}
			public function tambah()
			{
				if (isset($_POST['simpan'])) {
					$data = array(
						'pegawai_jabatan_id'=>$this->input->post("jabatan"),
						'pegawai_unit_id'=>$this->input->post("unit"),
						'pegawai_nama'=>$this->input->post("namapegawai"),
						'pegawai_nip'=>$this->input->post("nip"),
						'pegawai_golongan'=>$this->input->post("golongan"),
						'pegawai_nohp'=>$this->input->post("nohp"),
						'pegawai_TMT'=>$this->input	->post("tmt"),
						'pegawai_alamat'=>$this->input->post("alamat")
					);
					$this->PegawaiModel->simpan($data);
					$this->session->set_flashdata('alert', 'berhasil_tambah');
	        redirect('pegawai');
				}
				$data['jabatan'] = $this->JabatanModel->tampil();
				$data['unit'] = $this->UnitModel->tampil();
	      $this->load->view('templates/header');
	      $this->load->view('pegawai/tambah',$data);
	      $this->load->view('templates/footer');
			}
			public function edit($id)
			{
				if (isset($_POST['simpan'])) {
					$data = array(
						'pegawai_nama'=>$this->input->post("namapegawai"),
						'pegawai_nip'=>$this->input->post("nip"),
						'pegawai_golongan'=>$this->input->post("golongan"),
						'pegawai_nohp'=>$this->input->post("nohp"),
						'pegawai_alamat'=>$this->input->post("alamat")
					);
					$this->PegawaiModel->ubah($data,$id);
					$this->session->set_flashdata('alert', 'berhasil_edit');
	        redirect('pegawai');
				}else {
	        $data['row'] = $this->PegawaiModel->get_id($id)->row_array();
	        $this->load->view('templates/header');
	        $this->load->view('pegawai/edit',$data);
	        $this->load->view('templates/footer');
	      }
			}
			function delete($id)
	    {
	      $data = array("pegawai_id"=>$id);
	      $this->PegawaiModel->delete($data);
	      $this->session->set_flashdata('alert', 'berhasil_hapus');
	      redirect('pegawai');
	    }
			// public function aktif($id)
			// {
			// 	$
			// }
		}

 ?>
