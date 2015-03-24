<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();

      $this->load->library(array('session'));
    }


	/*=====================common function============================================*/

	//table: user

	function get_user($user_id){
		$query = $this->db->query("SELECT * FROM user WHERE user_id = '$user_id' ");
		return $query->row_array();
	}

	function get_all_user(){
		$query = $this->db->query('SELECT * FROM user');
		return $query->result_array();
	}
	
	function insert_user($data){
    	$this->db->insert('user', $data);
		return $this->db->insert_id();
    }

	function update_user($user_id, $data){
		$this->db->update('user', $data, array('user_id' => $user_id));
		return $this->db->affected_rows();
	}
	
	function delete_user($user_id){
		return $this->db->delete('user', array('user_id' => $user_id));
	}

	//table: category
	
	function get_category($category_id){
		$query = $this->db->query("SELECT * FROM category WHERE cat_id = '$category_id' ");
		return $query->row_array();
	}

	function get_all_category(){
		$query = $this->db->query('SELECT * FROM category');
		return $query->result_array();
	}
	
	//table: event

	function get_event($event_id){
		$query = $this->db->query("SELECT * FROM event WHERE event_id = '$event_id' ");
		return $query->row_array();
	}

	function get_all_event(){
		$query = $this->db->query('SELECT * FROM event');
		return $query->result_array();
	}
	
	function insert_event($data){
    	$this->db->insert('event', $data);
		return $this->db->insert_id();
    }

	function update_event($event_id, $data){
		$this->db->update('event', $data, array('event_id' => $event_id));
		return $this->db->affected_rows();
	}
	
	function delete_event($event_id){
		return $this->db->delete('event', array('event_id' => $event_id));
	}

	//table: event_user

	function get_event_user_by_event($event_id){
		$query = $this->db->query("SELECT * FROM event_user WHERE event_id = '$event_id' ");
		return $query->result_array();
	}

	function get_event_user_by_user($user_id){
		$query = $this->db->query("SELECT * FROM event_user WHERE user_id = '$user_id' ");
		return $query->result_array();
	}

	function get_event_user_by_event_user($event_id, $user_id){
		$query = $this->db->query("SELECT * FROM event_user WHERE event_id = '$event_id' and user_id = '$user_id' ");
		return $query->row_array();
	}

	function insert_event_user($data){
    	$this->db->insert('event_user', $data);
		return $this->db->insert_id();
    }

	function update_event_user($event_id, $user_id, $data){
		$this->db->update('event_user', $data, array('user_id' => $user_id, 'event_id' => $event_id));
		return $this->db->affected_rows();
	}
	
	function delete_event_user($event_id, $user_id){
		return $this->db->delete('event_user', array('user_id' => $user_id, 'event_id' => $event_id));
	}

	//table: user_rating

	function get_user_rating_by_user($user_id){
		$query = $this->db->query("SELECT * FROM user_rating WHERE user_id = '$user_id' ");
		return $query->result_array();
	}

	function get_user_rating_by_rater($rate_id){
		$query = $this->db->query("SELECT * FROM user_rating WHERE rate_id = '$rate_id' ");
		return $query->result_array();
	}
	
	function get_user_rating_by_user_rater($user_id, $rate_id){
		$query = $this->db->query("SELECT * FROM user_rating WHERE user_id = '$user_id' and rate_id = '$rate_id' ");
		return $query->row_array();
	}
	
	function insert_user_rating($data){
    	$this->db->insert('user_rating', $data);
		return $this->db->insert_id();
    }

	function update_user_rating($user_id, $rate_id, $data){
		$this->db->update('user_rating', $data, array('user_id' => $user_id, 'rate_id' => $rate_id));
		return $this->db->affected_rows();
	}
	
	function delete_user_rating($user_id, $rate_id){
		return $this->db->delete('user_rating', array('user_id' => $user_id, 'rate_id' => $rate_id));
	}

	//table: event_rating

	function get_event_rating_by_event($event_id){
		$query = $this->db->query("SELECT * FROM event_rating WHERE event_id = '$event_id' ");
		return $query->result_array();
	}

	function get_event_rating_by_rater($rate_id){
		$query = $this->db->query("SELECT * FROM event_rating WHERE rate_id = '$rate_id' ");
		return $query->result_array();
	}
	
	function get_event_rating_by_event_rater($event_id, $rate_id){
		$query = $this->db->query("SELECT * FROM event_rating WHERE event_id = '$event_id' and rate_id = '$rate_id' ");
		return $query->row_array();
	}
	
	function insert_event_rating($data){
    	$this->db->insert('event_rating', $data);
		return $this->db->insert_id();
    }

	function update_event_rating($event_id, $rate_id, $data){
		$this->db->update('event_rating', $data, array('event_id' => $event_id, 'rate_id' => $rate_id));
		return $this->db->affected_rows();
	}
	
	function delete_event_rating($event_id, $rate_id){
		return $this->db->delete('event_rating', array('event_id' => $event_id, 'rate_id' => $rate_id));
	}

	//table: sys_parameter

	function get_parameter($key){
		$query = $this->db->query("SELECT * FROM sys_parameter WHERE sys_key = '$key' ");
		return $query->row_array();
	}

	/* function get_all_user(){
		$query = $this->db->query('SELECT * FROM user');
		return $query->result_array();
	}
	
	function insert_user($data){
    	$this->db->insert('user', $data);
		return $this->db->insert_id();
    }

	function update_user($user_id, $data){
		$this->db->update('user', $data, array('user_id' => $user_id));
		return $this->db->affected_rows();
	}
	
	function delete_user($user_id){
		return $this->db->delete('user', array('user_id' => $user_id));
	} */

	




















	function login($username, $password){

		$query = $this->db->query("SELECT user_id, user_name, display_name, user_right FROM user WHERE user_name='$username' AND user_password='$password' ");
		if ($query->num_rows() == 0){
			return false;
		} else {
		$result = $query->row_array();
		$user_id = $result['user_id'];
		$user_right = $result['user_right'];
		$wedding_id = 0;
		$media_path ="";

		if ($user_right == 2){
			$query2 = $this->db->query("SELECT wedding_id FROM user_wedding WHERE user_id = $user_id ");
			$result2 = $query2->row_array();
			$wedding_id = $result2['wedding_id'];

			$this->load->model('wedding_model');
			$wedding_detail = $this->wedding_model->get_wedding_detail($wedding_id);
			$wedding_date = $wedding_detail['wedding_date'];

			$this->load->model('media_model');
			$wedding_media = $this->media_model->get_wedding_media($wedding_id);
			$media_path = $wedding_media['media_path'];

		}

		$result['wedding_id'] = $wedding_id;
		$result['media_path'] = $media_path;
		$result['wedding_date'] = $wedding_date;


		$result['logged_in'] = true;

		$this->session->set_userdata($result);
       return true;
      }
	}

	function change_password($user_id, $old_passwd, $new_passwd){
      $result = mysql_query('SELECT user_password FROM user WHERE user_id='.$user_id);
      if (!$result) return 0;
      else {
      	$row = mysql_fetch_assoc($result);
      	if ($row['user_password']==$old_passwd) {
          	$user_profile = array('user_password' => $new_passwd);
            $status = $this->update($user_profile,$user_id);
            return $status;
      	}
      	else return 0;
      }
	}





	/*=========================table========================================*/

	


