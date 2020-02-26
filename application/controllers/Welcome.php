<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('v_login');
	}

	public function login() {
		$user = $this->input->post('user', true);
		$pass  = $this->input->post('pass', true);
		$cek = $this->login_model->processlogin($user, $pass);
		$hasil = count($cek);
		if ($hasil > 0) {
			$this->session->set_flashdata("success", "Akun anda berhasil masuk"); 
			redirect('web_controller/web');
		} else {
			$this->session->set_flashdata("error", "Akun tidak tersedia");
			$this->load->view('v_login');
		}
		
	}

	public function logout() {
		$this->load->view('v_login');
	}
	
}
