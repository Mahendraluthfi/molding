<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }	 		
	}

	public function index()
	{
		$data['content'] = 'dashboard';
		$this->load->view('index', $data);
	}

	public function machineload()
	{
		$data['node'] = $this->db->get('node_data')->result();
		$this->load->view('_machineload', $data);
	}

	public function detail($id)
	{
		$data['content'] = 'detail';
		$this->load->view('index', $data);
	}

	public function chart($id)
	{
		$get = $this->db->get_where('node_data', array('node_id' => $id))->row();
		$data['cc'] = $get->count_cycle;
		$today = date('Y-m-d');
		$data['jam1'] = $this->db->query("SELECT AVG(value) AS jam1 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
		$data['jam2'] = $this->db->query("SELECT AVG(value) AS jam2 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
		$data['jam3'] = $this->db->query("SELECT AVG(value) AS jam3 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
		$data['jam4'] = $this->db->query("SELECT AVG(value) AS jam4 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
		$data['jam5'] = $this->db->query("SELECT AVG(value) AS jam5 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
		$data['jam6'] = $this->db->query("SELECT AVG(value) AS jam6 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
		$data['jam7'] = $this->db->query("SELECT AVG(value) AS jam7 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
		$data['jam8'] = $this->db->query("SELECT AVG(value) AS jam8 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
		$data['jam9'] = $this->db->query("SELECT AVG(value) AS jam9 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
		$data['jam10'] = $this->db->query("SELECT AVG(value) AS jam10 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
		$data['jam11'] = $this->db->query("SELECT AVG(value) AS jam11 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
		$data['jam12'] = $this->db->query("SELECT AVG(value) AS jam12 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
		$data['jam13'] = $this->db->query("SELECT AVG(value) AS jam13 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
		$data['jam14'] = $this->db->query("SELECT AVG(value) AS jam14 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
		$data['jam15'] = $this->db->query("SELECT AVG(value) AS jam15 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
		$data['jam16'] = $this->db->query("SELECT AVG(value) AS jam16 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 60 AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();

		// output

		$data['op1'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op1 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
		$data['op2'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op2 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
		$data['op3'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op3 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
		$data['op4'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op4 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
		$data['op5'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op5 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
		$data['op6'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op6 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
		$data['op7'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op7 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
		$data['op8'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op8 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
		$data['op9'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op9 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
		$data['op10'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op10 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
		$data['op11'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op11 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
		$data['op12'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op12 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
		$data['op13'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op13 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
		$data['op14'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op14 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
		$data['op15'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op15 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
		$data['op16'] = $this->db->query("SELECT COUNT(DISTINCT time) AS op16 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();
		$this->load->view('_chart', $data);
		// print_r($data);
		// echo "OK";
	}

	public function mcinfo($id)
	{
		$get = $this->db->get_where('node_data', array('node_id' => $id))->row();			

        $cek = $this->db->query("SELECT TIMESTAMPDIFF(SECOND, '".$get->last_online."', NOW()) AS now")->row();
                
        if($cek->now < 60){
        	$data['btn'] = 'btn-success';
           	$data['sts'] = "Online";
        }else{
         	$data['btn'] = 'btn-danger';        
           	$data['sts'] = "Offline";            
        }
	 	$avg_today = $this->db->query("SELECT AVG(value) as avg FROM realtime_data WHERE node_id=".$id." AND function='d2' AND value BETWEEN 1 AND 60 AND ts >= DATE(NOW())")->row();
	 	$sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$get->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY)")->row();
	 	$sql_evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('14:00:00')")->row();
	 	$sql_morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts <= TIME('14:00:00')")->row();
	 	$data['count'] = round($sql_today->today/$get->count_cycle,1);
	 	$data['eff1'] = (($sql_morning->today/$get->count_cycle) / (255 * 8)) * 100;
	 	$data['eff2'] = (($sql_evening->today/$get->count_cycle) / (255 * 8)) * 100;
	 	$data['morning'] = round($sql_morning->today/$get->count_cycle,1);
	 	$data['evening'] = round($sql_evening->today/$get->count_cycle,1);
	 	$data['avg'] = round($avg_today->avg,1);
		$data['mc'] = $get;
		$this->load->view('_mcinfo', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */