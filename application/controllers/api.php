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
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				//$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_all_user();
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				//$get_data['user_id'] = $clean_post['user_id']; 
				
				$data = $this->data_model->get_all_category();
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
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
/* 			if($this->input->post(NULL, TRUE)){				
				//$clean_post = $this->input->post(NULL, TRUE);
				
				//$get_data['user_id'] = $clean_post['user_id']; */
				
				$data = $this->data_model->get_all_event();
				echo json_encode($data);
/* 			}
			else
			{
				echo "error";
			} */
		}
		
		// Get Hot 10 Events
		function get_hot_event(){
/* 			if($this->input->post(NULL, TRUE)){				
				//$clean_post = $this->input->post(NULL, TRUE);
				
				//$get_data['user_id'] = $clean_post['user_id']; */
				
				$data = $this->data_model->get_hot_event();
				echo json_encode($data);
/* 			}
			else
			{
				echo "error";
			} */
		}
		
		// Get Search Events
		function get_search_event(){
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				//$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_search_event($clean_post['search_name']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
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
					echo "error";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table Event_Rating ------------------------------------------------------------------------------------------------------------------
		
		// Table Event_Comment ------------------------------------------------------------------------------------------------------------------
		
		// Get Event Comment Information By Event ID
		function get_event_comment_by_event()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				
				$data = $this->data_model->get_event_Comment_by_event($get_data['event_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get Event Comment Information By User ID
		function get_event_comment_by_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['user_id'] = $clean_post['user_id'];
				
				$data = $this->data_model->get_event_comment_by_user($get_data['user_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Get Event Comment Information By Event ID & User ID
		function get_event_comment_by_event_user()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				$get_data['event_id'] = $clean_post['event_id'];
				$get_data['user_id'] = $clean_post['user_id'];
				
			$data = $this->data_model->get_event_comment_by_event_user($get_data['event_id'], $get_data['user_id']);
				echo json_encode($data);
			}
			else
			{
				echo "error";
			}
		}
		
		// Add New Event Comment
		function add_event_comment()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['event_id'] = $clean_post['event_id'];
				
				if ($clean_post['event_id'] != null && $clean_post['user_id'] != null && $clean_post['comment'] != null)
				{
					$insert_data['event_id'] = $clean_post['event_id'];
					$insert_data['user_id'] = $clean_post['user_id'];
					$insert_data['comment'] = $clean_post['comment'];
					
					$this->data_model->insert_event_comment($insert_data);
					
					$data = $this->data_model->get_event_Comment_by_event_user($clean_post['event_id'], $clean_post['user_id']);
					echo json_encode($data);
				}
				else
				{
					echo "error";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Update Event Comment
		function update_event_comment()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				$get_data['event_id'] = $clean_post['event_id'];
				
				if ($clean_post['event_id'] != null && $clean_post['user_id'] != null && $clean_post['comment'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					$where_data['user_id'] = $clean_post['user_id'];
					$insert_data['comment'] = $clean_post['comment'];
					
					$data = $this->data_model->update_event_comment($where_data['event_id'], $where_data['user_id'], $insert_data);
					
					echo json_encode($data);
				}
				else
				{
					echo "error";
				}
			}
			else
			{
				echo "error";
			}
		}
		
		// Delete Event Comment
		function delete_event_comment()
		{
			if($this->input->post(NULL, TRUE)){				
				$clean_post = $this->input->post(NULL, TRUE);
				
				if ($clean_post['event_id'] != null && $clean_post['user_id'] != null)
				{
					$where_data['event_id'] = $clean_post['event_id'];
					$where_data['user_id'] = $clean_post['user_id'];
					
					$data = $this->data_model->delete_event_comment($where_data['event_id'], $where_data['user_id']);
					
					echo json_encode($data);
				}
				else
				{
					echo "error";
				}
			}
			
			else
			{
				echo "error";
			}
		}
		
		// End Table Event_Comment ------------------------------------------------------------------------------------------------------------------
		
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
		
		// Function Login
		public function login() {
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
			$update_data['user_photo'] = "https://graph.facebook.com/".$clean_post['id']."/picture?type=normal";
			$this->data_model->update_user($clean_post['id'], $update_data);
			
			$data = $this->data_model->get_user($get_data['id']);
			echo json_encode($data);
		}
		else
		{
			echo "error";
		}
	}
		
		
		
		
		
		
		
		
		
		
		
		
	}	
		

?>