<?php

	class Settings_Model extends CI_Model {
		public $result;
		
		public function __construct() {
			parent::__construct();
		}
		
		public function get_setting($setting_code) {
			try {
				return true;
			} catch(Exception $ex) {
				
				return false;
			}
		}
		
		public function get_settings() {
			try {
				$query = $this->db->query("SELECT setting_id, setting_name, setting_code, setting_value FROM settings");
				
				if($query->num_rows() === 0) {
					return false;
				} else {
					$this->result = $query->result_array();
					return true;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
		
		public function update_settings($data) {
			try {
				$this->db->trans_begin();
			
				foreach($data as $setting) {
					$setting_value = $setting['setting_value'];
					$setting_code = $setting['setting_code'];
					
					$this->db->query("UPDATE settings SET setting_value = '$setting_value' WHERE setting_code = '$setting_code'");
				}
				
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					return false;
				}
				else
				{
					$this->db->trans_commit();
					return true;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
	}
	
?>