<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Korban_Controller extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->library('session');

	}

public function datakorban(){
		$this->data['hasil'] = $this->korban_model->getKorban('korban');
		$this->load->view('korban/view_korban',$this->data);	
	}

public function input_korban(){
	$this->data['tambah_timsar'] = $this->korban_model->timSar('tim_sar');
	$this->data['tambah_jenis'] = $this->korban_model->jenisKorban('jenis_korban');
		$this->load->view('korban/form_korban', $this->data);
	}

public function insert_korban() {

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
		if ($nilai_korban != 0.01) {
			foreach($getRS as $RS){
			if ($_POST['jumlah_korban'] <= $RS->ketersediaan_rs) {
				$konversi_kuota[$RS->id_rs]=($_POST['jumlah_korban']/$RS->ketersediaan_rs) + $RS->jarak_rs + $nilai_korban;
			} else{
				$konversi_kuota[$RS->id_rs]= 0;
			}
			} $nilaiTerbesar=max($konversi_kuota);
			$indeksRS=array_search($nilaiTerbesar, $konversi_kuota);
			$indeksPosko=null;
		} else if($nilai_korban == 0.01){
			$getPosko=$this->posko_model->getPosko('posko');
			foreach ($getPosko as $Posko) {
				if($_POST['jumlah_korban'] <= $Posko->ketersediaan_posko){
					$konversi_kuota[$Posko->id_posko]=($_POST['jumlah_korban']/$Posko->ketersediaan_posko) + $Posko->jarak_posko;
				} else{
					$konversi_kuota[$Posko->id_posko]= 0;
				}
			} 
			$nilaiTerbesar=max($konversi_kuota);
			$indeksPosko=array_search($nilaiTerbesar, $konversi_kuota);
			$indeksRS=null;
		}
		

	
		$id_timsar = $_POST['id_timsar'];
		$id_jenis = $_POST['id_jenis'];
		$jumlah_korban = $_POST['jumlah_korban'];
		$lokasi_korban = $_POST['lokasi_korban'];
		$tanggal_korban = $_POST['tanggal_korban'];
		$data = array(
			'id_timsar' => $id_timsar, 
			'id_jenis' => $id_jenis,
			'jumlah_korban' => $jumlah_korban,
			'lokasi_korban' => $lokasi_korban,
			'tanggal_korban' => $tanggal_korban,
			'id_rs'=> $indeksRS,
			'id_posko' => $indeksPosko
		);
		$tambah = $this->korban_model->tambahData('korban', $data);
		if ($tambah > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
			redirect('korban_controller/datakorban');	
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function edit_korban($id) {
		$this->data['tambah_timsar'] = $this->korban_model->timSar('korban');
		$this->data['tambah_jenis'] = $this->korban_model->jenisKorban('korban');
		$this->data['dataEdit'] = $this->korban_model->dataEdit('korban', $id);
		$this->load->view('korban/edit_korban', $this->data);
	}

	public function update($id) {
		$id_timsar = $_POST['id_timsar'];
		//$id_jenis = $_POST['id_jenis'];
		$jumlah_korban = $_POST['jumlah_korban'];
		$lokasi_korban = $_POST['lokasi_korban'];
		$tanggal_korban = $_POST['tanggal_korban'];
		$data = array(
			'id_timsar' => $id_timsar, 
			//'id_jenis' => $id_jenis,
			'jumlah_korban' => $jumlah_korban,
			'lokasi_korban' => $lokasi_korban,
			'tanggal_korban' => $tanggal_korban
		);
		$edit = $this->korban_model->editData('korban', $data, $id);
		if($edit > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Diubah');
			redirect('korban_controller/datakorban');
		} else {
			$this->session->set_flashdata('error', 'Data Berhasil Diubah');
			redirect('korban_controller/datakorban');
		}
	}

	public function delete($id) {
		$hapus = $this->korban_model->hapusData('korban', $id);
		if($hapus > 0) {
			redirect('korban_controller/datakorban');	
		} else {
			echo 'Gagal dihapus';
		}
	}
}