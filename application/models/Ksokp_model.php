<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ksokp_model extends CI_Model {

	public function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }	
	
	public function getData($tabel)
	{
		$query=$this->db->get($tabel);
		return $query->result();
	}

	public function ceiling($number, $significance = 1)
    {
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
    }
	
	public function getKomponen($tabel)
	{
		$query=$this->db->get($tabel);
		return $query->result();
	}

		public function getBarang($tabel)
	{
		if($tabel=='master_lokal'){
			$this->db->select('nama_brg_lokal,satuan_lokal,min_pack_lokal');
		}else{
			$this->db->select('nama_brg_import,satuan_import,min_pack_import');
		}
		$query=$this->db->get($tabel);
		return $query->result();
	}

	public function getSatuan($tabel,$nama_brg)
	{
		if($tabel=='master_lokal'){
			// $this->db->select('*');
			$this->db->where('nama_brg_lokal', $nama_brg);
		}else{
			$this->db->select('satuan_import');
			$this->db->where('nama_brg_import', $nama_brg);
		}
		// $query=;
		return $this->db->get($tabel);
	}

	public function getMinPack($tabel,$nama_brg)
	{
		if($tabel=='master_lokal'){
			$this->db->select('min_pack_lokal');
			$this->db->where('nama_brg_lokal', $nama_brg);
		}else{
			$this->db->select('min_pack_import');
			$this->db->where('nama_brg_import', $nama_brg);
		}
		$query=$this->db->get($tabel);
		return $query->result();
	}

/* ============================================================== MASTER ============================================================== */

	public function newMaster($jenis,$nama_brg,$satuan,$min_pack)
    {
    	if($jenis == "master_lokal"){
			$data = array(
				'nama_brg_lokal' 	=>$nama_brg, 
				'satuan_lokal' 		=>$satuan , 
				'min_pack_lokal' 	=>$min_pack, 
			);
    	}else{
    		$data = array(
				'nama_brg_import' 	=>$nama_brg, 
				'satuan_import' 	=>$satuan, 
				'min_pack_import' 	=>$min_pack, 
			);
    	}
		return $this->db->insert($jenis,$data);
	}

	public function deleteMaster()
	{
		$id = $this->input->post('id');
		$tabel = $this->input->post('tabel');
		if($tabel == 'master_lokal'){
        	$this->db->where('id_brg_lokal', $id);
		}else{
        	$this->db->where('id_brg_import', $id);
		}
        $result = $this->db->delete($tabel);
        return $result;
	}

	public function updateMaster($id,$nama_brg,$satuan,$min_pack,$tabel)
	{
		if($tabel == "master_lokal"){
			$data = array(
				'nama_brg_lokal' 	=>$nama_brg, 
				'satuan_lokal' 		=>$satuan , 
				'min_pack_lokal' 	=>$min_pack, 
			);
			$this->db->where('id_brg_lokal', $id);
    	}else{
    		$data = array(
				'nama_brg_import' 	=>$nama_brg, 
				'satuan_import' 	=>$satuan, 
				'min_pack_import' 	=>$min_pack, 
			);
			$this->db->where('id_brg_import', $id);
    	}
    	
		$result = $this->db->update($tabel,$data);
		return 	$result;
	}

/* ============================================================== MASTER ============================================================== */

/* ================================================================ KP ================================================================ */

	public function insertDataKp($data,$table)
	{
		return $this->db->insert_batch($table, $data);
	}

	

	public function deleteKp($tabel)
	{
			if ($tabel == "komponen_lokal") {
				$id = $this->input->post('id');
				$this->db->where('id_lokal', $id);
			}else{
				$id = $this->input->post('id');
				$this->db->where('id_import', $id);
			}
	        $result = $this->db->delete($tabel);
	        return $result;
	}	

	public function updateKp($id,$supplier,$avgusage,$ss_pcs,$ss_day,$stodaily,$usagedaily,$incoming,$bal,$status,$date,$tabel)
	{
		if($tabel == "komponen_lokal"){
			$data = array( 
				'supplier_lokal' 			=> $supplier,
				'avg_usage_lokal' 			=> $avgusage,
				'safety_stock_pcs_lokal' 	=> $ss_pcs,
				'safety_stock_day_lokal'	=> $ss_day,
				'sto_daily_lokal' 			=> $stodaily, 
				'usage_daily_lokal' 		=> $usagedaily, 
				'incoming_daily_lokal'		=> $incoming, 
				'bal_lokal'					=> $bal,
				'status_lokal'				=> $status,
				'date_inp_lokal'			=> $date, 
			);
			$this->db->where('id_lokal', $id);
    	}else{
    		$data = array(
				'avg_usage_import' 			=> $avgusage,
				'safety_stock_pcs_import' 	=> $ss_pcs,
				'sto_daily_import' 			=> $stodaily, 
				'usage_daily_import' 		=> $usagedaily, 
				'incoming_daily_import'		=> $incoming, 
				'bal_import'				=> $bal,
				'status_import'				=> $status,
				'date_inp_import'			=> $date, 
			);
			$this->db->where('id_import', $id);
    	}
    	
		$result = $this->db->update($tabel,$data);
		return 	$result;
	}

/* ================================================================ KP ================================================================ */

}

/* End of file ksokp.php */
/* Location: ./application/models/ksokp.php */