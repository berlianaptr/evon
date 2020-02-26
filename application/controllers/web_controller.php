<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_Controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('rs_model');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');

	}

	public function web(){
		$this->load->view('web');
	}
}

	