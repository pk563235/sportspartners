<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->model(array('general_model','data_model'));
/* 		$this->load->library(array('session'));
		$this->load->helper('cookie'); */
	
		date_default_timezone_set("Asia/Hong_Kong");
	}

	public function Index(){
		$data = $this->general_model->general();
		
		/*
		if(!$data['logined']){
			redirect('/');
		}else{
			$this->load->view('index_view',$data);
		}
		*/
		
		if ($this->session->userdata('logged') == true)
			$this->load->view('index_view', $data);
		else
			$this->load->view('index_login',$data);
	}
	
	public function LoginFB() {
		if($this->input->post(NULL, TRUE)){	
			$data = $this->general_model->general();
			$clean_post = $this->input->post(NULL, TRUE);
			$get_data['id'] = $clean_post['id'];
			
			$user = $this->data_model->get_user($get_data['id']);
			if ($user == null)
			{
				$insert_data['user_id'] = $clean_post['id'];
				$insert_data['user_name'] = $clean_post['name'];
				$insert_data['user_fb_id'] = $clean_post['id'];
				$insert_data['user_gender'] = $clean_post['gender'];
				$insert_data['user_email'] = $clean_post['email'];
				$insert_data['user_status'] = "ACTIVE";
				
				$this->data_model->insert_user($insert_data);
				
				$user = $this->data_model->get_user($clean_post['id']);
			}

			$update_data['user_id'] = $clean_post['id'];
			$update_data['user_photo'] = "https://graph.facebook.com/".$clean_post['id']."/picture";
			$this->data_model->update_user($clean_post['id'], $update_data);
			
			//$cookie = array('user_id' => $update_data['user_id'],
			//				 'user_photo' => $update_data['user_photo']);

			$this->input->set_cookie("user_id",$update_data['user_id'],time()+3600);
			$this->input->set_cookie("user_photo",$update_data['user_photo'],time()+3600);
			
			$newdata = array(
				'user_id' => $update_data['user_id'],
				'user_photo' => $update_data['user_photo'],
				'logged' => TRUE
			);
			
			$this->session->set_userdata($newdata);

			
			//echo $this->input->cookie('value',true);
			
			$update_data['user_id']."<br>".$update_data['user_id'];
			//$this->load->view('index_view', $data);
			redirect('');
		}
		else
		{
			echo "error";
		}
	}
	
	public function Logout(){
		$this->load->helper('cookie');
		
		delete_cookie("user_id");
		delete_cookie("user_photo");
		
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_photo');
		$this->session->unset_userdata('logged');
		
		redirect('/');
	}
	
	private function CheckLogin(){
		$user_id = $this->input->cookie('user_id', false);
		if ($user_id == null || $user_id = "")
		{
			redirect('/');
			return false;
		}
		else
		{
			return true;
		}
	}
}
