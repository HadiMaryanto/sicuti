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
      $this->load->model('AkunModel');
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
      // $user1 = 'perencanaan';
      // $user2 = 'organisasi';
      // $user3 = 'informasi';
      // $user4 = 'hukum';
      // $user5 = 'umum';
      // $user6 = 'pendidikan madrasah';
      // $user7 = 'pendidikan keagamaan';
      // $user8 = 'haji dan umrah';
      // $user9 = 'urusan agama';
      // $user10 = 'penerangan agama';
      // $user11 = 'masyarakat kristen';
      // $user12 = 'masyarakat hindu';
      // $user13 = 'masyarakat katolik';
      // $user14 = 'masyarakat budha';
      //
      // $userA = $this->IzinModel->userA($user1);
      // $userB = $this->IzinModel->userB($user2);
      // $userC = $this->IzinModel->userC($user3);
      // $userD = $this->IzinModel->userD($user4);
      // $userE = $this->IzinModel->userE($user5);
      // $userF = $this->IzinModel->userF($user6);
      // $userG = $this->IzinModel->userG($user7);
      // $userH = $this->IzinModel->userH($user8);
      // $userI = $this->IzinModel->userI($user9);
      // $userJ = $this->IzinModel->userJ($user10);
      // $userK = $this->IzinModel->userK($user11);
      // $userL = $this->IzinModel->userL($user12);
      // $userM = $this->IzinModel->userM($user13);
      // $userN = $this->IzinModel->userN($user14);
      //
      // $data['userA'] = $userA;
      // $data['userB'] = $userB;
      // $data['userC'] = $userC;
      // $data['userD'] = $userD;
      // $data['userE'] = $userE;
      // $data['userF'] = $userF;
      // $data['userG'] = $userG;
      // $data['userH'] = $userH;
      // $data['userI'] = $userI;
      // $data['userJ'] = $userJ;
      // $data['userK'] = $userK;
      // $data['userL'] = $userL;
      // $data['userM'] = $userM;
      // $data['userN'] = $userN;

      // var_dump($data);die;
      $getData = $this->IzinModel->lihat($id);
      $id_pegawai = $getData['izin_pegawai_id'];
      $hubungan = $getData['user_level_hubungan'];
      $data['sub_pimpinan'] = $this->AkunModel->get_dinamic_data('user_level',$hubungan);
      
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

    public function cetak($id)
    {
      $this->load->library('mypdf');

      $getData = $this->IzinModel->lihat($id);
      $id_pegawai = $getData['izin_pegawai_id'];
      $hubungan = $getData['user_level_hubungan'];
      $data['sub_pimpinan'] = $this->AkunModel->get_dinamic_data('user_level',$hubungan);
      // echo "<pre>";
      // var_dump($sub_pimpinan);exit();

      $data['row'] = $this->IzinModel->lihat($id);
      $data['kepala'] = $this->IzinModel->kepala();
      $this->load->view('templates/header');
      $this->load->view('izin/cetak',$data);
      $this->mypdf->generate('izin/cetak', $data, 'surat_cuti', 'A4', 'portrait');
      $this->load->view('templates/footer');
    }
  }

 ?>
