<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receipts extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_pos_tables','M_pos_table_categories','M_receipts', 'M_items', 'M_orders'));
	}

	public function create($pos_table_category_id, $pos_table_id){
	   $data["user_id"] = $this->userInfo['user_id'];
	   $data["pos_table_id"] = $pos_table_id;
	   $data["pos_table_category_id"] = $pos_table_category_id;
	
	   $process = $this->M_receipts->create($data);
	   if($process['status']){
	     redirect('receipts/view/'.$process['id']);
	   }

	}

	public function view($id){
	  $config['where']['receipts.id'] = $id;
	  $config['join'][] = array('table'=>'pos_table', 'on'=> 'pos_table.id = receipts.pos_table_id', 'type'=>'left');
	  $config['fields'] = array('receipts.*', 'pos_table.name');
	  $config['single'] = TRUE;

	  $this->view_data['receipt'] = $receipt  = $this->M_receipts->get_record(false, $config);

	    $item_config['single'] = FALSE;
	    $this->view_data['items'] = $this->M_items->get_record(false, $item_config);
	    $order_config['where']['receipt_id'] = $id;
	    $order_config['join'][] = array('table'=>'items', 'on'=> 'items.id = orders.item_id', 'type'=>'left');
	    $order_config['fields'] = array('items.*', 'orders.count','orders.id as orderid');

	    $this->view_data['orders'] = $this->M_orders->get_record(false, $order_config);

	  if(!$receipt->paid){

	    if($_POST){
	      $data['payment'] = intval($this->input->post('cash_handed_value')); 
	      $data['change'] = intval($this->input->post('change_value')); 
	      $data['paid'] = 1; 

	      $this->M_receipts->update($receipt->id, $data);

	      redirect('receipts/receipt_print/'.$receipt->id);
	    }
	}

	}

	public function view_paid($id){
	  $config['where']['receipts.id'] = $id;
	  $config['where']['receipts.paid'] = 1 ;
	  $config['join'][] = array('table'=>'pos_table', 'on'=> 'pos_table.id = receipts.pos_table_id', 'type'=>'left');
	  $config['fields'] = array('receipts.*', 'pos_table.name');
	  $config['single'] = TRUE;

	  $this->view_data['receipt']  = $this->M_receipts->get_record(false, $config);
	          
	    $order_config['where']['receipt_id'] = $id;
	    $order_config['join'][] = array('table'=>'items', 'on'=> 'items.id = orders.item_id', 'type'=>'left');
	    $order_config['fields'] = array('items.*');

	    $this->view_data['orders'] = $this->M_orders->get_record(false, $order_config);

	}


	public function pay($id){
	  $config['where']['receipts.id'] = $id;
	  $config['single'] = TRUE;

	  $this->view_data['receipt'] = $receipt = $this->M_receipts->get_record(false, $config);
	  
	  $data['paid'] = 1;
	  if($this->M_receipts->update($id, $data)){
	    redirect('receipts/receipt_print/'.$id);
          }

	}

	public function today(){
	  $config2['join'][] = array('table'=>'pos_table', 'on'=>'pos_table.id = receipts.pos_table_id', 'type'=>'left'); 
	  $config2['join'][] = array('table'=>'pos_table_categories', 'on'=>'pos_table_categories.id = receipts.pos_table_category_id', 'type'=>'left'); 
	  $config2['where']['receipts.created_at >'] = date('Y-m-d 00:00:00');
	  $config2['where']['receipts.created_at <'] = date('Y-m-d 24:00:00');
	  $config2['fields'] = array('receipts.*', 'pos_table.name as pos_table_name', 'pos_table_categories.name as pos_table_category_name');
	  $config2['where']['receipts.paid'] = 1;

	  $this->view_data['paid_receipts'] = $receipts = $this->M_receipts->get_record(false, $config2);

	}

	public function transfer_select_table_category($id){
	 $this->view_data['id'] = $id;
	 $tables  = $this->M_pos_table_categories->get_record(false); 
	
	 if($tables){
         $division = 3;
	 $this->view_data['table_division'] = 12/$division;
	 $data = array_chunk($tables, $division);

	 $this->view_data['tables'] = $data; 	

	 }
	}

	public function transfer_table_category($id, $pos_table_category_id){

	  $data['pos_table_category_id'] = $pos_table_category_id;

	   $process = $this->M_receipts->update($id, $data);
	   if($process){
	     redirect('receipts/transfer_select_table/'.$id.'/'.$pos_table_category_id);
	   }

	}

	public function transfer_select_table($id, $pos_table_category_id){
	  $config['where']['id'] = $pos_table_category_id;
	  $config['single'] = TRUE;
   
	  $this->view_data['pos_table_category'] = $table = $this->M_pos_table_categories->get_record(false, $config);

	  $table_config['where']['pos_table_category_id'] = $pos_table_category_id;

	  $tables  = $this->M_pos_tables->get_record(false, $table_config); 

          if($tables){
          $division = 4;
	  $this->view_data['table_division'] = 12/$division;
	  $data = array_chunk($tables, $division);

	  $this->view_data['tables'] = $data; 
	  }


	 $this->view_data['id'] = $id;
	}

	public function transfer_table($id, $pos_table_id){
	  $data['pos_table_id'] = $pos_table_id;
	  $config['single'] = TRUE;

	   $process = $this->M_receipts->update($id, $data);
	   if($process){
	     redirect('receipts/view/'.$id);
	   }

	}

	public function receipt_print($id){
	  $config['where']['receipts.id'] = $id;
	  $config['join'][] = array('table'=>'pos_table', 'on'=> 'pos_table.id = receipts.pos_table_id', 'type'=>'left');
	  $config['fields'] = array('receipts.*', 'pos_table.name');
	  $config['single'] = TRUE;

	  $data['receipt'] = $receipt  = $this->M_receipts->get_record(false, $config);

	    $item_config['single'] = FALSE;
	    $this->view_data['items'] = $this->M_items->get_record(false, $item_config);
	    $order_config['where']['receipt_id'] = $id;
	    $order_config['join'][] = array('table'=>'items', 'on'=> 'items.id = orders.item_id', 'type'=>'left');
	    $order_config['fields'] = array('items.*', 'orders.count','orders.id as orderid');

	    $data['orders'] = $this->M_orders->get_record(false, $order_config);

	$data['date'] = date('m/d/Y h:i:s');

	$this->load->library('mpdf');
	$html = $this->load->view('printables/receipt_print', $data, true);	
	$mpdf=new mPDF('','FOLIO','','',1,1,1,1,0,0); 
	$mpdf->WriteHTML($html);
	$mpdf->Output();

	exit;
	}

	public function cancel($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;

	  $this->view_data['receipt'] = $table = $this->M_receipts->get_record(false, $config);

	  $data["remove"] = 1;
	  $this->M_receipts->update($id, $data);

	  redirect('home');

	}





}

