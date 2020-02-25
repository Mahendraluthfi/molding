<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downtime extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }	 		
		date_default_timezone_set('Asia/Jakarta');	  
		$this->load->library('pdfgenerator');

	}

	public function index()
	{
		$data['node'] = $this->db->query('SELECT * FROM node_data ORDER BY position ASC')->result();
		$data['get'] = $this->db->query('SELECT * FROM downtime ORDER BY id DESC')->result();
		
		$data['content'] = 'downtime';
		$this->load->view('index', $data);
	}

	public function add()
	{
		$this->db->insert('downtime', array(
			'date' => $this->input->post('date'),
			'shift' => $this->input->post('shift'),
			'mc' => $this->input->post('mc'),
			'name' => $this->session->userdata('username'),
			'reason' => $this->input->post('reason'),
			'time' => $this->input->post('time'),
			'prd_hours' => $this->input->post('prd')
		));
		redirect('downtime','refresh');
	}

	public function get($id)
	{
		$data = $this->db->get_where('downtime', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$this->db->update('downtime', array(
			'date' => $this->input->post('date'),
			'shift' => $this->input->post('shift'),
			'mc' => $this->input->post('mc'),
			'name' => $this->session->userdata('username'),
			'reason' => $this->input->post('reason'),
			'time' => $this->input->post('time'),
			'prd_hours' => $this->input->post('prd')
		));
		redirect('downtime','refresh');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('downtime');
		redirect('downtime','refresh');
	}

	public function report()
	{		
		if (empty($this->input->post('date1'))) {
			$data['content'] = 'downtime_report';
			$this->load->view('index', $data);			
		}else{
			$data['content'] = 'downtime_result';
			$this->load->view('index', $data);	
		}
	}

	public function print()
	{
		$html= $this->load->view('downtime_pdf','',true);
    	$filename = 'report_downtime_';
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');	
	}
}

/* End of file Downtime.php */
/* Location: ./application/controllers/Downtime.php */