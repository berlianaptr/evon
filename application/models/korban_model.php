 <?php
/*defined('BASEPATH') OR exit('No direct script access allowed'); */

class Korban_model extends CI_Model {

	public function getKorban($table_name) {
		//$getKorban = $this->db->get($table_name);
		/* $query=$this->db->join('tim_sar','tim_sar.id_timsar=korban.id_timsar')
						->join('jenis_korban','jenis_korban.id_jenis=korban.id_jenis')
						->join('rumah_sakit','rumah_sakit.id_rs=korban.id_rs')
						->get('korban');
		
		$query2=$this->db->join('tim_sar','tim_sar.id_timsar=korban.id_timsar')
						 ->join('jenis_korban','jenis_korban.id_jenis=korban.id_jenis')
						 ->join('posko','posko.id_posko=korban.id_posko')
						 ->get('korban'); */
		$getKorban = $this->db->get($table_name);
		$query2=$this->db->query('SELECT korban.id_korban, tim_sar.nama_timsar id_timsar, jenis_korban.nama_jenis id_jenis, korban.jumlah_korban, korban.lokasi_korban , korban.tanggal_korban, posko.nama_posko id_posko, korban.id_rs
FROM korban
JOIN tim_sar ON korban.id_timsar = tim_sar.id_timsar
JOIN jenis_korban ON korban.id_jenis = jenis_korban.id_jenis
JOIN posko ON korban.id_posko = posko.id_posko
');

		$query=$this->db->query('SELECT korban.id_korban, tim_sar.nama_timsar id_timsar, jenis_korban.nama_jenis id_jenis, korban.jumlah_korban, korban.lokasi_korban ,korban.tanggal_korban, rumah_sakit.nama_rs id_rs, korban.id_posko
FROM korban
JOIN tim_sar ON korban.id_timsar = tim_sar.id_timsar
JOIN jenis_korban ON korban.id_jenis = jenis_korban.id_jenis
JOIN rumah_sakit ON korban.id_rs = rumah_sakit.id_rs 
'); 
		//return $getKorban->result_array();
		if($query->num_rows()>0 || $query2->num_rows()>0) {
			$result = array_merge($query->result_array(), $query2->result_array());
		}
		return $result;
	}

	public function jenisKorban() {
		$query = $this->db->get('jenis_korban');
		return $query->result();
	}

	public function timSar() {
		$query = $this->db->get('tim_sar');
		return $query->result();
	}

	public function tambahData($table_name, $data) {
		
		$tambah = $this->db->insert($table_name, $data);
		return $tambah;
	}

	public function hapusData($table_name, $id) {
		$this->db->where('id_korban', $id);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}

	public function editData($table_name, $data, $id) {
		$this->db->where('id_korban', $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function dataEdit($table_name, $id)
	{
		$this->db->where('id_korban', $id);
		$getKorban = $this->db->get($table_name);
		return $getKorban->row();
	}
}