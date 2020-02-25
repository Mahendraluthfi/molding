<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record extends CI_Controller {

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
		$data['content'] = 'record';
		$data['node'] = $this->db->get('node_data')->result();
		$this->load->view('index', $data);
	}

	public function submit()
	{
		$date = $this->input->post('date');
		$id = $this->input->post('mc');

		$get = $this->db->get_where('node_data', array('node_id' => $id))->row();			
		$avg_today = $this->db->query("SELECT AVG(value) as avg FROM master_data_1 WHERE node_id=".$id."  AND function='d2' AND value BETWEEN 1 AND 75 AND DATE(ts) = '".$date."'")->row();
	 	$sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$id." AND function='d2' AND DATE(ts) = '".$date."'")->row();
	 	$sql_evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$id." AND function='d2' AND DATE(ts) = '".$date."' AND TIME(ts) >= '14:00:00'")->row();
	 	$sql_morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM master_data_1 WHERE node_id=".$id." AND function='d2' AND DATE(ts) = '".$date."' AND TIME(ts) <= '14:00:00'")->row();
	 	$data['count'] = round($sql_today->today/$get->count_cycle,1);
	 	$data['eff1'] = (($sql_morning->today/$get->count_cycle) / 2040) * 100;
	 	$data['eff2'] = (($sql_evening->today/$get->count_cycle) / 2040) * 100;
	 	$data['morning'] = round($sql_morning->today/$get->count_cycle,1);
	 	$data['evening'] = round($sql_evening->today/$get->count_cycle,1);
	 	$data['avg'] = round($avg_today->avg,1);
		$data['mc'] = $get;
		$start_time=5.5;//factory starting time
		$time_elapsed=intval(date("H"))+intval(date("i"))/60 - $start_time;
		$avgwatt = $this->db->query("SELECT AVG(value) as avg FROM master_data_1 WHERE node_id=".$id." AND function = 'p1' AND DATE(ts)='".$date."'")->row();
		$kwh = ($avgwatt->avg * 17) / 1000;
		$data['kwh'] = round($kwh,1);
		$get_shift = $this->db->get_where('plan_shift', array('date' => $date));
		if (empty($get_shift->num_rows())) {
			$data['sm'] ="";
			$data['se'] ="";
		}else{
			$gs = $get_shift->row();
			$data['sm'] = $gs->morning;
			$data['se'] = $gs->evening;
		}
		$data['node'] = $this->db->get('node_data')->result();

		$data['date'] = $date;
		$data['id'] = $id;
		$data['content'] = 'result';

		//
		$data['cc'] = $get->count_cycle;
		$data['jam1'] = $this->db->query("SELECT AVG(value) AS jam1 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 05:30:00' AND '".$date." 06:30:00'")->row();
		$data['jam2'] = $this->db->query("SELECT AVG(value) AS jam2 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 06:30:00' AND '".$date." 07:30:00'")->row();
		$data['jam3'] = $this->db->query("SELECT AVG(value) AS jam3 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 07:30:00' AND '".$date." 08:30:00'")->row();
		$data['jam4'] = $this->db->query("SELECT AVG(value) AS jam4 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 08:30:00' AND '".$date." 10:00:00'")->row();
		$data['jam5'] = $this->db->query("SELECT AVG(value) AS jam5 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 10:00:00' AND '".$date." 11:00:00'")->row();
		$data['jam6'] = $this->db->query("SELECT AVG(value) AS jam6 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 11:00:00' AND '".$date." 12:00:00'")->row();
		$data['jam7'] = $this->db->query("SELECT AVG(value) AS jam7 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 12:00:00' AND '".$date." 13:00:00'")->row();
		$data['jam8'] = $this->db->query("SELECT AVG(value) AS jam8 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 13:00:00' AND '".$date." 14:00:00'")->row();
		$data['jam9'] = $this->db->query("SELECT AVG(value) AS jam9 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 14:00:00' AND '".$date." 15:00:00'")->row();
		$data['jam10'] = $this->db->query("SELECT AVG(value) AS jam10 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 15:00:00' AND '".$date." 16:00:00'")->row();
		$data['jam11'] = $this->db->query("SELECT AVG(value) AS jam11 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 16:00:00' AND '".$date." 17:00:00'")->row();
		$data['jam12'] = $this->db->query("SELECT AVG(value) AS jam12 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 17:00:00' AND '".$date." 18:30:00'")->row();
		$data['jam13'] = $this->db->query("SELECT AVG(value) AS jam13 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 18:30:00' AND '".$date." 19:30:00'")->row();
		$data['jam14'] = $this->db->query("SELECT AVG(value) AS jam14 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 19:30:00' AND '".$date." 20:30:00'")->row();
		$data['jam15'] = $this->db->query("SELECT AVG(value) AS jam15 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 20:30:00' AND '".$date." 21:30:00'")->row();
		$data['jam16'] = $this->db->query("SELECT AVG(value) AS jam16 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$date." 21:30:00' AND '".$date." 23:00:00'")->row();

		// output

		$data['op1'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op1 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 05:30:00' AND '".$date." 06:30:00'")->row();
		$data['op2'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op2 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 06:30:00' AND '".$date." 07:30:00'")->row();
		$data['op3'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op3 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 07:30:00' AND '".$date." 08:30:00'")->row();
		$data['op4'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op4 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 08:30:00' AND '".$date." 10:00:00'")->row();
		$data['op5'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op5 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 10:00:00' AND '".$date." 11:00:00'")->row();
		$data['op6'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op6 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 11:00:00' AND '".$date." 12:00:00'")->row();
		$data['op7'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op7 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 12:00:00' AND '".$date." 13:00:00'")->row();
		$data['op8'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op8 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 13:00:00' AND '".$date." 14:00:00'")->row();
		$data['op9'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op9 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 14:00:00' AND '".$date." 15:00:00'")->row();
		$data['op10'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op10 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 15:00:00' AND '".$date." 16:00:00'")->row();
		$data['op11'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op11 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 16:00:00' AND '".$date." 17:00:00'")->row();
		$data['op12'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op12 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 17:00:00' AND '".$date." 18:30:00'")->row();
		$data['op13'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op13 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 18:30:00' AND '".$date." 19:30:00'")->row();
		$data['op14'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op14 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 19:30:00' AND '".$date." 20:30:00'")->row();
		$data['op15'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op15 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 20:30:00' AND '".$date." 21:30:00'")->row();
		$data['op16'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op16 FROM master_data_1 WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$date." 21:30:00' AND '".$date." 23:00:00'")->row();

		//ppower

		$data['power1'] = $this->db->query("SELECT AVG(value) AS power1, (AVG(value)/1000) AS kwh1 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 05:30:00' AND '".$date." 06:30:00'")->row();
		$data['power2'] = $this->db->query("SELECT AVG(value) AS power2, (AVG(value)/1000) AS kwh2 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 06:30:00' AND '".$date." 07:30:00'")->row();
		$data['power3'] = $this->db->query("SELECT AVG(value) AS power3, (AVG(value)/1000) AS kwh3 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 07:30:00' AND '".$date." 08:30:00'")->row();
		$data['power4'] = $this->db->query("SELECT AVG(value) AS power4, (AVG(value)/1000) AS kwh4 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 08:30:00' AND '".$date." 10:00:00'")->row();
		$data['power5'] = $this->db->query("SELECT AVG(value) AS power5, (AVG(value)/1000) AS kwh5 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 10:00:00' AND '".$date." 11:00:00'")->row();
		$data['power6'] = $this->db->query("SELECT AVG(value) AS power6, (AVG(value)/1000) AS kwh6 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 11:00:00' AND '".$date." 12:00:00'")->row();
		$data['power7'] = $this->db->query("SELECT AVG(value) AS power7, (AVG(value)/1000) AS kwh7 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 12:00:00' AND '".$date." 13:00:00'")->row();
		$data['power8'] = $this->db->query("SELECT AVG(value) AS power8, (AVG(value)/1000) AS kwh8 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 13:00:00' AND '".$date." 14:00:00'")->row();
		$data['power9'] = $this->db->query("SELECT AVG(value) AS power9, (AVG(value)/1000) AS kwh9 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 14:00:00' AND '".$date." 15:00:00'")->row();
		$data['power10'] = $this->db->query("SELECT AVG(value) AS power10, (AVG(value)/1000) AS kwh10 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 15:00:00' AND '".$date." 16:00:00'")->row();
		$data['power11'] = $this->db->query("SELECT AVG(value) AS power11, (AVG(value)/1000) AS kwh11 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 16:00:00' AND '".$date." 17:00:00'")->row();
		$data['power12'] = $this->db->query("SELECT AVG(value) AS power12, (AVG(value)/1000) AS kwh12 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 17:00:00' AND '".$date." 18:30:00'")->row();
		$data['power13'] = $this->db->query("SELECT AVG(value) AS power13, (AVG(value)/1000) AS kwh13 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 18:30:00' AND '".$date." 19:30:00'")->row();
		$data['power14'] = $this->db->query("SELECT AVG(value) AS power14, (AVG(value)/1000) AS kwh14 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 19:30:00' AND '".$date." 20:30:00'")->row();
		$data['power15'] = $this->db->query("SELECT AVG(value) AS power15, (AVG(value)/1000) AS kwh15 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 20:30:00' AND '".$date." 21:30:00'")->row();
		$data['power16'] = $this->db->query("SELECT AVG(value) AS power16, (AVG(value)/1000) AS kwh16 FROM master_data_1 WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$date." 21:30:00' AND '".$date." 23:00:00'")->row();
		//

		$this->load->view('index', $data);
		// echo $id;

	}

}

/* End of file Record.php */
/* Location: ./application/controllers/Record.php */