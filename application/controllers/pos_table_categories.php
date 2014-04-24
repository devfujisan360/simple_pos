<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos_table_categories extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_pos_table_categories','M_pos_tables', 'M_receipts'));
	}

	public function index(){
	  $config['where']['remove'] = 0;
	  $config['single'] = FALSE;
   
	  $this->view_data['active']  = $this->M_pos_table_categories->get_record(false, $config);

	  $configa['where']['remove'] = 1;
	  $configa['single'] = FALSE;
   
	  $this->view_data['inactive']  = $this->M_pos_table_categories->get_record(false, $configa);

	}
	
	public function create(){
	 if($this->input->post()){
	   $data["name"] = $this->db->escape_str($this->input->post('name'));
           $process = $this->M_pos_table_categories->create($data);

	   if($process){
	     redirect('pos_table_categories/view/'.$process['id']);
	   }

	 }
	}

	public function view($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;
   
	  $this->view_data['pos_table_category'] = $table = $this->M_pos_table_categories->get_record(false, $config);

	  $table_config['where']['pos_table_category_id'] = $id;
	  $table_config['where']['remove'] = 0;

	  $tables  = $this->M_pos_tables->get_record(false, $table_config); 

          if($tables){
          $division = 4;
	  $this->view_data['table_division'] = 12/$division;
	  $data = array_chunk($tables, $division);

	  $this->view_data['tables'] = $data; 

	  foreach($tables as $key => $value){
	   $this->view_data['table_receipt'][$value->id] =  $this->M_pos_tables->check_receipt_order($value->id);
	  }

  	  }
	}

	public function remove($id){
	  $data["remove"] = 1;
	  $this->M_pos_table_categories->update($id, $data);

	  redirect('pos_table_categories');

	}

	public function restore($id){
	  $data["remove"] = 0;
	  $this->M_pos_table_categories->update($id, $data);

	  redirect('pos_table_categories');

	}


}

