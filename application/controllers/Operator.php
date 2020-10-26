<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {
	
	

	function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('username')) {
			redirect("login");
		} elseif($this->session->userdata('level') == '2') {
			redirect("home");
		}
		$this->load->model('M_operator');
		
	}
	
	public function index()
	{
		$data['menu'] = "operator";
		$data['operator']=    $this->M_operator->get_all();
		$this->template->load('template','operator/v_index',$data);
	}
	
	public function reset_password($id_admin){
		$this->M_operator->reset_password($id_admin);
		$this->session->set_flashdata('status', "Password Operator Berhasil direset menjadi <b>123456</b>");
		redirect('operator');
	}
}