<?php /**
 *
 */
class JabatanController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('JabatanModel');
  }
  public function index()
  {
    $data['jabatan'] = $this->JabatanModel->tampil();
    $this->load->view('templates/header');
    $this->load->view('jabatan/index',$data);
    $this->load->view('templates/footer');
  }
  public function tambah()
  {
    if (isset($_POST['submit'])) {
      $data = array(
        'jabatan_nama'=>$this->input->post('jabatan'),
        'jabatan_level'=>$this->input->post('level')
    );
      $this->JabatanModel->simpan($data);
      $this->session->set_flashdata('alert', 'berhasil_tambah');
      redirect('jabatan');
    }
    // $data['jabatan'] = $this->JabatanModel->tampildata();
    $this->load->view('templates/header');
    $this->load->view('jabatan',$data);
    $this->load->view('templates/footer');
  }
  public function delete($id)
  {
    $data = array("jabatan_id"=>$id);
    $this->JabatanModel->hapus($data);
    $this->session->set_flashdata('alert', 'berhasil_hapus');
    redirect('jabatan');
  }
}
 ?>
