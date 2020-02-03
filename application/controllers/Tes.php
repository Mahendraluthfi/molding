<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function index()
	{
		
	}

	public function send($id,$cycle)
	{
		$this->db->insert('tes', array(
			'id' => $id,
			'cycle' => $cycle
		));
		
	}
}

/* End of file Tes.php */
/* Location: ./application/controllers/Tes.php */