<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos_tables extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_pos_tables','M_pos_table_categories','M_items'));
	}

	public function index(){
	  $config['where']['pos_table.remove'] = 0;
	  $config['join'][] = array('table'=>'pos_table_categories', 'on'=> 'pos_table_categories.id = pos_table.pos_table_category_id', 'type'=>'left');
	  $config['fields'] = array('pos_table.*', 'pos_table_categories.name as area_name');
	  $config['single'] = FALSE;
   
	  $this->view_data['active'] = $tables  = $this->M_pos_tables->get_record(false, $config);

	  $configr['where']['pos_table.remove'] = 1;
	  $configr['join'][] = array('table'=>'pos_table_categories', 'on'=> 'pos_table_categories.id = pos_table.pos_table_category_id', 'type'=>'left');
	  $configr['fields'] = array('pos_table.*', 'pos_table_categories.name as area_name');
	  $configr['single'] = FALSE;
   
	  $this->view_data['inactive'] = $tables  = $this->M_pos_tables->get_record(false, $configr);

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

	public function view($pos_table_id){
	  $config['where']['id'] = $pos_table_id;
	  $config['single'] = TRUE;
   
	  $this->view_data['table'] = $table = $this->M_pos_tables->get_record(false, $config);

	  $item_config['single'] = FALSE;
   
	  $this->view_data['items'] = $table = $this->M_items->get_record(false, $item_config);
	}

	public function remove($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;

	  $this->view_data['table'] = $table = $this->M_pos_tables->get_record(false, $config);

	  $data["remove"] = 1;
	  $this->M_pos_tables->update($id, $data);

	  redirect('pos_tables/');

	}

	public function restore($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;

	  $this->view_data['table'] = $table = $this->M_pos_tables->get_record(false, $config);

	  $data["remove"] = 0;
	  $this->M_pos_tables->update($id, $data);

	  redirect('pos_tables/');

	}


}

