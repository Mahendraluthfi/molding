<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['content'] = 'dashboard';
		$this->load->view('co/index', $data);		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/co/Dashboard.php */