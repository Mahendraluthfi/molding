<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		if($this->auth->is_logged_in() == false){ 			       
        	$this->load->view('signin');
        }else{
            redirect('home','refresh');
        }
	}

	public function submit()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$cek = $this->db->get_where('user', array('username' => $username, 'password' => $password))->num_rows();
		$cek2 = $this->db->get_where('koordinator', array('epf' => $username, 'password' => $password))->num_rows();
		if (!empty($cek)) {
			$array = array(
				'username' => $username,
				'password' => $password,
				'level' => 'Admin',
				'downtime_link' => base_url('downtime'),
				'coo_link' => base_url('coordinator')
			);
			
			$this->session->set_userdata( $array );

			redirect('home');
		}elseif(!empty($cek2)){
			$array = array(
				'username' => $username,
				'password' => $password,
				'level' => 'Coordinator',
				'downtime_link' => base_url('co/downtime'),
				'coo_link' => base_url('co/coordinator')				
			);
			
			$this->session->set_userdata( $array );

			redirect('home');
		}else{
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger text-center">                             
                     Username or Password is wrong !
                 </div>   
				');
			redirect('login','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('front','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */