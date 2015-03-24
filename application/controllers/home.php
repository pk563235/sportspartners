<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		
	$this->load->model(array('general_model','data_model'));
	$this->load->library(array('session'));
	
	}

	public function index(){
		$data = $this->general_model->general();
		/*
		if(!$data['logined']){
			redirect('/');
		}else{
			$this->load->view('index_view',$data);
		}
		*/
		$this->load->view('index_view',$data);
	}
}
