<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Login {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model("M_users");
	}

	public function login()
	{
	  if($this->input->post()){
		  if($this->M_users->auth_user($this->input->post())){
		   redirect('home');
		  }else{
		   redirect(current_url());
		  }
	  }
	}

	public function logout(){
	  $this->session->sess_destroy();
          redirect('auth/login');
	}
}
