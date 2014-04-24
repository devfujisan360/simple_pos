<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pos_tables extends MY_Model{
	protected $_table = 'pos_table';

	public function __construct()
	{
	  parent::__construct();
	}

	public function check_receipt_order($id){
	  $config['where']['pos_table_id'] = $id;
	  $config['where']['paid'] = 0;
	  $config['single'] = TRUE;

	  $receipt  = $this->M_receipts->get_record(false, $config); 

	  if($receipt){
	    return $receipt;
	  }else{
	    return FALSE;
	  }
	}		
}
