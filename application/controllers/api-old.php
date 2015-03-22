<?php
	header("Access-Control-Allow-Origin: *");
	
	class api extends CI_Controller{
		
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
		
		function get_all_user(){

			$data = $this->data_model->get_all_user();
			echo json_encode($data);

		}
		
		
		function login(){
			//login
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