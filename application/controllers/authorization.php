<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorization extends MY_Controller{
	protected $userInfo;

	public function __construct(){
	
	  parent::__construct();
	  $this->load->model(array('M_users'));
	  $this->view_data["userInfo"] = $userInfo =  $this->userInfo;

	}

	public function check(){
	  if($_POST){
	  $config['where']['username'] = $this->input->post('username'); 
	  $config['single'] = TRUE;

	  $user = $this->M_users->get_record('users', $config);
	  if($user){
		  if($user->usertype == "admin"){
		    redirect($this->input->post('proccess_url'));
		  }else{
		    redirect($this->input->post('current_url'));
		    $this->set_flashdata('system', '<div class="alert alert-danger">Sorry, you are not allowed to access that page</div>'); 
		  }
	  }else{
		    redirect($this->input->post('current_url'));
		    $this->set_flashdata('system', '<div class="alert alert-danger">Sorry, no user'.$this->input->post('username').'</div>'); 
	  }
	}
	}
}
