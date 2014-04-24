<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends Common {
   	protected $userInfo;
	public function __construct()
	{
	  parent::__construct();


	  if($this->session->userdata('userInfo')['logged_in']){
	  $this->userInfo = $this->session->userdata('userInfo');
	  $this->view_data['userInfo'] = $this->userInfo;
	  
	  if($this->userInfo['logged_in']){
	  }else{
	    redirect('auth/login');
	  }
	  }
	}
}

class MY_Login extends Common {

	public function __construct()
	{
	  parent::__construct();
	  
	  $this->userInfo = $this->session->userdata('userInfo');
	  $this->view_data['userInfo'] = $this->userInfo;
	  if($this->userInfo['logged_in']){
	   if($this->router->method != "logout"){
	    redirect('home');
	   }
	  }else{
	  }
	}

}


class Common extends CI_Controller {

	protected $layout_location = 'layout' ;
	protected $layout_view = 'application' ;
	protected $content_view = '' ;
	protected $view_data = array() ;

	public function __construct()
	{
	  parent::__construct();
	}

        public function _output($output)
        {
            if($this->content_view !== FALSE && empty($this->content_view))
                    {
                    $this->content_view = $this->router->class . '/' . $this->router->method;
            }
                   
            $yield = file_exists(APPPATH . 'views/' . $this->content_view . EXT) ? $this->load->view($this->content_view, $this->view_data, TRUE) : FALSE ;
           
                   
            if($this->layout_view)
	    {
                echo $this->load->view($this->layout_location.'/'.$this->layout_view, array('yield' => $yield), TRUE);
            }else{
                echo $yield;
                    }
                    //output profiler
                    echo $output;
            }
}
