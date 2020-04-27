<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinator extends CI_Controller {

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
		$data['get'] = $this->db->get('koordinator')->result();
		$data['content'] = 'coor';
		$data['title'] = 'Coordinator';
		$this->load->view('index', $data);
	}

	public function add()
	{
		$this->db->insert('koordinator', array(
			'epf' => $this->input->post('epf'),
			'name' => $this->input->post('username'),
			'password' => md5($this->input->post('epf'))

		));
		redirect('Coordinator','refresh');
	}

	public function delete($id)
	{
		$this->db->where('epf', $id);
		$this->db->delete('koordinator');
		redirect('Coordinator','refresh');
	}

}

/* End of file Coordinator.php */
/* Location: ./application/controllers/Coordinator.php */