<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }	 		
		date_default_timezone_set('Asia/Jakarta');	  		
		$this->load->model('Moldingmodel');
	}

	public function index()
	{
		if (empty($this->input->post('date'))) {			
			$data['get'] = $this->Moldingmodel->get_target(date('Y-m-d'))->result();
			$data['date'] = date('d M', strtotime(date('Y-m-d')));
		}else{
			$data['get'] = $this->Moldingmodel->get_target($this->input->post('date'))->result();
			$data['date'] = date('d M', strtotime($this->input->post('date')));
		}
		$data['node'] = $this->db->query('SELECT * FROM node_data ORDER BY position ASC')->result();		
		$data['title'] = 'Target Monitoring';
		$data['content'] = 'target';
		$this->load->view('index', $data);
	}

	public function add()
	{		
		$this->db->insert('target', array(
			'node_id' => $this->input->post('mc'),
			'date' => $this->input->post('date'),
			'shift' => $this->input->post('shift'),
			'colour' => $this->input->post('colour'),
			'size' => $this->input->post('size'),
			'style' => $this->input->post('style'),
			'qty' => $this->input->post('qty'),
			'cc' => $this->input->post('cc'),
			'start' => $this->input->post('start'),
			'end' => $this->input->post('end')
		));
		// echo $this->input->post('mc');
		redirect('target','refresh');
	}

	public function edit($id)
	{		
		$this->db->where('id', $id);
		$this->db->update('target', array(
			'node_id' => $this->input->post('mc'),
			'date' => $this->input->post('date'),
			'shift' => $this->input->post('shift'),
			'colour' => $this->input->post('colour'),
			'size' => $this->input->post('size'),
			'style' => $this->input->post('style'),
			'qty' => $this->input->post('qty'),
			'cc' => $this->input->post('cc'),
			'start' => $this->input->post('start'),
			'end' => $this->input->post('end')
		));
		// echo $this->input->post('mc');
		redirect('target','refresh');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('target');
		redirect('target','refresh');
	}

	public function get($id)
	{
		$data = $this->db->get_where('target', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function get_id($id)
	{
		$data = $this->db->query("SELECT target.*, node_data.serial_no FROM target JOIN node_data ON target.node_id=node_data.node_id WHERE target.id = '".$id."'")->row();
		echo json_encode($data);
	}	

	public function get_output($id)
	{
		$get = $this->db->get_where('target', array('id' => $id))->row();
		if ($get->end == "00:00:00") {		
			$sql = $this->db->query("SELECT COUNT(DISTINCT time) AS op FROM master_data_1 WHERE node_id='".$get->node_id."' AND function='d2' AND ts >= '".$get->date." ".$get->start."'")->row();
			$end = date('H:i:s');
		}else{
			$sql = $this->db->query("SELECT COUNT(DISTINCT time) AS op FROM master_data_1 WHERE node_id='".$get->node_id."' AND function='d2' AND ts >= '".$get->date." ".$get->start."' AND ts <= '".$get->date." ".$get->end."'")->row();
			$end = $get->end;
		}
		$cc = 1 / $get->cc;
		$output = $sql->op / $cc;
		$awal  = strtotime(date('Y-m-d').' '.$get->start); //waktu awal
		$akhir = strtotime(date('Y-m-d').' '.$end); //waktu akhir
		$diff  = $akhir - $awal;
		$menit   = floor($diff / (60)) * 4;
		$eff = ($output / $menit) * 100;
		$data = array(
			'output' => $output,
			'eff' => round($eff,1)
		);
		echo json_encode($data);
	}

}

/* End of file Target.php */
/* Location: ./application/controllers/Target.php */