<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct(){
		parent::__construct();

	$this->load->model(array('general_model','data_model'));
	/* $this->load->library(array('session')); */

	}

	public function Index(){

		$data = $this->general_model->general();
		$event_array = $this->data_model->get_all_event();
		//print_r($user_array);
		$data['event_array'] = $event_array;
		
		
	/* 	$user_id = $this->input->cookie('user_id', false);
		
		$user_profile = $this->data_model->get_user($user_id);
		$data['user_profile'] = $user_profile; */

		$this->load->view('event_list',$data);
	}
	
	public function HotEvent(){
		
		$data = $this->general_model->general();
		$event_array = $this->data_model->get_hot_event();
		//print_r($user_array);
		$data['event_array'] = $event_array;
		
		
	/* 	$user_id = $this->input->cookie('user_id', false);
		
		$user_profile = $this->data_model->get_user($user_id);
		$data['user_profile'] = $user_profile; */

		$this->load->view('event_hot',$data);
	}
	
	public function SearchEvent(){
		$data = $this->general_model->general();
		
		if($this->input->post(NULL, TRUE)){		
			$clean_post = $this->input->post(NULL, TRUE);
			
			
			if ($clean_post["search_name"] != null) {
				$event_array = $this->data_model->get_search_event($clean_post["search_name"]);
				//print_r($user_array);
				$data['event_array'] = $event_array;
			}
			else {
				$event_array = $this->data_model->get_all_event();
				//print_r($user_array);
				$data['event_array'] = $event_array;
			}
				
		}
		else {
			$event_array = $this->data_model->get_all_event();
			//print_r($user_array);
			$data['event_array'] = $event_array;
		}
	/* 	$user_id = $this->input->cookie('user_id', false);
		
		$user_profile = $this->data_model->get_user($user_id);
		$data['user_profile'] = $user_profile; */

		$this->load->view('event_search',$data);
	}
	
	public function View($event_id){

		$data = $this->general_model->general();
		$event = $this->data_model->get_event($event_id);
		$category = $this->data_model->get_category($event['cat_id']);
		$join_person = $this->data_model->get_event_user_total_join($event_id);
		$comment = $this->data_model->get_event_comment_by_event($event_id);
		//print_r($user_array);
		
		$data['event'] = $event;
		$data['category'] = $category;
		$data['join_person'] = $join_person;
		$data['comment'] = $comment;
		
	/* 	$user_id = $this->input->cookie('user_id', false);
		
		$user_profile = $this->data_model->get_user($user_id);
		$data['user_profile'] = $user_profile; */

		$this->load->view('event_view',$data);
	}
	
	public function Add_Comment(){
		if($this->input->post(NULL, TRUE)){		
			$clean_post = $this->input->post(NULL, TRUE);
			
			$user_id = $this->input->cookie('user_id', false);			
			
			if ($clean_post["event_id"] != null && $clean_post["user_comment"] != null &&
				$user_id != null)  {
					
				$insert_data['event_id'] = $clean_post['event_id'];
				$insert_data['user_id'] = $user_id;
				$insert_data['user_comment'] = $clean_post['user_comment'];
				
				$this->data_model->insert_event_comment($insert_data);
				
				redirect('Event/View/'.$clean_post["event_id"]);
			}
			
		}
		
	}
	
	public function Add() {
		$data = $this->general_model->general();
		$category = $this->data_model->get_all_category();
		
		$data['category'] = $category;
		
		$this->load->view('event_add', $data);
	}
	
	public function Add_Event() {		
		if($this->input->post(NULL, TRUE)){		
			$clean_post = $this->input->post(NULL, TRUE);
			
			$user_id = $this->input->cookie('user_id', false);
			
			if ($clean_post["event_name"] != null && $clean_post["event_date"] != null &&
				$clean_post["start_time"] != null && $clean_post["end_time"] != null &&
				$clean_post["event_person"] != null) 
			{
				$insert_data['event_name'] = $clean_post['event_name'];
				$insert_data['event_date'] = $clean_post['event_date'];
				$insert_data['start_time'] = $clean_post['start_time'];
				$insert_data['end_time'] = $clean_post['end_time'];
				$insert_data['cat_id'] = $clean_post['cat_id'];
				$insert_data['event_location'] = $clean_post['event_location'];
				$insert_data['event_person'] = $clean_post['event_person'];
				$insert_data['event_detail'] = $clean_post['event_detail'];
				$insert_data['event_status'] = 'ACTIVE';
				$insert_data['create_by'] = $user_id;
			
				$event_id = $this->data_model->insert_event($insert_data);
				
				redirect('Event/View/'.$event_id);
			}
		}
	}
	
}
