<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rs_Controller extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->library('session');

	}


public function datars(){
		$this->data['hasil'] = $this->rs_model->getRS('rumah_sakit');
		$this->load->view('rumahsakit/view_rs',$this->data);	
	}

public function input_rs(){
		$this->load->view('rumahsakit/form_rs');
	}

	public function insert_rs() {
		$nama_rs = $_POST['nama_rs'];
		$alamat_rs = $_POST['alamat_rs'];
		$ketersediaan_rs = $_POST['ketersediaan_rs'];
		$data = array(
			'nama_rs' => $nama_rs, 
			'alamat_rs' => $alamat_rs, 
			'ketersediaan_rs' => $ketersediaan_rs
		);
		$tambah = $this->rs_model->tambahData('rumah_sakit', $data);
		if ($tambah > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
			redirect('rs_controller/datars');	
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function delete($id) {
		$hapus = $this->rs_model->hapusData('rumah_sakit', $id);
		if($hapus > 0) {
			redirect('rs_controller/datars');	
		} else {
			echo 'Gagal dihapus';
		}
	}	

	public function edit_rs($id) {
		$this->data['dataEdit'] = $this->rs_model->dataEdit('rumah_sakit', $id);
		$this->load->view('rumahsakit/edit_rs', $this->data);
	}

	public function update($id) {
		//$nama_rs = $_POST['nama_rs'];
		//$alamat_rs = $_POST['alamat_rs'];
		$ketersediaan_rs = $_POST['ketersediaan_rs'];
		$data = array(
			//'nama_rs' => $nama_rs, 
			//'alamat_rs' => $alamat_rs, 
			'ketersediaan_rs' => $ketersediaan_rs
		);
		$edit = $this->rs_model->editData('rumah_sakit', $data, $id);
		if($edit > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Diubah');
			redirect('rs_controller/datars');
		} else {
			echo 'Gagal diedit';
		}
	}

	public function hasil(){
		$getRS=$this->rs_model->kuota();
		$konversi_kuota= Array();
		if($_POST['id_jenis']==1){
			$nilai_korban = 0.01;
		} else if ($_POST['id_jenis']==2){
			$nilai_korban = 0.02;
		} else if ($_POST['id_jenis']==3){
			$nilai_korban = 0.03;
		} else if ($_POST['id_jenis']==4){
			$nilai_korban = 0.0;
		}
		//print_r($getRS);
		foreach($getRS as $RS){
			$konversi_kuota[$RS->id_rs]=($_POST['jumlah_korban']/$RS->ketersediaan_rs) + $RS->jarak_rs + $nilai_korban;
			//echo $RS->jarak_rs + $nilai_korban + ;
		}
		print_r($konversi_kuota);
	}

} 
