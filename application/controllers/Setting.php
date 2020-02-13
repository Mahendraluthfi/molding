<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }	 		
		date_default_timezone_set('Asia/Jakarta');	    
	}

	public function index()
	{
		$data['content'] = 'setting';
		$this->load->view('index', $data);
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */