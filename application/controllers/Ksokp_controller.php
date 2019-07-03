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

	public function indexGetData()
	{
		$this->load->view('adm_template/header.php');
		$this->load->view('lokal/v_master_data.php');
		$this->load->view('adm_template/footer.php');
	}

	public function newDataMaster()
	{
		$jenis 		= $this->input->post('jenis');
		$nama_brg 	= $this->input->post('nama_brg');
		$satuan 	= $this->input->post('satuan');
		$min_pack 	= $this->input->post('min_pack');

		$result=$this->ksokp_model->newMaster($jenis,$nama_brg,$satuan,$min_pack);
		echo json_encode($result);
	}

	public function deleteMaster()
	{
		$result = $this->ksokp_model->deleteMaster();
		echo json_encode($result);
	}

	/* ============================================== LOKAL ============================================== */

	public function getDataLokal()
	{
		$data=$this->ksokp_model->getData('master_lokal');
        echo json_encode($data);
	}

	public function updateDataMasterLokal()
	{
		$id = $this->input->post('id_brg_lokal_up');
		$nama_brg_lokal = $this->input->post('nama_brg_lokal_up');
		$satuan_lokal = $this->input->post('satuan_lokal_up');
		$min_pack_lokal = $this->input->post('min_pack_lokal_up');

		$result=$this->ksokp_model->updateMasterLokal($id,$nama_brg_lokal,$satuan_lokal,$min_pack_lokal);
		echo json_encode($result);	
	}

	
	/* ============================================== IMPORT ============================================== */

	public function getDataImport()
	{
		$data=$this->ksokp_model->getData('master_import');
        echo json_encode($data);
	}
}
