<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soldering extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }	 		
		date_default_timezone_set('Asia/Jakarta');	 
		$this->load->library('pdfgenerator');		
		$this->load->model('Moldingmodel');   
	}

	public function index()
	{
		
		$this->updatelist(date('Y-m-d'));		
		$data['title'] = 'Soldering Molding';
		$data['content'] = 'solder';
		$data['date'] = date('Y-m-d');
		$data['tm'] = $this->db->get('tm')->result();
		$data['get'] = $this->Moldingmodel->get_solder(date('Y-m-d'))->result();
		// $get = $this->Moldingmodel->get_solder(date('Y-m-d'))->result();
		$this->load->view('index', $data);
		// print_r($get);
	}

	public function update($value,$column,$id)
	{
		$this->db->where('id', $id);
		$this->db->update('soldering', array(
			"$column" => $value,
		));

		echo json_encode(array('status' => TRUE));
	}

	public function add()
	{
		$this->db->insert('tm', array(
			'epf' => $this->input->post('epf'),
			'nama' => $this->input->post('name')
		));
		
		redirect('soldering','refresh');
	}

	public function edit()
	{
		$this->db->where('epf', $this->input->post('epf'));
		$this->db->update('tm', array(
			'nama' => $this->input->post('name')			
		));

		redirect('soldering','refresh');
	}

	public function deltm($id)
	{
		$this->db->where('epf', $id);
		$this->db->delete('tm');
		redirect('soldering','refresh');
	}

	public function submit()
	{
		$date = $this->input->post('date');
		$this->updatelist($date);
		$data['title'] = 'Soldering Molding';
		$data['content'] = 'solder';
		$data['date'] = $date;	
		$data['tm'] = $this->db->get('tm')->result();		
		$data['get'] = $this->Moldingmodel->get_solder($date)->result();
		$get = $this->Moldingmodel->get_solder($date)->result();
		$this->load->view('index', $data);
	}

	public function download($date)
	{			
		$data['get'] = $this->Moldingmodel->get_solder($date)->result();
		$data['date'] = date('d M Y', strtotime($date));
		$html= $this->load->view('solder_pdf',$data,true);			
    	$filename = 'report_soldering_'.$date;
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');	
	}

	public function updatelist($date)
	{
		$cek = $this->db->get_where('soldering', array('date' => $date))->num_rows();
		if (empty($cek)) {
			$mc = $this->db->get('tm')->result();
			foreach ($mc as $key) {
				$this->db->insert('soldering', array(
					'epf' => $key->epf,
					'date' => $date
				));
			}
		}

		$query = $this->db->query("SELECT * FROM tm WHERE epf NOT IN (SELECT epf FROM soldering WHERE date='$date')");
		if (!empty($query->num_rows())) {
			$get = $query->row();
			$this->db->insert('soldering', array(
					'epf' => $get->epf,
					'date' => $date
				));
		}
	}
}

/* End of file Soldering.php */
/* Location: ./application/controllers/Soldering.php */