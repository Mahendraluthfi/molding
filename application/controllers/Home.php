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
		date_default_timezone_set('Asia/Jakarta');	    
	}

	public function index()
	{
		$data['content'] = 'dashboard';
		$this->load->view('index', $data);
	}

	public function machineload()
	{
		$data['node'] = $this->db->query("SELECT * FROM `node_data` GROUP BY line ORDER BY `line`  ASC")->result();		
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
		$data['jam1'] = $this->db->query("SELECT AVG(value) AS jam1 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
		$data['jam2'] = $this->db->query("SELECT AVG(value) AS jam2 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
		$data['jam3'] = $this->db->query("SELECT AVG(value) AS jam3 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
		$data['jam4'] = $this->db->query("SELECT AVG(value) AS jam4 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
		$data['jam5'] = $this->db->query("SELECT AVG(value) AS jam5 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
		$data['jam6'] = $this->db->query("SELECT AVG(value) AS jam6 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
		$data['jam7'] = $this->db->query("SELECT AVG(value) AS jam7 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
		$data['jam8'] = $this->db->query("SELECT AVG(value) AS jam8 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
		$data['jam9'] = $this->db->query("SELECT AVG(value) AS jam9 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
		$data['jam10'] = $this->db->query("SELECT AVG(value) AS jam10 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
		$data['jam11'] = $this->db->query("SELECT AVG(value) AS jam11 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
		$data['jam12'] = $this->db->query("SELECT AVG(value) AS jam12 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
		$data['jam13'] = $this->db->query("SELECT AVG(value) AS jam13 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
		$data['jam14'] = $this->db->query("SELECT AVG(value) AS jam14 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
		$data['jam15'] = $this->db->query("SELECT AVG(value) AS jam15 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
		$data['jam16'] = $this->db->query("SELECT AVG(value) AS jam16 FROM realtime_data WHERE node_id='".$id."' AND function='d2' AND value >= 1 AND value <= 75 AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();

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

		//ppower

		$data['power1'] = $this->db->query("SELECT AVG(value) AS power1, (AVG(value)/1000) AS kwh1 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 05:30:00' AND '".$today." 06:30:00'")->row();
		$data['power2'] = $this->db->query("SELECT AVG(value) AS power2, (AVG(value)/1000) AS kwh2 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 06:30:00' AND '".$today." 07:30:00'")->row();
		$data['power3'] = $this->db->query("SELECT AVG(value) AS power3, (AVG(value)/1000) AS kwh3 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 07:30:00' AND '".$today." 08:30:00'")->row();
		$data['power4'] = $this->db->query("SELECT AVG(value) AS power4, (AVG(value)/1000) AS kwh4 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 08:30:00' AND '".$today." 10:00:00'")->row();
		$data['power5'] = $this->db->query("SELECT AVG(value) AS power5, (AVG(value)/1000) AS kwh5 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 10:00:00' AND '".$today." 11:00:00'")->row();
		$data['power6'] = $this->db->query("SELECT AVG(value) AS power6, (AVG(value)/1000) AS kwh6 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 11:00:00' AND '".$today." 12:00:00'")->row();
		$data['power7'] = $this->db->query("SELECT AVG(value) AS power7, (AVG(value)/1000) AS kwh7 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 12:00:00' AND '".$today." 13:00:00'")->row();
		$data['power8'] = $this->db->query("SELECT AVG(value) AS power8, (AVG(value)/1000) AS kwh8 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 13:00:00' AND '".$today." 14:00:00'")->row();
		$data['power9'] = $this->db->query("SELECT AVG(value) AS power9, (AVG(value)/1000) AS kwh9 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 14:00:00' AND '".$today." 15:00:00'")->row();
		$data['power10'] = $this->db->query("SELECT AVG(value) AS power10, (AVG(value)/1000) AS kwh10 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 15:00:00' AND '".$today." 16:00:00'")->row();
		$data['power11'] = $this->db->query("SELECT AVG(value) AS power11, (AVG(value)/1000) AS kwh11 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 16:00:00' AND '".$today." 17:00:00'")->row();
		$data['power12'] = $this->db->query("SELECT AVG(value) AS power12, (AVG(value)/1000) AS kwh12 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 17:00:00' AND '".$today." 18:30:00'")->row();
		$data['power13'] = $this->db->query("SELECT AVG(value) AS power13, (AVG(value)/1000) AS kwh13 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 18:30:00' AND '".$today." 19:30:00'")->row();
		$data['power14'] = $this->db->query("SELECT AVG(value) AS power14, (AVG(value)/1000) AS kwh14 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 19:30:00' AND '".$today." 20:30:00'")->row();
		$data['power15'] = $this->db->query("SELECT AVG(value) AS power15, (AVG(value)/1000) AS kwh15 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 20:30:00' AND '".$today." 21:30:00'")->row();
		$data['power16'] = $this->db->query("SELECT AVG(value) AS power16, (AVG(value)/1000) AS kwh16 FROM realtime_data WHERE node_id='".$id."' AND function='p1' AND ts BETWEEN '".$today." 21:30:00' AND '".$today." 23:00:00'")->row();

		$this->load->view('_chart', $data);
		// print_r($data);
		// echo "OK";
	}

	public function mcinfo($id)
	{
		$get = $this->db->get_where('node_data', array('node_id' => $id))->row();			
		$line = $this->db->get_where('node_data', array('line' => $get->line))->result();
		$cm = 0;
		$ce = 0;
		$ct = 0;
		foreach ($line as $key) {
			$sql_morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$key->node_id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00') AND ts <= TIME('14:00:00')")->row();
			$cm = ($sql_morning->today/$key->count_cycle) + $cm;
			$sql_evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$key->node_id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('14:00:00')")->row();
			$ce = ($sql_evening->today/$key->count_cycle) + $ce;
			$sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$key->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00')")->row();
			$ct = ($sql_today->today/$key->count_cycle) + $ct;
		}

		$data['cm'] = $cm;
		$data['ce'] = $ce;
		$data['ct'] = $ct;
        $cek = $this->db->query("SELECT TIMESTAMPDIFF(SECOND, '".$get->last_online."', NOW()) AS now")->row();
                
        if($cek->now < 60){
        	$data['btn'] = 'btn-success';
           	$data['sts'] = "Online";
        }else{
         	$data['btn'] = 'btn-danger';        
           	$data['sts'] = "Offline";            
        }
	 	$avg_today = $this->db->query("SELECT AVG(value) as avg FROM realtime_data WHERE node_id=".$id." AND function='d2' AND value BETWEEN 1 AND 75 AND ts >= DATE(NOW())")->row();
	 	$sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$get->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00')")->row();
	 	$sql_evening = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('14:00:00')")->row();
	 	$sql_morning = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$id." and function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00') AND ts <= TIME('14:00:00')")->row();
	 	$data['count'] = round($sql_today->today/$get->count_cycle,1);
	 	$data['eff1'] = (($sql_morning->today/$get->count_cycle) / $this->get_time(1)) * 100;
	 	$data['eff2'] = (($sql_evening->today/$get->count_cycle) / $this->get_time(2)) * 100;
	 	$data['morning'] = round($sql_morning->today/$get->count_cycle,1);
	 	$data['evening'] = round($sql_evening->today/$get->count_cycle,1);
	 	$data['avg'] = round($avg_today->avg,1);
		$data['mc'] = $get;
		$start_time=5.5;//factory starting time
		$time_elapsed=intval(date("H"))+intval(date("i"))/60 - $start_time;
		$avgwatt = $this->db->query("SELECT AVG(value) as avg FROM realtime_data WHERE node_id=".$id." AND function='p1' AND ts >= DATE(NOW())")->row();
		$kwh = ($avgwatt->avg * $time_elapsed) / 1000;
		$data['kwh'] = round($kwh,1);
		$get_shift = $this->db->get_where('plan_shift', array('date' => date('Y-m-d')));
		if (empty($get_shift->num_rows())) {
			$data['sm'] ="";
			$data['se'] ="";
		}else{
			$gs = $get_shift->row();
			$data['sm'] = $gs->morning;
			$data['se'] = $gs->evening;
		}
		$this->load->view('_mcinfo', $data);
	}

	public function get_time($shift)
	{
		if ($shift == "1") {
			$awal  = strtotime('05:30:00'); //waktu awal
			if (date('H:i:s') < date('H:i:s', strtotime('14:00:00'))) {
				$date = date('H:i:s');
				$akhir = strtotime($date); //waktu akhir
				$diff  = $akhir - $awal;
				$menit   = floor($diff / (60));
				$eff = ($menit) * 4;	
				// echo $eff;
				
			}else{
				$date = date('14:00:00');
				$akhir = strtotime($date); //waktu akhir
				$diff  = $akhir - $awal;
				$menit   = floor($diff / (60));
				$eff = ($menit) * 4;					
				// echo $eff;
			}			
		}else{
			$awal  = strtotime('14:00:00'); //waktu awal
			if (date('H:i:s') < date('H:i:s', strtotime('14:00:00'))) {				
				$eff = 1;					
				// echo $eff;
			}else{
				$date = date('H:i:s');
				$akhir = strtotime($date); //waktu akhir
				$diff  = $akhir - $awal;
				$menit   = floor($diff / (60));
				$eff = ($menit) * 4;					
				// echo $eff;
			}			
		}

		return $eff;
	}

	public function tes()
	{
		// $this->load->view('tes');
		$start_time=5.5;//factory starting time
		$time_elapsed=intval(date("H"))+intval(date("i"))/60 - $start_time;
		echo $time_elapsed*255;
	}

	// public function tes1($shift)
	// {
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	if ($shift == "1") {
	// 		$awal  = strtotime('05:30:00'); //waktu awal
	// 		if (date('H:i:s') < date('H:i:s', strtotime('14:00:00'))) {
	// 			$date = date('H:i:s');
	// 			$akhir = strtotime($date); //waktu akhir
	// 			$diff  = $akhir - $awal;
	// 			$menit   = floor($diff / (60));
	// 			$eff = ($menit - 30) * 4.25;	
	// 			echo $eff;
				
	// 		}else{
	// 			$date = date('14:00:00');
	// 			$akhir = strtotime($date); //waktu akhir
	// 			$diff  = $akhir - $awal;
	// 			$menit   = floor($diff / (60));
	// 			$eff = ($menit - 30) * 4.25;					
	// 			echo $eff;
	// 		}			
	// 	}else{
	// 		$awal  = strtotime('14:00:00'); //waktu awal
	// 		if (date('H:i:s') < date('H:i:s', strtotime('14:00:00'))) {				
	// 			$eff = 1;					
	// 			echo $eff;
	// 		}else{
	// 			$date = date('H:i:s');
	// 			$akhir = strtotime($date); //waktu akhir
	// 			$diff  = $akhir - $awal;
	// 			$menit   = floor($diff / (60));
	// 			$eff = ($menit - 30) * 4.25;					
	// 			echo $eff;
	// 		}			
	// 	}
	// }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */