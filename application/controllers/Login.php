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
		if (empty($cek)) {
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger text-center">                             
                     Username or Password is wrong !
                 </div>   
				');
			redirect('login','refresh');
		}else{
			$array = array(
				'username' => $username,
				'password' => $password
			);
			
			$this->session->set_userdata( $array );

			redirect('home');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */