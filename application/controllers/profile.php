<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();

	$this->load->model(array('general_model','data_model'));
	/* $this->load->library(array('session')); */

	}

	public function Index(){

		$data = $this->general_model->general();
		$user_array = $this->data_model->get_all_user();
		//print_r($user_array);
		$data['user_array'] = $user_array;
		
		
		$user_id = $this->input->cookie('user_id', false);
		
		$user_profile = $this->data_model->get_user($user_id);
		$data['user_profile'] = $user_profile;

		$this->load->view('profile',$data);
	}
	
	public function Profile_Update() {
		$data = $this->general_model->general();
		
		if($this->input->post(NULL, TRUE)){				
			$clean_post = $this->input->post(NULL, TRUE);
			
			$get_data['user_id'] = $clean_post['user_id'];
			
			if ($clean_post['user_id'] != null && $clean_post['user_name'] != null)
			{
				$where_data['user_id'] = $clean_post['user_id'];
				$insert_data['user_name'] = $clean_post['user_name'];
				$insert_data['user_age'] = $clean_post['user_age'];
				$insert_data['user_fb_id'] = $clean_post['user_id'];
				$insert_data['user_gender'] = $clean_post['user_gender_select'];
				$insert_data['user_mobile'] = $clean_post['user_mobile'];
				$insert_data['user_detail'] = $clean_post['user_detail'];
				
				$user_profile = $this->data_model->update_user($where_data['user_id'], $insert_data);
				
				$user_profile = $this->data_model->get_user($where_data['user_id']);
				$data['user_profile'] = $user_profile;
			}
			else
			{
			}
		}
		else
		{
		}
		
		
		$this->load->view('profile_view',$data);
	}
}
