<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_time extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_work_time','M_users'));
	}
	

	public function time_track(){

	 if($this->input->post()){
	 // Get User
         $config['where']['username'] = $this->input->post('username') ;
	 $config['single'] = false;
         $user = $this->M_users->get_record(false, $config);

	 // Check Latest Time
	 $query = "select * from work_time 
	           where username = '".$this->input->post('username')."'
		   order by id desc
		   limit 1";
         $result = $this->db->query($query);
	 $work_time = $result->row();

	 if(!empty($user) && $work_time->category != $this->input->post('category')){
	   $data["time_on"] = date('Y-m-d H:i:s');
	   $data["username"] = $this->input->post('username');
	   $data["category"] = $this->input->post('category');

	   if($this->M_work_time->create($data)){
	     $this->session->set_flashdata('msg', $this->input->post('username')." Successfully ". str_replace('_', ' ', strtoupper($this->input->post('category'))));
	     redirect('users/number_of_hours/'.$this->input->post('username'));

	   }
	 }else{

	     $this->session->set_flashdata('msg', $this->input->post('username')." Sorry, but you are already ". str_replace('_', ' ', strtoupper($this->input->post('category'))));
	     redirect('home');
	 }

	 }
	}

	
	public function create(){
         $config['where']['remove'] = 0;
	 $config['single'] = false;

         $this->view_data['table_categories'] = $this->M_pos_table_categories->get_record(false, $config);
	 if($this->input->post()){
	   $data["name"] = $this->db->escape_str($this->input->post('name'));
	   $data["pos_table_category_id"] = $this->input->post('pos_table_category_id');

	   if($this->M_pos_tables->create($data)){
	     redirect('home');
	   }

	 }
	}


	public function remove($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;

	  $this->view_data['table'] = $table = $this->M_pos_tables->get_record(false, $config);

	  $data["remove"] = 1;
	  $this->M_pos_tables->update($id, $data);

	  redirect('pos_table_categories/view/'. $table->pos_table_category_id);

	}



}

