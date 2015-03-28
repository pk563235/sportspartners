<?php

class general_model extends CI_Model{

	function __construct(){
		parent::__construct();

	$this->load->helper(array('form', 'url','string','file'));
	$this->load->library(array('session'));
	}

	function general(){	

	date_default_timezone_set("Asia/Hong_Kong");
	$data['title']        = "Sports Partners";
	$data['base']         = $this->config->item('base_url');
	
	$data['css']          = 'css/style.css';
	$data['css_semantic'] = 'css/semantic.min.css';
	$data['js']			  = 'js/script.js';
	$data['js_semantic']  = 'js/semantic.min.js';
	$data['jquery']		  = 'js/jquery-1.11.2.min.js';

	
	if($this->session->userdata('logged_in')){
		$data['logined'] = true;
		$data['user_id']		= $this->session->userdata('user_id');
		$data['display_name']	= $this->session->userdata('display_name');
	} else {
		$data['logined'] = false;
	}
	
	return $data;	
 	}
	
	
	}


?>