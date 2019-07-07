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

	public function newMaster($jenis,$nama_brg,$satuan,$min_pack)
    {
    	if($jenis == "master_lokal"){
			$data = array(
				'nama_brg_lokal' =>$nama_brg, 
				'satuan_lokal' =>$satuan , 
				'min_pack_lokal' =>$min_pack, 
			);
    	}else{
    		$data = array(
				'nama_brg_import' =>$nama_brg, 
				'satuan_import' =>$satuan, 
				'min_pack_import' =>$min_pack, 
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

	public function getBarang($tabel)
	{
		if($tabel=='master_lokal'){
			$this->db->select('nama_brg_lokal');
		}else{
			$this->db->select('nama_brg_import');
		}
		$query=$this->db->get($tabel);
		return $query->result();
	}

	public function getSatuan($tabel)
	{
		if($tabel=='master_lokal'){
			$this->db->select('satuan_lokal');
		}else{
			$this->db->select('satuan_import');
		}
		$query=$this->db->get($tabel);
		return $query->result();
	}

	public function ceiling($number, $significance = 1)
    {
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
    }

	public function insertDataKp($data,$table)
	{
		return $this->db->insert_batch($table, $data);
	}
/* ============================================== LOKAL ============================================== */
	

/* ============================================== IMPORT ============================================== */

}

/* End of file ksokp.php */
/* Location: ./application/models/ksokp.php */