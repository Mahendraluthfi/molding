<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
		$data['shift'] = $this->db->query("SELECT * FROM plan_shift ORDER BY date DESC")->result();
		$data['content'] = 'setting';
		$data['title'] = 'Setting Shift';
		$this->load->view('index', $data);
	}

	public function submit()
	{
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		$morning = $this->input->post('morning');
		$evening = $this->input->post('evening');

		if (date('Y-m-d', strtotime($date1)) > date('Y-m-d', strtotime($date2))) {
			// echo "No";
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger">					
					<strong>Date range invalid !</strong>
				</div>
				');
		}else{
			// echo "Yes";
			$datetime1 = date_create($date1);
	   		$datetime2 = date_create($date2);
			date_add($datetime1,date_interval_create_from_date_string("-1 days"));
	   		date_format($datetime1,"Y-m-d");
	    	$interval = date_diff($datetime1, $datetime2);
	   		
	    	$loop = $interval->format('%a')+1;
	    	for ($i=1; $i <$loop ; $i++) { 		
				date_add($datetime1,date_interval_create_from_date_string("1 days"));
				$this->db->insert('plan_shift', array(
					'date' => date_format($datetime1,"Y-m-d"),
					'morning' => $morning,
					'evening' => $evening
				));			    		
	    	}
		}

    	redirect('setting','refresh');
	}

	public function edit($id)
	{
		$data = $this->db->get_where('plan_shift', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function edit_s()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('plan_shift', array(
			'date' => $this->input->post('e_date1'),
			'morning' => $this->input->post('e_morning'),
			'evening' => $this->input->post('e_evening')
		));
		redirect('setting','refresh');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('plan_shift');
		redirect('setting','refresh');
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */