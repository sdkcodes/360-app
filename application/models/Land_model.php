<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Land_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getBoughtLands(){

	}

	public function countLands(){
		return $this->db->count_all_results("land");
	}
}