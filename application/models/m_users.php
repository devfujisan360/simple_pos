<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends MY_Model{
	protected $_table = "users";

	public function __construct()
	{
	  parent::__construct();
	}

	public function auth_user($data){

	$username = $this->db->escape_str($data['username']);
	$password = $this->db->escape_str($data['password']);
	
	$config['where']['username'] = $username;
	$config['where']['password'] = $password;
	$config['single'] = TRUE;
        $user = $this->get_record('users', $config);	
	if($user){
		if($username == $user->username and $password == $user->password){
		 $user_data['username'] = $user->username;
		 $user_data['user_id'] = $user->id; 
		 $user_data['usertype'] = $user->usertype; 
		 $user_data['logged_in'] = TRUE; 
		 $this->session->set_userdata('userInfo', $user_data);
		 return TRUE;
		}else{
		 $user_data['username'] = FALSE;
		 $user_data['logged_in'] = FALSE; 
		 $user_data['user_id'] = FALSE; 
		 $user_data['usertype'] = FALSE; 
		 $this->session->set_userdata('userInfo', $user_data);
	         return FALSE;
		}
	}else{
	 return FALSE;
	}

	}

}
