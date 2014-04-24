<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_users','M_work_time'));
	}

	public function index(){
	  $config['where']['remove'] = 0;
	  $config['single'] = false;
	  $this->view_data['users'] = $this->M_users->get_record(false, $config);

	  $configr['where']['remove'] = 1;
	  $configr['single'] = false;
	  $this->view_data['users_removed'] = $this->M_users->get_record(false, $configr);
	}
	
	public function create(){
	 if($this->input->post()){
	   $data["name"] = $this->db->escape_str($this->input->post('name'));
	   $data["username"] = $this->db->escape_str($this->input->post('username'));
	   $data["password"] = $this->db->escape_str($this->input->post('password'));
	   $data["usertype"] = $this->db->escape_str($this->input->post('usertype'));

	   if($this->M_users->create($data)){
	     redirect('users');
	   }

	 }
	}

	public function view($id){
	  $config['where']['id'] = $id;
	  $config['single'] = true;
	  $this->view_data['user'] = $user = $this->M_users->get_record(false, $config);

	 if($this->input->post()){
	   $data["name"] = $this->db->escape_str($this->input->post('name'));
	   $data["username"] = $this->db->escape_str($this->input->post('username'));
	   $data["password"] = $this->db->escape_str($this->input->post('password'));
	   $data["usertype"] = $this->db->escape_str($this->input->post('usertype'));

	   if($this->M_users->update($id, $data)){
	     redirect('users');
	   }

	 }
	}

	public function remove($id){

	  $data["remove"] = 1;
	  $this->M_users->update($id, $data);

	  redirect('users');

	}

	public function number_of_hours($username){
	  $config['where']['username'] = $username;
	  $config['single'] = true;
   
	  $this->view_data['user'] = $user = $this->M_users->get_record(false, $config);


	  $time = date('m');
	  $query = "select *
	  	    from work_time
		    where username = ".$username."
		    group by ". $time;
	  $result = $this->db->query($query);

	  $this->view_data['work_time'] = $result->result();
	}

}

