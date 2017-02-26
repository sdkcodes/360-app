<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Land extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper("account");
		$this->load->model('land_model');
	}

	public function availableLands($from=""){
		if ($from==""){
			$from = $this->session->userdata("user_type");
		}
		$lands = $this->land_model->getAvailableLands();

	}
}