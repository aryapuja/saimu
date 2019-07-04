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

/* ============================================== LOKAL ============================================== */

	


/* ============================================== IMPORT ============================================== */

}

/* End of file ksokp.php */
/* Location: ./application/models/ksokp.php */