<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Output extends CI_Controller {

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
		$today = date('Y-m-d');
		$mc = $this->db->query('SELECT * FROM node_data ORDER BY position ASC')->result();
		foreach ($mc as $key => $value) {
			$value->jam1 = $this->db->query("SELECT COUNT(DISTINCT time) AS op1 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
			$value->jam2 = $this->db->query("SELECT COUNT(DISTINCT time) AS op2 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
			$value->jam3 = $this->db->query("SELECT COUNT(DISTINCT time) AS op3 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
			$value->jam4 = $this->db->query("SELECT COUNT(DISTINCT time) AS op4 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
			$value->jam5 = $this->db->query("SELECT COUNT(DISTINCT time) AS op5 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
			$value->jam6 = $this->db->query("SELECT COUNT(DISTINCT time) AS op6 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
			$value->jam7 = $this->db->query("SELECT COUNT(DISTINCT time) AS op7 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
			$value->jam8 = $this->db->query("SELECT COUNT(DISTINCT time) AS op8 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
			$value->jam9 = $this->db->query("SELECT COUNT(DISTINCT time) AS op9 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
			$value->jam10 = $this->db->query("SELECT COUNT(DISTINCT time) AS op10 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
			$value->jam11 = $this->db->query("SELECT COUNT(DISTINCT time) AS op11 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
			$value->jam12 = $this->db->query("SELECT COUNT(DISTINCT time) AS op12 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
			$value->jam13 = $this->db->query("SELECT COUNT(DISTINCT time) AS op13 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
			$value->jam14 = $this->db->query("SELECT COUNT(DISTINCT time) AS op14 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
			$value->jam15 = $this->db->query("SELECT COUNT(DISTINCT time) AS op15 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
			$value->jam16 = $this->db->query("SELECT COUNT(DISTINCT time) AS op16 FROM realtime_data WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();
			$value->morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$value->node_id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00') AND ts <= TIME('14:00:00')")->row();
			$value->evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$value->node_id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('14:00:00')")->row();
			$value->today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$value->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00')")->row();
		}
		$data['content'] = 'output';
		$data['title'] = 'Output Monitoring';
		$data['get'] = $mc;
		// print_r($mc);
		$this->load->view('index', $data);
	}

	public function submit()
	{
		$today = $this->input->post('date');
		$mc = $this->db->query('SELECT * FROM node_data ORDER BY position ASC')->result();
		foreach ($mc as $key => $value) {
			$value->jam1 = $this->db->query("SELECT COUNT(DISTINCT time) AS op1 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
			$value->jam2 = $this->db->query("SELECT COUNT(DISTINCT time) AS op2 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
			$value->jam3 = $this->db->query("SELECT COUNT(DISTINCT time) AS op3 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
			$value->jam4 = $this->db->query("SELECT COUNT(DISTINCT time) AS op4 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
			$value->jam5 = $this->db->query("SELECT COUNT(DISTINCT time) AS op5 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
			$value->jam6 = $this->db->query("SELECT COUNT(DISTINCT time) AS op6 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
			$value->jam7 = $this->db->query("SELECT COUNT(DISTINCT time) AS op7 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
			$value->jam8 = $this->db->query("SELECT COUNT(DISTINCT time) AS op8 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
			$value->jam9 = $this->db->query("SELECT COUNT(DISTINCT time) AS op9 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
			$value->jam10 = $this->db->query("SELECT COUNT(DISTINCT time) AS op10 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
			$value->jam11 = $this->db->query("SELECT COUNT(DISTINCT time) AS op11 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
			$value->jam12 = $this->db->query("SELECT COUNT(DISTINCT time) AS op12 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
			$value->jam13 = $this->db->query("SELECT COUNT(DISTINCT time) AS op13 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
			$value->jam14 = $this->db->query("SELECT COUNT(DISTINCT time) AS op14 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
			$value->jam15 = $this->db->query("SELECT COUNT(DISTINCT time) AS op15 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
			$value->jam16 = $this->db->query("SELECT COUNT(DISTINCT time) AS op16 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();
			$value->morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$value->node_id." and function='d2' AND DATE(time) = '".$today."' AND ts >= TIME('05:30:00') AND ts <= TIME('14:00:00')")->row();
			$value->evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$value->node_id." and function='d2' AND DATE(time) = '".$today."' AND ts >= TIME('14:00:00')")->row();
			$value->today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$value->node_id." AND function='d2' AND DATE(time) = '".$today."' AND ts >= TIME('05:30:00')")->row();
		}
		$data['date'] = date('d M Y', strtotime($today));
		$data['datelink'] = $today;
		$data['content'] = 'output_result';
		$data['title'] = 'Output Monitoring';
		$data['get'] = $mc;
		// print_r($mc);
		$this->load->view('index', $data);
	}

	public function download($id,$date)
	{
		$today = $date;
		$mc = $this->db->query('SELECT * FROM node_data ORDER BY position ASC')->result();
		foreach ($mc as $key => $value) {
			$value->jam1 = $this->db->query("SELECT COUNT(DISTINCT time) AS op1 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
			$value->jam2 = $this->db->query("SELECT COUNT(DISTINCT time) AS op2 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
			$value->jam3 = $this->db->query("SELECT COUNT(DISTINCT time) AS op3 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
			$value->jam4 = $this->db->query("SELECT COUNT(DISTINCT time) AS op4 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
			$value->jam5 = $this->db->query("SELECT COUNT(DISTINCT time) AS op5 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
			$value->jam6 = $this->db->query("SELECT COUNT(DISTINCT time) AS op6 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
			$value->jam7 = $this->db->query("SELECT COUNT(DISTINCT time) AS op7 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
			$value->jam8 = $this->db->query("SELECT COUNT(DISTINCT time) AS op8 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
			$value->jam9 = $this->db->query("SELECT COUNT(DISTINCT time) AS op9 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
			$value->jam10 = $this->db->query("SELECT COUNT(DISTINCT time) AS op10 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
			$value->jam11 = $this->db->query("SELECT COUNT(DISTINCT time) AS op11 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
			$value->jam12 = $this->db->query("SELECT COUNT(DISTINCT time) AS op12 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
			$value->jam13 = $this->db->query("SELECT COUNT(DISTINCT time) AS op13 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
			$value->jam14 = $this->db->query("SELECT COUNT(DISTINCT time) AS op14 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
			$value->jam15 = $this->db->query("SELECT COUNT(DISTINCT time) AS op15 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
			$value->jam16 = $this->db->query("SELECT COUNT(DISTINCT time) AS op16 FROM master_data_1 WHERE node_id='".$value->node_id."' AND function='d2' AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();
			$value->morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$value->node_id." and function='d2' AND DATE(time) = '".$today."' AND ts >= TIME('05:30:00') AND ts <= TIME('14:00:00')")->row();
			$value->evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$value->node_id." and function='d2' AND DATE(time) = '".$today."' AND ts >= TIME('14:00:00')")->row();
			$value->today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$value->node_id." AND function='d2' AND DATE(time) = '".$today."' AND ts >= TIME('05:30:00')")->row();
		}		

		$data['date'] = date('d M Y', strtotime($today));
		$data['get'] = $mc;	
		$cekshift = $this->db->get_where('plan_shift', array('date' => $date))->num_rows();
		if (empty($cekshift)) {
				$data['morning'] = '';
				$data['evening'] = '';
			}else{
				$gs = $this->db->get_where('plan_shift', array('date' => $date))->row();
				$data['morning'] = $gs->morning;
				$data['evening'] = $gs->evening;
			}
		if ($id == 1) {
			$html= $this->load->view('output_pdf',$data,true);			
		}elseif ($id == 2) {
			$html= $this->load->view('output_pdf2',$data,true);						
		}else{
			$html= $this->load->view('output_pdf3',$data,true);			
		}
    	$filename = 'report_output_'.$date;
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');	
	}

}

/* End of file Output.php */
/* Location: ./application/controllers/Output.php */