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

		$this->load->view('_chart');
	}

	public function mcinfo($id)
	{
		$get = $this->db->get_where('node_data', array('node_id' => $id))->row();	
		$waktu_awal     = strtotime($get->last_online);
        $waktu_akhir    = strtotime(date('Y-m-d H:i:s')); // bisa juga waktu sekarang now()        
        //menghitung selisih dengan hasil detik
        $diff =  $waktu_awal - $waktu_akhir;           
        if($diff >= 21545){                  
           $data['btn'] = 'btn-success';
           $data['sts'] = "Online";
        }else{
           $data['btn'] = 'btn-danger';        
           $data['sts'] = "Offline";           
        }
	 	$sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$get->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY)")->row();
	 	$avg_today = $this->db->query("SELECT AVG(value) as avg FROM realtime_data WHERE node_id=".$id." AND function='d2' AND value BETWEEN 1 AND 60 AND ts >= DATE(NOW())")->row();
	 	$data['count'] = round($sql_today->today/$get->count_cycle,1);
	 	$data['avg'] = round($avg_today->avg,1);
		$data['mc'] = $get;
		$this->load->view('_mcinfo', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */