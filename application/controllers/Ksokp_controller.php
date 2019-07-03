<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ksokp_controller extends CI_Controller {

public function __construct()
{
	parent::__construct();
	//Do your magic here
	$this->load->model('ksokp_model');

		if ($this->session->userdata('status')==TRUE) 
		{
			// redirect('Dc_Controller/index');
		}else{	
			redirect('login');
		}
}
	public function index()
	{
		$this->load->view('adm_template/header.php');
		$this->load->view('v_admin.php');
		$this->load->view('adm_template/footer.php');
	}
}
