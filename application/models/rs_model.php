 <?php
/*defined('BASEPATH') OR exit('No direct script access allowed'); */

class Rs_model extends CI_Model {

	public function getRS($table_name) {
		$getRS = $this->db->get($table_name);
		return $getRS->result_array();
	}


	public function tambahData($table_name, $data) {
		$tambah = $this->db->insert($table_name, $data);
		return $tambah;
	
	}

	public function hapusData($table_name, $id) {
		$this->db->where('id_rs', $id);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}
	
	public function editData($table_name, $data, $id) {
		$this->db->where('id_rs', $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function dataEdit($table_name, $id)
	{
		$this->db->where('id_rs', $id);
		$getRS = $this->db->get($table_name);
		return $getRS->row();
	}
	public function kuota(){
		$getRS=$this->db->get('rumah_sakit');

		if ($getRS->num_rows()>0) {
			return $getRS->result();
		} else{
			return Array();
		}
	}
}  
?>