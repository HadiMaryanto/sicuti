<?php /**
 *
 */
class UnitController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('UnitModel');
  }
  public function index()
  {
    $data['unit'] = $this->UnitModel->tampil();
    $this->load->view('templates/header');
    $this->load->view('unit/index',$data);
    $this->load->view('templates/footer');
  }
  public function tambah()
  {
    if (isset($_POST['submit'])) {
      $data = array('unit_kerja'=>$this->input->post('unit'));
      $this->UnitModel->simpan($data);
      $this->session->set_flashdata('alert', 'berhasil_tambah');
      redirect('unit');
    }
    // $data['jabatan'] = $this->JabatanModel->tampildata();
    $this->load->view('templates/header');
    $this->load->view('unit',$data);
    $this->load->view('templates/footer');
  }
  public function delete($id)
  {
    $data = array("unit_id"=>$id);
    $this->UnitModel->hapus($data);
    $this->session->set_flashdata('alert', 'berhasil_hapus');
    redirect('unit');
  }
}
 ?>
