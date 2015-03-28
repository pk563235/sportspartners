<?php
	header("Access-Control-Allow-Origin: *");
	
	class Api extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			
			$this->load->model(array('general_model','data_model'));
			$this->load->library(array('session'));
			
			date_default_timezone_set("Asia/Hong_Kong");
		}
		
		function index(){
			$data = $this->general_model->general();
			echo "API";
		}
		
		// Table User ------------------------------------------------------------------------------------------------------------------
		
		// Get User Information
		function get_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_user($get_data['user_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get All Users
		function get_all_user(){
			/* if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id']; */
				
				$data = $this->data_model->get_all_user();
				echo json_encode($data);
			/* }
			else
			{
				echo "error";
			} */
		}
		
		// Add New User
		function add_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id'];
				
				if ($clean_post['user_id'] != null && $clean_post['user_name'] != null && $clean_post['user_age'] != null && 
					$clean_post['user_gender'] != null && $clean_post['user_mobile'] != null)
				{
					$insert_data['user_id'] = $clean_post['user_id'];
					$insert_data['user_name'] = $clean_post['user_name'];
					$insert_data['user_age'] = $clean_post['user_age'];
					$insert_data['user_fb_id'] = $clean_post['user_fb_id'];
					$insert_data['user_gender'] = $clean_post['user_gender'];
					$insert_data['user_mobile'] = $clean_post['user_mobile'];
					$insert_data['user_status'] = "ACTIVE";
					$insert_data['user_photo'] = $clean_post['user_photo'];
					
					$this->data_model->insert_user($insert_data);
					
					$data = $this->data_model->get_user($clean_post['user_id']);
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Update User
		function update_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id'];
				
				if ($clean_post['user_id'] != null && $clean_post['user_name'] != null && $clean_post['user_age'] != null && 
					$clean_post['user_gender'] != null && $clean_post['user_mobile'] != null)
				{
					$where_data['user_id'] = $clean_post['user_id'];
					$insert_data['user_name'] = $clean_post['user_name'];
					$insert_data['user_age'] = $clean_post['user_age'];
					$insert_data['user_fb_id'] = $clean_post['user_fb_id'];
					$insert_data['user_gender'] = $clean_post['user_gender'];
					$insert_data['user_mobile'] = $clean_post['user_mobile'];
					$insert_data['user_photo'] = $clean_post['user_photo'];
					
					$data = $this->data_model->update_user($where_data['user_id'], $insert_data);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Delete User
		function delete_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id'];
				
				if ($clean_post['user_id'] != null)
				{
					$where_data['user_id'] = $clean_post['user_id'];
					
					$data = $this->data_model->delete_user($where_data['user_id']);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table User ------------------------------------------------------------------------------------------------------------------
		
		// Table Category ------------------------------------------------------------------------------------------------------------------
				
		// Get Category Information
		function get_category()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['cat_id'] = $clean_post['cat_id'];
				
				$data = $this->data_model->get_category($get_data['cat_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get All Category
		function get_all_category(){
			/* if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id']; */
				
				$data = $this->data_model->get_all_category();
				echo json_encode($data);
			/* }
			else
			{
				echo "error";
			} */
		}
		
		// End Table Category ------------------------------------------------------------------------------------------------------------------
		
		// Table Event ------------------------------------------------------------------------------------------------------------------
		
		// Get Event Information
		function get_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				
				$data = $this->data_model->get_event($get_data['event_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get All Events
		function get_all_event(){
			/* if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id']; */
				
				$data = $this->data_model->get_all_event();
				echo json_encode($data);
			/* }
			else
			{
				echo "error";
			} */
		}
		
		// Add New Event
		function add_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['event_id'] != null && $clean_post['event_name'] != null && $clean_post['event_date'] != null && 
					$clean_post['event_startdate'] != null && $clean_post['event_enddate'] != null && $clean_post['cat_id'] != null &&
					$clean_post['event_location'] != null && $clean_post['event_person'] != null && $clean_post['event_deadline'] != null && 
					$clean_post['user_id'] != null)
				{
					$insert_data['event_id'] = $clean_post['event_id'];
					$insert_data['event_name'] = $clean_post['event_name'];
					$insert_data['event_date'] = $clean_post['event_date'];
					$insert_data['event_startdate'] = $clean_post['event_startdate'];
					$insert_data['event_enddate'] = $clean_post['event_enddate'];
					$insert_data['cat_id'] = $clean_post['cat_id'];
					$insert_data['event_location'] = $clean_post['event_location'];
					$insert_data['event_person'] = $clean_post['event_person'];
					$insert_data['event_detail'] = $clean_post['event_detail'];
					$insert_data['event_deadline'] = $clean_post['event_deadline'];
					$insert_data['create_by'] = $clean_post['user_id'];
					$insert_data['create_date'] = $clean_post['create_date'];
					
					$this->data_model->insert_event($insert_data);
					
					$data = $this->data_model->get_event($clean_post['event_id']);
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Update Event
		function update_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['event_id'] != null && $clean_post['event_name'] != null && $clean_post['event_date'] != null && 
					$clean_post['event_startdate'] != null && $clean_post['event_enddate'] != null && $clean_post['cat_id'] != null &&
					$clean_post['event_location'] != null && $clean_post['event_person'] != null && $clean_post['event_deadline'] != null && 
					$clean_post['user_id'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					$insert_data['event_name'] = $clean_post['event_name'];
					$insert_data['event_date'] = $clean_post['event_date'];
					$insert_data['event_startdate'] = $clean_post['event_startdate'];
					$insert_data['event_enddate'] = $clean_post['event_enddate'];
					$insert_data['cat_id'] = $clean_post['cat_id'];
					$insert_data['event_location'] = $clean_post['event_location'];
					$insert_data['event_person'] = $clean_post['event_person'];
					$insert_data['event_detail'] = $clean_post['event_detail'];
					$insert_data['event_deadline'] = $clean_post['event_deadline'];
					$insert_data['create_by'] = $clean_post['user_id'];
					$insert_data['create_date'] = $clean_post['create_date'];
					
					$data = $this->data_model->update_event($where_data['event_id'], $insert_data);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Delete Event
		function delete_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['event_id'] = $clean_post['event_id'];
				
				if ($clean_post['event_id'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					
					$data = $this->data_model->delete_event($where_data['event_id']);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table Event ------------------------------------------------------------------------------------------------------------------
		
		// Table Event_User ------------------------------------------------------------------------------------------------------------------
		
		// Get Event User Information by Event ID
		function get_event_user_by_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				
				$data = $this->data_model->get_event_user_by_event($get_data['event_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get Event User Information by User ID
		function get_event_user_by_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_event_user_by_user($get_data['user_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get Event User Information by Event ID & User ID
		function get_event_user_by_event_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_event_user_by_event_user($get_data['event_id'], $get_data['user_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Add New Event_User
		function add_event_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['event_id'] != null && $clean_post['user_id'] != null)
				{
					$insert_data['event_id'] = $clean_post['event_id'];
					$insert_data['user_id'] = $clean_post['user_id'];
					
					$this->data_model->insert_event_user($insert_data);
					
					$data = $this->data_model->get_event_user_by_event_user($clean_post['event_id'], $clean_post['user_id']);
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Delete Event_User
		function delete_event_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['event_id'] != null && $clean_post['user_id'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					$where_data['user_id'] = $clean_post['user_id'];
					
					$data = $this->data_model->delete_event_user($where_data['event_id'], $where_data['user_id']);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table Event_User ------------------------------------------------------------------------------------------------------------------
		
		// Table User_Rating ------------------------------------------------------------------------------------------------------------------
		
		// Get User Rating Information By User ID
		function get_user_rating_by_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_user_rating_by_user($get_data['user_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get User Rating Information By Rater ID
		function get_user_rating_by_rater()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['rate_id'] = $clean_post['rate_id'];
				
				$data = $this->data_model->get_user_rating_by_rater($get_data['rate_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get User Rating Information By User ID & Rater ID
		function get_user_rating_by_user_rater()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				$get_data['rate_id'] = $clean_post['rate_id'];
				
			$data = $this->data_model->get_user_rating_by_user_rater($get_data['user_id'], $get_data['rate_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Add New User Rating
		function add_user_rating()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id'];
				
				if ($clean_post['user_id'] != null && $clean_post['rate_id'] != null && $clean_post['rating'] != null)
				{
					$insert_data['user_id'] = $clean_post['user_id'];
					$insert_data['rate_id'] = $clean_post['rate_id'];
					$insert_data['rating'] = $clean_post['rating'];
					$insert_data['comment'] = $clean_post['comment'];
					
					$this->data_model->insert_user_rating($insert_data);
					
					$data = $this->data_model->get_user_rating_by_user_rater($clean_post['user_id'], $clean_post['rate_id']);
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Update User Rating
		function update_user_rating()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['user_id'] = $clean_post['user_id'];
				
				if ($clean_post['user_id'] != null && $clean_post['rate_id'] != null && $clean_post['rating'] != null)
				{
					$where_data['user_id'] = $clean_post['user_id'];
					$where_data['rate_id'] = $clean_post['rate_id'];
					$insert_data['rating'] = $clean_post['rating'];
					$insert_data['comment'] = $clean_post['comment'];
					
					$data = $this->data_model->update_user_rating($where_data['user_id'], $where_data['rate_id'], $insert_data);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Delete User Rating
		function delete_user_rating()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['user_id'] != null && $clean_post['rate_id'] != null)
				{
					$where_data['user_id'] = $clean_post['user_id'];
					$where_data['rate_id'] = $clean_post['rate_id'];
					
					$data = $this->data_model->delete_user_rating($where_data['user_id'], $where_data['rate_id']);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table User_Rating ------------------------------------------------------------------------------------------------------------------
		
		// Table Event_Rating ------------------------------------------------------------------------------------------------------------------
		
		// Get Event Rating Information By Event ID
		function get_event_rating_by_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				
				$data = $this->data_model->get_event_rating_by_event($get_data['event_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get Event Rating Information By Rater ID
		function get_event_rating_by_rater()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['rate_id'] = $clean_post['rate_id'];
				
				$data = $this->data_model->get_event_rating_by_rater($get_data['rate_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get Event Rating Information By Event ID & Rater ID
		function get_event_rating_by_event_rater()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				$get_data['rate_id'] = $clean_post['rate_id'];
				
			$data = $this->data_model->get_event_rating_by_event_rater($get_data['event_id'], $get_data['rate_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Add New Event Rating
		function add_event_rating()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['event_id'] = $clean_post['event_id'];
				
				if ($clean_post['event_id'] != null && $clean_post['rate_id'] != null && $clean_post['rating'] != null)
				{
					$insert_data['event_id'] = $clean_post['event_id'];
					$insert_data['rate_id'] = $clean_post['rate_id'];
					$insert_data['rating'] = $clean_post['rating'];
					$insert_data['comment'] = $clean_post['comment'];
					
					$this->data_model->insert_event_rating($insert_data);
					
					$data = $this->data_model->get_event_rating_by_event_rater($clean_post['event_id'], $clean_post['rate_id']);
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Update Event Rating
		function update_event_rating()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['event_id'] = $clean_post['event_id'];
				
				if ($clean_post['event_id'] != null && $clean_post['rate_id'] != null && $clean_post['rating'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					$where_data['rate_id'] = $clean_post['rate_id'];
					$insert_data['rating'] = $clean_post['rating'];
					$insert_data['comment'] = $clean_post['comment'];
					
					$data = $this->data_model->update_event_rating($where_data['event_id'], $where_data['rate_id'], $insert_data);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Delete Event Rating
		function delete_event_rating()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['event_id'] != null && $clean_post['rate_id'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					$where_data['rate_id'] = $clean_post['rate_id'];
					
					$data = $this->data_model->delete_event_rating($where_data['event_id'], $where_data['rate_id']);
					
					echo json_encode($data);
				}
				else
				{
					echo "missing Data";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table Event_Rating ------------------------------------------------------------------------------------------------------------------
		
		// Table Sys_Parameter ------------------------------------------------------------------------------------------------------------------
		
		// Get System Parameter
		function get_sys_parameter()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['sys_key'] = $clean_post['sys_key'];
				
				$data = $this->data_model->get_sys_parameter($get_data['sys_key']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// End Table Sys_Parameter ------------------------------------------------------------------------------------------------------------------
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		function login(){
			//login
			$this->session->set_userdata('some_name', 'some_value');
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$user_name = $clean_post['user_name'];
				$user_password = md5($clean_post['user_password']);
				
				if($this->user_model->login($user_name, $user_password) ){
					//login success
					
					$response['base'] = $this->config->item('base_url');
					$response['user_id'] = $this->session->userdata('user_id');
					$response['display_name'] = $this->session->userdata('display_name');
					$response['wedding_date'] = $this->session->userdata('wedding_date');
					$response['user_right'] = $this->session->userdata('user_right');
					$response['wedding_id'] = $this->session->userdata('wedding_id');
					$response['media_path'] = $this->session->userdata('media_path');
					
					echo json_encode($response);
					
					}else{
					echo "error";
				}
				}else{
				echo "error";
			}
			
		}
		
		
		function get_wedding_detail(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['wedding_id'] = $clean_post['wedding_id'];
				$data = $this->wedding_model->get_wedding_detail( $get_data['wedding_id']);
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		function get_wedding_intro(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['wedding_id'] = $clean_post['wedding_id'];
				$data = $this->wedding_model->get_wedding_intro( $get_data['wedding_id']);
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		function get_wedding_schedule(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['wedding_id'] = $clean_post['wedding_id'];
				$data = $this->wedding_model->get_all_wedding_schedule( $get_data['wedding_id']);
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		function get_wedding_info(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['wedding_id'] = $clean_post['wedding_id'];
				$data = $this->wedding_model->get_wedding_info( $get_data['wedding_id']);
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		
		
		function get_table(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				$get_data['wedding_id'] = $clean_post['wedding_id'];
				$data = $this->wedding_model->get_table($get_data['user_id'], $get_data['wedding_id']);
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		function get_attend(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				$data = $this->wedding_model->get_attend($get_data['user_id']);
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		function update_attend(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$where_data['user_id'] = $clean_post['user_id'];
				$where_data['wedding_id'] = $clean_post['wedding_id'];
				$insert_data['people_number'] = $clean_post['people_number'];
				$insert_data['status'] = $clean_post['status'];
				
				$data = $this->wedding_model->update_attend($where_data['user_id'], $where_data['wedding_id'], $insert_data);
				
				echo json_encode($data);
				
				}else{
				echo "error";
			}
			
		}
		
		function get_wedding_loc(){
			
			if($this->input->post(NULL, TRUE)){
				
				$clean_post = $this->input->post(NULL, TRUE);
				$where_data['wedding_id'] = $clean_post['wedding_id'];
				
				$data = $this->wedding_model->get_wedding_loc($where_data['wedding_id']);
				
				echo json_encode($data);
				
				}else{
				echo "error";
			}
		}
		
		
		function get_work_type(){
			
			$work_types = $this->wedding_model->get_all_work_type();
			echo json_encode($work_types);
			
		}
		
		
		function get_wedding_work_by_type(){
			
			
			$clean_post = $this->input->post(NULL, TRUE);
			
			if($clean_post['wedding_id'] != null && $clean_post['work_type'] != null)
			{
				$works = $this->wedding_model-> get_wedding_work_by_type($clean_post['wedding_id'], $clean_post['work_type']);
				
				for($i = 0; $i < count($works); ++$i) {
					$works[$i]['users'] = $this->wedding_model-> get_work_user_info($works[$i]['work_id']);
				}
				
				echo json_encode($works);
				}else{
				echo "error";
			}
			
		} 
		
		function get_congrats(){
			if($this->input->post(NULL, TRUE)){
				$clean_post = $this->input->post(NULL, TRUE);
				
				if($clean_post['wedding_id'] != null)
				{
					$congrats = $this->wedding_model-> get_wedding_congrat($clean_post['wedding_id']);
					
					for($i = 0; $i < count($congrats); ++$i) {
						$temp = $this->user_model->get_user($congrats[$i]['user_id']);
						$congrats[$i]['user_display_name'] = $temp['display_name'];
					}
					
					echo json_encode($congrats);
				}
				}else{
				echo "error";
			}
			
		}
		
		function add_congrats(){
			if($this->input->post(NULL, TRUE)){
				$clean_post = $this->input->post(NULL, TRUE);
				
				if($clean_post['wedding_id'] != null && $clean_post['user_id'] != null && $clean_post['congrat_msg'] != null)
				{
					$insert_data['wedding_id'] = $clean_post['wedding_id'];
					$insert_data['user_id'] = $clean_post['user_id'];
					$insert_data['congrat_msg'] = nl2br($clean_post['congrat_msg']);
					
					$this->wedding_model->insert_congrat($insert_data);
					
					$congrats = $this->wedding_model-> get_wedding_congrat($clean_post['wedding_id']);
					
					for($i = 0; $i < count($congrats); ++$i) {
						$temp = $this->user_model->get_user($congrats[$i]['user_id']);
						$congrats[$i]['user_display_name'] = $temp['display_name'];
						
					}
					
					echo json_encode($congrats);
				}
				}else{
				echo "error";
			}
		}
	function get_news(){
		if($this->input->post(NULL, TRUE)){
			$clean_post = $this->input->post(NULL, TRUE);
	
			if($clean_post['wedding_id'] != null)
			{
				$news = $this->wedding_model-> get_wedding_news($clean_post['wedding_id']);
				
				echo json_encode($news);
			}
		}else{
			echo "error";
		}

	}
	
	function get_albums(){
		if($this->input->post(NULL, TRUE)){
			$clean_post = $this->input->post(NULL, TRUE);
	
			if($clean_post['wedding_id'] != null)
			{
				$albums = $this->media_model-> get_wedding_album($clean_post['wedding_id']);
				for($i = 0; $i < count($albums); ++$i) {
					$temp = $this->media_model->get_top_2_album_photo($albums[$i]["album_id"]);
					$albums[$i]['top2_photo'] = $temp;
					
				}
				echo json_encode($albums);
			}
		}else{
			echo "error";
		}

	}
	
	function get_album_photos(){
		if($this->input->post(NULL, TRUE)){
			$clean_post = $this->input->post(NULL, TRUE);
	
			if($clean_post['album_id'] != null)
			{
				$albums = $this->media_model-> get_album($clean_post['album_id']);
				$temp = $this->media_model->get_album_photo($albums["album_id"]);
				$albums['photos'] = $temp;
				echo json_encode($albums);
			}
		}else{
			echo "error";
		}

	}
	
	function get_wedding_gift(){
		if($this->input->post(NULL, TRUE)){
			$clean_post = $this->input->post(NULL, TRUE);
	
			if($clean_post['wedding_id'] != null)
			{
				$gifts = $this->gift_model-> get_all_wedding_gift($clean_post['wedding_id']);
				for($i = 0; $i < count($gifts); ++$i) {
					$temp = $this->media_model->get_photo($gifts[$i]["gift_photo_id"]);
					$gifts[$i]['photo'] = $temp;
				}
				echo json_encode($gifts);
			}
		}else{
			echo "error";
		}

	}
		
}
?>