<?php
  /**
   *
   */
  class AkunController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('AkunModel');
      $this->load->model('PegawaiModel');
    }
    public function index()
    {
      $data['pegawai'] = $this->PegawaiModel->tampil();
      $data['cek'] = $this->PegawaiModel->cek();
      $this->load->view('templates/header');
      $this->load->view('akun/akun',$data);
      $this->load->view('templates/footer');
    }
    public function aktif($id)
    {
      $ambil = $this->AkunModel->ambil_id($id);

      $username = $ambil['pegawai_nip'];
      $password = $ambil['pegawai_nip'];
      $idpeg = $ambil['pegawai_id'];
      $level = $this->input->post('level');

      $data = array(
        'user_username'=>$username,
        'user_password'=>md5($password),
        'user_pegawai_id'=>$idpeg,
        'user_level'=>$level
      );
      $this->AkunModel->aktifkan($data);
      $this->session->set_flashdata('alert', 'berhasil_aktif');
      redirect('akun');
    }
    public function profil()
    {
      $data['profil'] = $this->AkunModel->id_ambil();
      $this->load->view('templates/header');
      $this->load->view('akun/profil',$data);
      $this->load->view('templates/footer');
    }
    public function ganti($id)
    {
      if (isset($_POST['rubah'])) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
          'user_username'=>$username,
          'user_password'=>md5($password)
        );
        $ganti = $this->AkunModel->ganti($id,$data);
        $this->session->set_flashdata('alert', 'success_ganti');
        redirect('profil');
      }
    }
  }

 ?>
