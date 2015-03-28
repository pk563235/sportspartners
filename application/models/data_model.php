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
		$query = $this->db->query("SELECT * FROM user WHERE user_id = '$user_id' AND user_status = 'ACTIVE'");
		return $query->row_array();
	}

	function get_all_user(){
		$query = $this->db->query("SELECT user_id, user_name, user_photo FROM user WHERE user_status = 'ACTIVE'");
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
		$query = $this->db->query("SELECT * FROM category WHERE cat_id = '$category_id'");
		return $query->row_array();
	}

	function get_all_category(){
		$query = $this->db->query("SELECT * FROM category ");
		return $query->result_array();
	}
	
	//table: event

	function get_event($event_id){
		$query = $this->db->query("SELECT * FROM event WHERE event_id = '$event_id' AND event_status = 'ACTIVE' ");
		return $query->row_array();
	}

	function get_all_event(){
		$query = $this->db->query("SELECT e.* , IFNULL(j.join_person, 0) AS join_person, c.cat_name, u.user_name
										FROM event e
										LEFT JOIN (
											SELECT event_id, COUNT( * ) AS join_person
											FROM event_user
											GROUP BY event_id
										) j ON e.event_id = j.event_id
										, category c, user u
										WHERE e.cat_id = c.cat_id AND e.create_by = u.user_id AND event_date >= CURDATE( ) AND event_status = 'ACTIVE' ");
		return $query->result_array();
	}
	
	function get_hot_event(){
		$query = $this->db->query("SELECT e.* , IFNULL(j.join_person, 0) AS join_person, c.cat_name, u.user_name
										FROM event e
										LEFT JOIN (
											SELECT event_id, COUNT( * ) AS join_person
											FROM event_user
											GROUP BY event_id
										) j ON e.event_id = j.event_id
										, category c, user u
										WHERE e.cat_id = c.cat_id AND e.create_by = u.user_id AND event_date >= CURDATE( ) AND event_status = 'ACTIVE'
										ORDER by create_date desc limit 10");
		return $query->result_array();
	}
	
	function get_search_event($search_name){
		$query = $this->db->query("SELECT e.* , IFNULL(j.join_person, 0) AS join_person, c.cat_name, u.user_name
										FROM event e
										LEFT JOIN (
											SELECT event_id, COUNT( * ) AS join_person
											FROM event_user
											GROUP BY event_id
										) j ON e.event_id = j.event_id
										, category c, user u
										WHERE e.cat_id = c.cat_id AND e.create_by = u.user_id AND event_date >= CURDATE( ) AND event_status = 'ACTIVE'
										AND (e.event_name like '%$search_name%' OR c.cat_name like '%$search_name%')");
		return $query->result_array();
	}
	
	function get_event_new_id() {
		$query = $this->db->query("SELECT event_id + 1 as event_id FROM event ORDER BY event_id desc limit 1");
		return $query->row_array();
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

	function get_event_user_total_join($event_id) {
		$query = $this->db->query("SELECT count(*) AS join_person FROM event_user WHERE event_id = '$event_id' ");
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

	//table: event_comment

	function get_event_comment_by_event($event_id){
		$query = $this->db->query("SELECT * FROM event_comment WHERE event_id = '$event_id' ");
		return $query->result_array();
	}

	function get_event_comment_by_user($user_id){
		$query = $this->db->query("SELECT * FROM event_comment WHERE user_id = '$user_id' ");
		return $query->result_array();
	}
	
	function get_event_comment_by_event_user($event_id, $user_id){
		$query = $this->db->query("SELECT * FROM event_comment WHERE event_id = '$event_id' and user_id = '$user_id' ");
		return $query->row_array();
	}
	
	function insert_event_comment($data){
    	$this->db->insert('event_comment', $data);
		return $this->db->insert_id();
    }

	function update_event_comment($event_id, $user_id, $data){
		$this->db->update('event_comment', $data, array('event_id' => $event_id, 'user_id' => $user_id));
		return $this->db->affected_rows();
	}
	
	function delete_event_comment($event_id, $user_id){
		return $this->db->delete('event_comment', array('event_id' => $event_id, 'user_id' => $user_id));
	}

	//table: sys_parameter

	function get_parameter($key){
		$query = $this->db->query("SELECT * FROM sys_parameter WHERE sys_key = '$key' ");
		return $query->row_array();
	}





}
