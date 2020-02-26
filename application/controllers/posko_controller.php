<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posko_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');

	}

	public function datapsk(){
		$hasil = $this->posko_model->getPosko('posko');
		$this->load->view('posko/view_posko',compact('hasil'));	
		//print_r($hasil);
	}

	public function input_posko(){
		$this->load->view('posko/form_posko');
	}

	public function insert_posko() {
		$nama_posko = $_POST['nama_posko'];
		$alamat_posko = $_POST['alamat_posko'];
		$ketersediaan_posko = $_POST['ketersediaan_posko'];
		$data = array(
			'nama_posko' => $nama_posko,
			'alamat_posko' => $alamat_posko, 
			'ketersediaan_posko' => $ketersediaan_posko
		);
		$tambah = $this->posko_model->tambahData('posko', $data);
		if ($tambah > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
			redirect('posko_controller/datapsk');	
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function delete($id) {
		$hapus = $this->posko_model->hapusData('posko', $id);
		if($hapus > 0) {
			redirect('posko_controller/datapsk');	
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function edit_posko($id) {
		$this->data['dataEdit'] = $this->posko_model->dataEdit('posko', $id);
		$this->load->view('posko/edit_posko', $this->data);
	}

	public function update($id) {
		//$nama_posko = $_POST['nama_posko'];
		//$alamat_posko = $_POST['alamat_posko'];
		$ketersediaan_posko = $_POST['ketersediaan_posko'];
		$data = array(
			//'nama_posko' => $nama_posko, 
			//'alamat_posko' => $alamat_posko, 
			'ketersediaan_posko' => $ketersediaan_posko
		);
		$edit = $this->posko_model->editData('posko', $data, $id);
		if($edit > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Diubah');
			redirect('posko_controller/datapsk');
		} else {
			echo 'Gagal diedit';
		}
	}
}
