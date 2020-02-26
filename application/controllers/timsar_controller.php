<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timsar_Controller extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->library('session');

	}

public function datatimsar(){
		$this->data['hasil'] = $this->timsar_model->getTimsar('tim_sar');
		$this->load->view('timsar/view_timsar',$this->data);	
	}

public function input_timsar(){
		$this->load->view('timsar/form_timsar');
	}

public function insert_timsar() {
		$nama_timsar = $_POST['nama_timsar'];
		$no_hp = $_POST['no_hp'];
		$data = array(
			'nama_timsar' => $nama_timsar, 
			'no_hp' => $no_hp 
		);
		$tambah = $this->timsar_model->tambahData('tim_sar', $data);
		if ($tambah > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
			redirect('timsar_controller/datatimsar');	
		} else {
			echo 'Gagal disimpan';
		}
	}

public function delete($id) {
		$hapus = $this->timsar_model->hapusData('tim_sar', $id);
		if($hapus > 0) {
			redirect('timsar_controller/datatimsar');	
		} else {
			echo 'Gagal dihapus';
		}
	}

public function edit_timsar($id = null) {
		$this->data['dataEdit'] = $this->timsar_model->dataEdit('tim_sar', $id);
		$this->load->view('timsar/edit_timsar', $this->data);
	}

public function update($id) {
		$nama_timsar = $_POST['nama_timsar'];
		$no_hp = $_POST['no_hp'];
		$data = array(
			'nama_timsar' => $nama_timsar,
			'no_hp' => $no_hp
		);
		$edit = $this->timsar_model->editData('tim_sar', $data, $id);
		if($edit > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Diubah');
			redirect('timsar_controller/datatimsar');
		} else {
			echo 'Gagal diedit';
		}
	}	
} 
