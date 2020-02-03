<?php /**
 *
 */
class UnitModel extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function tampil()
  {
    $this->db->from('sicuti_unit');
    $query = $this->db->get();
    return $query->result_array();
  }
  function simpan($data)
  {
    $this->db->insert('sicuti_unit', $data);
  }
  public function hapus($id)
  {
    $this->db->delete('sicuti_unit',$id);
  }
}
 ?>
