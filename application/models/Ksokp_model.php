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

/* ============================================== LOKAL ============================================== */

	public function newMaster($nama_brg,$satuan,$min_pack,$jenis)
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

	public function updateMasterLokal($id,$nama_brg_lokal,$satuan_lokal,$min_pack_lokal)
	{
		$data = array(
			'nama_brg_lokal' =>$nama_brg_lokal , 
			'satuan_lokal' =>$satuan_lokal , 
			'min_pack_lokal' =>$min_pack_lokal , 
		);

		$this->db->where('id_brg_lokal', $id);
		$result = $this->db->insert('master_lokal',$data);
		return 	$result;
	}

/* ============================================== IMPORT ============================================== */

}

/* End of file ksokp.php */
/* Location: ./application/models/ksokp.php */