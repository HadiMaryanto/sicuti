<?php
  /**
   *
   */
  class CutiController extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->model("CutiModel");
      $this->load->model("PegawaiModel");
    }
    public function index()
    {
      // var_dump($this->session->userdata('pegawai_id'));die;
      $data['batasHari'] = $this->CutiModel->batas_id();
      $data['cuti'] = $this->CutiModel->tampil();
      $this->load->view("templates/header");
      $this->load->view("cuti/index",$data);
      $this->load->view("templates/footer");
    }
    public function tambah()
    {
      if (isset($_POST['simpan'])) {
        $tgl = $this->input->post('tgl');
        $pecah = explode(" ", $tgl);
        $date = date('Y');

        $tgmulai = new DateTime($pecah[0]);
        $tgselesai = new DateTime($pecah[2]);
        $diff2 = $tgmulai->diff($tgselesai);

        $dateranges = new DatePeriod($tgmulai, new DateInterval('P1D'), $tgselesai);
        $i = 0;
        $t = 1;
        $tgselesai = 1;

        foreach ($dateranges as $dates) {
          $dateranges = $dates->format("Y-m-d");
          $datetimes = DateTime::createFromFormat('Y-m-d', $dateranges);
          $days = $datetimes->format('D');

          if ($days != "Sun" && $days != "Sat") {
            $t += $tgselesai-$i;
          }
          $tgselesai++;
          $i++;
        }

        $cuti_id = $this->input->post('pegawai');
        $data = array(
          'cuti_pegawai_id'=>$this->input->post('pegawai'),
          'cuti_jenis'=>$this->input->post('jeniscuti'),
          'cuti_tgl_mulai'=>$pecah[0],
          'cuti_tgl_selesai'=>$pecah[2],
          'cuti_selama'=>$t,
          'cuti_tahun'=>$date,
          'cuti_alasan'=>$this->input->post('alasancuti')
        );
        $pegawai = $this->PegawaiModel->get_id($cuti_id)->row_array();
        $awal = new DateTime($pegawai['pegawai_TMT']);
        $akhir = new DateTime();
        $diff = $awal->diff($akhir);

        $tglmulai = new DateTime($pecah[0]);
        $tglselesai = new DateTime($pecah[2]);
        $diff2 = $tglmulai->diff($tglselesai);

        $daterange = new DatePeriod($tglmulai, new DateInterval('P1D'), $tglselesai);
        $i = 0;
        $x = 1;
        $tglselesai = 1;

        foreach ($daterange as $date) {
          $daterange = $date->format("Y-m-d");
          $datetime = DateTime::createFromFormat('Y-m-d', $daterange);
          $day = $datetime->format('D');

          if ($day != "Sun" && $day != "Sat") {

            $x += $tglselesai-$i;
          }
          $tglselesai++;
          $i++;
        }
        $batas = $this->CutiModel->batas($data['cuti_pegawai_id']);
        $totalhari = 0;
        foreach ($batas as $key => $value) {
          if ($value['cuti_jenis'] == 'Cuti Tahunan') {
            $totalhari = $totalhari + $value['cuti_selama'];
          }
        }
        $totalhari = $totalhari + $data['cuti_selama'];

        $validasi = $this->CutiModel->validasi($data['cuti_pegawai_id'], $data['cuti_jenis'], $data['cuti_tahun']);
        // $umt = var_dump($validasi['cuti_jenis']);die;
        $tes = $this->CutiModel->tes($data['cuti_pegawai_id'], $data['cuti_jenis'], $data['cuti_tahun']);
        $tes2 = $this->CutiModel->tes2($data['cuti_pegawai_id'], $data['cuti_tahun']);
        $cekdate = $this->CutiModel->cekdate($data['cuti_pegawai_id'], $data['cuti_tahun']);

        if($data['cuti_jenis'] == "Cuti Tahunan"){
          if ($diff->y >= 1) {
            if ($x <=12) {
              if ($tes2['cuti_jenis'] == "Cuti Besar") {
                if ($tes2['cuti_jenis'] == null && $tes2['cuti_tahun'] == null) {
                  $this->CutiModel->simpan($data);
                  $this->session->set_flashdata('alert', 'berhasil_tambah');
                  redirect('cuti');
                }else {
                    $this->session->set_flashdata('alert', 'gagall_tambah');
                    redirect('cuti');
                }
              }else {
                if ($data['cuti_jenis'] == "Cuti Tahunan") {
                  // var_dump($totalhari);die;
                  if ($totalhari <=12) {
                    $this->CutiModel->simpan($data);
                    $this->session->set_flashdata('alert', 'berhasil_tambah');
                    redirect('cuti');
                  }else {
                      $this->session->set_flashdata('alert', 'gagall_tambah');
                      redirect('cuti');
                  }
                }else {
                    $this->session->set_flashdata('alert', 'gagall_tambah');
                    redirect('cuti');
                }
              }
            }else {
              $this->session->set_flashdata('alert', 'gagall_tambah');
              redirect('cuti');
            }
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('cuti');
          }
        }elseif ($data['cuti_jenis'] == "Cuti Besar") {
          if ($diff->y >= 6) {
            if ($diff2->m <= 3) {
              // var_dump($cekdate);die;
              if ($validasi == null) {
                $this->CutiModel->simpan($data);
                $this->session->set_flashdata('alert', 'berhasil_tambah');
                redirect('cuti');
              }else {
                $this->session->set_flashdata('alert', 'gagall_tambah');
                redirect('cuti');
              }
            }else {
              $this->session->set_flashdata('alert', 'gagall_tambah');
              redirect('cuti');
            }
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('cuti');
          }
        }elseif ($data['cuti_jenis'] == "Cuti Sakit") {
          if ($x <= 14) {
            $this->CutiModel->simpan($data);
            $this->session->set_flashdata('alert', 'berhasil_tambah');
            redirect('cuti');
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('cuti');
          }
        }elseif ($data['cuti_jenis'] == "Cuti Melahirkan") {
          if ($diff2->m <= 3) {
            $this->CutiModel->simpan($data);
            $this->session->set_flashdata('alert', 'berhasil_tambah');
            redirect('cuti');
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('cuti');
          }
        }elseif ($data['cuti_jenis'] == "Cuti Karena Alasan Penting") {
          if ($diff2->m <= 2) {
            $this->CutiModel->simpan($data);
            $this->session->set_flashdata('alert', 'berhasil_tambah');
            redirect('cuti');
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('cuti');
          }
        }elseif ($data['cuti_jenis'] == "Cuti di Luar Tanggungan Negara") {
          if ($diff->y >= 5) {
            if ($diff2->y <= 3) {
              $this->CutiModel->simpan($data);
              $this->session->set_flashdata('alert', 'berhasil_tambah');
              redirect('cuti');
            }else {
              $this->session->set_flashdata('alert', 'gagall_tambah');
              redirect('cuti');
            }
          }else {
            $this->session->set_flashdata('alert', 'gagall_tambah');
            redirect('cuti');
          }
        }

      }
      $data['pegawai'] = $this->PegawaiModel->tampil();
      $this->load->view('templates/header');
      $this->load->view('cuti/tambah',$data);
      $this->load->view('templates/footer');
    }
    public function pimpinan_setujui($id)
    {
      $data = array(
        'cuti_status_pimpinan'=>'disetujui'
      );
      $this->CutiModel->setujui($data,$id);
      $this->session->set_flashdata('alert', 'berhasil_setuju');
      redirect('cuti');
    }
    public function kepbid_setujui($id)
    {
      $data = array(
        'cuti_status_kepala_bidang'=>'disetujui'
      );
      $this->CutiModel->setujui($data,$id);
      $this->session->set_flashdata('alert', 'berhasil_setuju');
      redirect('cuti');
    }
    public function pimpinan_tolak($id)
    {
      $data = array(
        'cuti_status_pimpinan'=>'tidak disetujui'
      );
      $this->CutiModel->tolak($data,$id);
      $this->session->set_flashdata('alert', 'tolak');
      redirect('cuti');
    }
    public function kepbid_tolak($id)
    {
      $data = array(
        'cuti_status_kepala_bidang'=>'tidak disetujui'
      );
      $this->CutiModel->tolak($data,$id);
      $this->session->set_flashdata('alert', 'tolak');
      redirect('cuti');
    }
    public function cetak($id)
    {
      $this->load->library('mypdf');
      $data['row'] = $this->CutiModel->lihat($id);
      $data['kepala'] = $this->CutiModel->kepala();
      $this->load->view('templates/header');
      $this->load->view('cuti/cetak',$data);
      $this->mypdf->generate('cuti/cetak', $data, 'surat_cuti', 'A4', 'portrait');
      $this->load->view('templates/footer');
    }
    public function lihat($id)
    {
      $data['kepala'] = $this->CutiModel->kepala();
      $data['row'] = $this->CutiModel->lihat($id);
      $this->load->view('templates/header');
      $this->load->view('cuti/lihat',$data);
      $this->load->view('templates/footer');
    }
    public function laporan()
    {
      // $data['batasHari'] = $this->CutiModel->batas_id();
      $data['cuti'] = $this->CutiModel->tampil();
      $this->load->view("templates/header");
      $this->load->view("cuti/laporan",$data);
      $this->load->view("templates/footer");
    }
  }

 ?>