/* 	function insert_user($data){
    	$this->db->insert('user', $data);
      return $this->db->insert_id();
    }


	function update_user($user_id, $data){
      $this->db->update('user', $data, array('user_id' => $user_id));
      return $this->db->affected_rows();
	}


	function delete_user($user_id){
      if(!is_numeric($user_id))
      	return false;
      return $this->db->delete('user', array('user_id' => $user_id));
	} */

	//table: user_relation

	function get_user_relation($user_relation){
      $query = $this->db->query("SELECT * FROM user_relation WHERE user_relation = $user_relation ");
      return $query->row_array();
	}

	function get_all_user_relation(){
      $query = $this->db->query("SELECT * FROM user_relation ");
      return $query->result_array();
	}

	function insert_user_relation($data){
    	$this->db->insert('user_relation', $data);
      return $this->db->insert_id();
    }


	function update_user_relation($user_relation, $data){
      $this->db->update('user_relation', $data, array('user_relation' => $user_relation));
      return $this->db->affected_rows();
	}


	function delete_user_relation($user_relation){
      if(!is_numeric($user_relation))
      	return false;
      return $this->db->delete('user_relation', array('user_relation' => $user_relation));
	}


	//table: user_side

	function get_user_side($user_side){
      $query = $this->db->query("SELECT * FROM user_side WHERE user_side = $user_side ");
      return $query->row_array();
	}

	function get_all_user_side(){
      $query = $this->db->query("SELECT * FROM user_side ");
      return $query->result_array();
	}

	function insert_user_side($data){
    	$this->db->insert('user_side', $data);
      return $this->db->insert_id();
    }


	function update_user_side($user_side, $data){
      $this->db->update('user_side', $data, array('user_side' => $user_side));
      return $this->db->affected_rows();
	}


	function delete_user_side($user_side){
      if(!is_numeric($user_side))
      	return false;
      return $this->db->delete('user_side', array('user_side' => $user_side));
	}


	//table: user_type

	function get_user_type($user_type){
      $query = $this->db->query("SELECT * FROM user_type WHERE user_type = $user_type ");
      return $query->row_array();
	}

	function get_all_user_type(){
      $query = $this->db->query("SELECT * FROM user_type ");
      return $query->result_array();
	}

	function insert_user_type($data){
    	$this->db->insert('user_type', $data);
      return $this->db->insert_id();
    }


	function update_user_type($user_type, $data){
      $this->db->update('user_type', $data, array('user_type' => $user_type));
      return $this->db->affected_rows();
	}


	function delete_user_type($user_type){
      if(!is_numeric($user_type))
      	return false;
      return $this->db->delete('user_type', array('user_type' => $user_type));
	}


	//table: user_wedding

	function get_user_wedding($user_id, $wedding_id){
      $query = $this->db->query("SELECT * FROM user_wedding WHERE user_id = $user_id AND wedding_id = $wedding_id ");
      return $query->row_array();
	}


	function insert_user_wedding($data){
    	$this->db->insert('user_wedding', $data);
      return $this->db->insert_id();
    }


	function update_user_wedding($user_id, $wedding_id, $data){
      $this->db->update('user_wedding', $data, array('user_id' => $user_id, 'wedding_id' => $wedding_id));
      return $this->db->affected_rows();
	}


	function delete_user_wedding($user_id, $wedding_id){
      if((!is_numeric($user_id))||(!is_numeric($wedding_id)))
      	return false;
      return $this->db->delete('user_wedding', array('user_id' => $user_id, 'wedding_id' => $wedding_id));
	}






}
