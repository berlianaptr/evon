 <?php
/*defined('BASEPATH') OR exit('No direct script access allowed'); */

class Timsar_model extends CI_Model {

	public function getTimsar($table_name) {
		$getTimsar = $this->db->get($table_name);
		return $getTimsar->result_array();
	}

	public function tambahData($table_name, $data) {
		$tambah = $this->db->insert($table_name, $data);
		return $tambah;
	}

	public function hapusData($table_name, $id) {
		$this->db->where('id_timsar', $id);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}

	public function editData($table_name, $data, $id) {
		$this->db->where('id_timsar', $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function dataEdit($table_name, $id)
	{
		$this->db->where('id_timsar', $id);
		$getTimsar = $this->db->get($table_name);
		return $getTimsar->row();
	}
}  
