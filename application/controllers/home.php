<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_pos_table_categories','M_receipts','M_pos_tables'));
	}
	
	public function index(){
         $config_data['where']['remove'] = 0;
	 $this->view_data['area'] =$area  = $this->M_pos_table_categories->get_record(false, $config_data); 

         if($area){
           foreach($area as $a){
             $config_data2['where']['pos_table_category_id'] = $a->id;
             $config_data2['where']['remove'] = 0;
	     $this->view_data['table'][$a->id]  = $tables = $this->M_pos_tables->get_record(false, $config_data2); 
		  if($tables){
		  foreach($tables as $key => $value){
		   $this->view_data['table_receipt'][$value->id] =  $this->M_pos_tables->check_receipt_order($value->id);
		  }
		  } }
	  }
	
	  $config2['join'][] = array('table'=>'pos_table', 'on'=>'pos_table.id = receipts.pos_table_id', 'type'=>'left'); 
	  $config2['join'][] = array('table'=>'pos_table_categories', 'on'=>'pos_table_categories.id = receipts.pos_table_category_id', 'type'=>'left'); 
	  $config2['where']['receipts.created_at >'] = date('Y-m-d 00:00:00');
	  $config2['where']['receipts.created_at <'] = date('Y-m-d 24:00:00');
	  $config2['fields'] = array('receipts.*', 'pos_table.name as pos_table_name', 'pos_table_categories.name as pos_table_category_name');
	  $config2['where']['receipts.paid'] = 0;

	  $this->view_data['unpaid_receipts'] = $receipts = $this->M_receipts->get_record(false, $config2);
	}


}

