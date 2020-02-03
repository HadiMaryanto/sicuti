<?php /**
 *
 */
class JabatanModel extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function tampil()
  {
    $this->db->from('sicuti_jabatan');
    $query = $this->db->get();
    return $query->result_array();
  }
  function simpan($data)
  {
    $this->db->insert('sicuti_jabatan', $data);
  }
  public function hapus($id)
  {
    $this->db->delete('sicuti_jabatan',$id);
  }

}
 ?>
