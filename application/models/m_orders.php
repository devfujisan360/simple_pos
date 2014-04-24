<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_orders extends MY_Model{
	protected $_table = 'orders';

	public function __construct()
	{
	  parent::__construct();
	}
}
