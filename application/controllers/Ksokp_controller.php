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
		$this->load->view('v_master_data.php');
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

	public function updateMaster()
	{
		$id 		= $this->input->post('id_brg_up');
		$nama_brg 	= $this->input->post('nama_brg_up');
		$satuan 	= $this->input->post('satuan_up');
		$min_pack 	= $this->input->post('min_pack_up');
		$tabel 		= $this->input->post('tabel');

		$result=$this->ksokp_model->updateMaster($id,$nama_brg,$satuan,$min_pack,$tabel);
		echo json_encode($result);	
	}

	/* ============================================== LOKAL ============================================== */

	public function getDataLokal()
	{
		$data=$this->ksokp_model->getData('master_lokal');
        echo json_encode($data);
	}

	public function formDataLokal()
	{
		$data['barang'] = $this->ksokp_model->getBarang("master_lokal");
		$data['satuan'] = $this->ksokp_model->getSatuan("master_lokal");

		$this->load->view('adm_template/header.php');
		$this->load->view('lokal/v_ins_kp_lokal.php',$data);
		$this->load->view('adm_template/footer.php');
	}

	public function insertDataLokal()
	{
		date_default_timezone_set("Asia/Jakarta");

		$itemlokal 			= $_POST['itemlokal']; 
		$satuanlokal 		= $_POST['satuanlokal']; 
		$minpacklokal 		= $_POST['minpacklokal']; 
		$supplierlokal 		= $_POST['supplierlokal'];
		$avgusagelokal 		= $_POST['avgusagelokal'];
		$stodailylokal 		= $_POST['stodailylokal'];
		$usagedailylokal 	= $_POST['usagedailylokal'];
		$incomingdailylokal	= $_POST['incomingdailylokal'];
		$data = array();
		
		$index = 0; // Set index array awal dengan 0
		foreach($itemlokal as $dataitemlokal){ // Kita buat perulangan berdasarkan nis sampai data terakhir
			array_push($data, array(
				'nama_brg_lokal'			=> $dataitemlokal,
				'satuan_lokal'				=> $satuanlokal[$index],
				'min_pack_lokal'			=> $minpacklokal[$index],
				'supplier_lokal'			=> $supplierlokal[$index],
				'avg_usage_lokal'			=> $avgusagelokal[$index],
				'sto_daily_lokal'			=> $stodailylokal[$index],
				'usage_daily_lokal'			=> $usagedailylokal[$index],
				'incoming_daily_lokal'		=> $incomingdailylokal[$index],
				'safety_stock_pcs_lokal'	=> ceil($avgusagelokal[$index]*0.8),
				'safety_stock_day_lokal'	=> ceil($avgusagelokal[$index])/$avgusagelokal[$index],
				'bal_lokal'					=> ($stodailylokal[$index] + $incomingdailylokal[$index]) - $usagedailylokal[$index],
				'status_lokal'					=> "OKE",
			));
			
			$index++;
		}
		
		$sql = $this->ksokp_model->insertDataLokal($data);

		echo json_encode($sql);
	}
	
	/* ============================================== IMPORT ============================================== */

	public function getDataImport()
	{
		$data=$this->ksokp_model->getData('master_import');
        echo json_encode($data);
	}

	public function formDataImport()
	{
		$data['barang'] = $this->ksokp_model->getBarang("master_import");
		$data['satuan'] = $this->ksokp_model->getSatuan("master_import");

		$this->load->view('adm_template/header.php');
		$this->load->view('import/v_ins_kp_import.php',$data);
		$this->load->view('adm_template/footer.php');
	}
}
