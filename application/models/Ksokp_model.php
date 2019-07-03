<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ksokp_model extends CI_Model {

	public function login($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('user');
    }	
/* ============================================== LOKAL ============================================== */
	public function newMasterLokal()
    {
		$data = array(
			'nama_brg_lokal'	=> $this->input->post('nama_brg_lokal'),
			'satuan_lokal'		=> $this->input->post('satuan_lokal'),
		);
		return $this->db->insert('master_lokal', $data);
	}

/* ============================================== IMPORT ============================================== */
	public function newMasterImport()
    {
		$data = array(
			'nama_brg_lokal'	=> $this->input->post('nama_brg_lokal'),
			'satuan_lokal'		=> $this->input->post('satuan_lokal'),
		);
		return $this->db->insert('master_lokal', $data);
	}

}

/* End of file ksokp.php */
/* Location: ./application/models/ksokp.php */