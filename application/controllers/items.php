<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model('M_items');
	}

	public function index(){
	  $config['single'] = false;
	  $this->view_data['items'] = $this->M_items->get_record(false, $config);
	}
	
	public function create(){
	 if($this->input->post()){
	   $data["name"] = $this->db->escape_str($this->input->post('name'));
	   $data["description"] = $this->db->escape_str($this->input->post('description'));
	   $data["value"] = $this->db->escape_str($this->input->post('value'));
	   $data["category"] = $this->db->escape_str($this->input->post('category'));
	   $data["area_category"] = $this->db->escape_str($this->input->post('area_category'));

	   if($this->M_items->create($data)){
	     redirect('items');
	   }

	 }
	}

	public function view($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;
   
	  $this->view_data['item'] = $this->M_items->get_record(false, $config);

	 if($this->input->post()){
	   $data["name"] = $this->db->escape_str($this->input->post('name'));
	   $data["description"] = $this->db->escape_str($this->input->post('description'));
	   $data["value"] = $this->db->escape_str($this->input->post('value'));
	   $data["category"] = $this->db->escape_str($this->input->post('category'));
	   $data["area_category"] = $this->db->escape_str($this->input->post('area_category'));

	   if($this->M_items->update($id, $data)){
	     redirect('items');
	   }

	 }
	}

	public function remove($id){

	  $data["remove"] = 1;
	  $this->M_items->update($id, $data);

	  redirect('items');

	}

	public function restore($id){

	  $data["remove"] =0 ;
	  $this->M_items->update($id, $data);

	  redirect('items');

	}


}

