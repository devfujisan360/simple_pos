<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MY_Controller {
	
	public function __construct(){
	  parent::__construct();
	  $this->load->model(array('M_orders','M_receipts','M_items'));
	}

	public function create($pos_table_id, $item_id,$receipt_id){
	   // Retrieved Data
	   $data["user_id"] = $this->userInfo['user_id'];
	   $data["pos_table_id"] = $pos_table_id;
	   $data["item_id"] = $item_id;
	   $data["receipt_id"] = $receipt_id;

	   $exist_data['where']["user_id"] = $this->userInfo['user_id'];
	   $exist_data['where']["pos_table_id"] = $pos_table_id;
	   $exist_data['where']["item_id"] = $item_id;
	   $exist_data['where']["receipt_id"] = $receipt_id;
	   $exist_data['single'] = TRUE;

	   $exist_order = $this->M_orders->get_record(false, $exist_data);

	   $config['where']['id'] = $receipt_id;
	   $config['single'] = TRUE;
	   $receipt = $this->M_receipts->get_record(false, $config);
	   $receipt_data['total'] = $receipt->total;

	   $item_config['where']['id'] = $item_id;
	   $item_config['single'] = TRUE;
	   $item = $this->M_items->get_record(false, $item_config);

	   if(empty($exist_order)){
	     $this->M_orders->create($data);
	     $receipt_data['total'] += $item->value;
	     $this->M_receipts->update($receipt_id, $receipt_data);
	     redirect('receipts/view/'.$receipt_id);
	   }else{
	     $data["count"] = $exist_order->count + 1;
	     $this->M_orders->update($exist_order->id, $data); 
	     $receipt_data['total'] += $item->value;
	     $this->M_receipts->update($receipt_id, $receipt_data);
	     redirect('receipts/view/'.$receipt_id);
	   }

	}

	public function remove($id){
	  $config['where']['id'] = $id;
	  $config['single'] = TRUE;

	  $order = $this->M_orders->get_record(false, $config);

	  $data["count"] = $order->count - 1;
	  $this->M_orders->update($id, $data);

	  $receipt_config['where']['id'] = $order->receipt_id;
	  $receipt_config['single'] = TRUE;
	  $receipt = $this->M_receipts->get_record(false, $receipt_config);

	  $item_config['where']['id'] = $order->item_id;
	  $item_config['single'] = TRUE;
	  $item = $this->M_items->get_record(false, $item_config);

	  $receipt_data['total'] = $receipt->total - $item->value;
	  $this->M_receipts->update($receipt->id, $receipt_data);


	  if($data['count'] <= 0 ){
	    $this->M_orders->delete($id);
	  }

          redirect('receipts/view/'.$order->receipt_id);

	}

}

