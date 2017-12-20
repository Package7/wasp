<?php

	class Users_Model extends CI_Model {
		public $result = '';
		
		public function __construct() {
			parent::__construct();
		}
		
		public function get_users() {
			try {
				$query = $this->db->query("SELECT * FROM users_groups AS t1 LEFT JOIN users AS t2 ON t2.id=t1.user_id LEFT JOIN groups AS t3 ON t3.id=t1.group_id GROUP BY t1.user_id");
				
				if($query->num_rows() == 0) {
					return false;
				} else {
					$this->result = $query->result_array();
					return true;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
		
		public function activate_user($activation_code) {
			try {
				$query = $this->db->query("SELECT activation_code FROM users WHERE activation_code = '$activation_code'");
				
				if($query->num_rows() == 1) {
					$query = $this->db->query("UPDATE users SET active = '1' WHERE activation_code = '$activation_code'");
					
					if($this->db->affected_rows() == 1) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
	}
	
?>