<?php
  /**
   *
   */
  class IzinController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model('IzinModel');
      $this->load->model('PegawaiModel');
    }
    public function index()
    {
      // $data['batasHari'] = $this->CutiModel->batas_id();
      $data['izin'] = $this->IzinModel->tampil();
      $this->load->view("templates/header");
      $this->load->view("izin/index",$data);
      $this->load->view("templates/footer");
    }
    public function tambah()
    {
      if (isset($_POST['simpan'])) {
        $jamMulai = $this->input->post('jamMulai');
        $jamSelesai = $this->input->post('jamSelesai');
        date_default_timezone_set('Asia/Jakarta');
        $jampengajuan = date('Y-m-d');
        // var_dump($jampengajuan);die;

        $mulai = new DateTime($jamMulai);
        $selesai = new DateTime($jamSelesai);
        $diff = $mulai->diff($selesai)->h;
        $a = $mulai->format('H');
        $b = $selesai->format('H');

        $data = array(
          'izin_pegawai_id'=>$this->input->post('pegawai'),
          'izin_jenis'=>$this->input->post('jenisizin'),
          'izin_jam_mulai'=>$jamMulai,
          'izin_jam_selesai'=>$jamSelesai,
          'izin_selama'=>$diff,
          'izin_tgl_pengajuan'=>$jampengajuan,
          'izin_perihal'=>$this->input->post('perihal'),
        );


        // var_dump($a);die;
        if ($a > 7) {
          if ($a < 16 && $b < 16 ) {
            $this->IzinModel->simpan($data);
            $this->session->set_flashdata('alert', 'berhasil_tambah');
            redirect('izin');
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('izin');
          }
        }else {
          $this->session->set_flashdata('alert', 'gagall_tambah');
          redirect('izin');
        }

      }
      $data['pegawai'] = $this->PegawaiModel->tampil();
      $this->load->view('templates/header');
      $this->load->view('izin/tambah',$data);
      $this->load->view('templates/footer');
    }
    public function pimpinan_setujui($id)
    {
      $data = array(
        'izin_status_pimpinan'=>'disetujui'
      );
      $this->IzinModel->setujui($data,$id);
      $this->session->set_flashdata('alert', 'berhasil_setuju');
      redirect('izin');
    }
    public function kepbid_setujui($id)
    {
      $data = array(
        'izin_status_kepala_bidang'=>'disetujui'
      );
      $this->IzinModel->setujui($data,$id);
      $this->session->set_flashdata('alert', 'berhasil_setuju');
      redirect('izin');
    }
    public function pimpinan_tolak($id)
    {
      $data = array(
        'cuti_status_pimpinan'=>'tidak disetujui'
      );
      $this->IzinModel->tolak($data,$id);
      $this->session->set_flashdata('alert', 'tolak');
      redirect('izin');
    }
    public function kepbid_tolak($id)
    {
      $data = array(
        'cuti_status_kepala_bidang'=>'tidak disetujui'
      );
      $this->IzinModel->tolak($data,$id);
      $this->session->set_flashdata('alert', 'tolak');
      redirect('izin');
    }
    public function lihat($id)
    {
      $data['kepala'] = $this->IzinModel->kepala();
      $data['row'] = $this->IzinModel->lihat($id);
      $this->load->view('templates/header');
      $this->load->view('izin/lihat',$data);
      $this->load->view('templates/footer');
    }
    public function laporan()
    {
      $data['izin'] = $this->IzinModel->tampil();
      $this->load->view("templates/header");
      $this->load->view("izin/laporan",$data);
      $this->load->view("templates/footer");
    }
  }

 ?>
