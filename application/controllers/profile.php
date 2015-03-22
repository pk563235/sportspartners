<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();

	$this->load->model(array('general_model','data_model'));
	$this->load->library(array('session'));

	}

	public function index(){

		$data = $this->general_model->general();
		$user_array = $this->data_model->get_all_user();
		//print_r($user_array);
		$data['user_array'] = $user_array;
		
		$user_profile = $this->data_model->get_user("brian");
		$data['user_profile'] = $user_profile;

		$this->load->view('profile_view',$data);
	}
}
