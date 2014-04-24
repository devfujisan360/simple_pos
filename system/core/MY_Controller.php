<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	}

        public function _output($output)
        {
            if($this->content_view !== FALSE && empty($this->content_view))
                    {
                    $this->content_view = 'enrollment/'.$this->router->class . '/' . $this->router->method;
            }
                   
            $yield = file_exists(APPPATH . 'views/' . $this->content_view . EXT) ? $this->load->view($this->content_view, $this->view_data, TRUE) : FALSE ;
           
                   
            if($this->layout_view)
                    {
                            if($this->nocache == true)
                            {
                                    echo $this->disable_browser_cache();
                            }
                echo $this->load->view('enrollment/' . $this->layout_view, array('yield' => $yield), TRUE);
            }else{
                echo $yield;
                    }
                    //output profiler
                    echo $output;
            }
}
