<?php

	class Settings extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Settings_Model');
		}
		
		public function index() {
			$data = array();
			
			if($this->Settings_Model->get_settings()) {
				$data['settings'] = $this->Settings_Model->result;
			}
			
			$update = array();
			
			foreach($this->input->post(NULL, TRUE) as $input => $value) {
				array_push($update, array(
					'setting_code'	=>	$input,
					'setting_value'	=>	$value
				));
			}
			
			if(isset($_POST['submitted'])) {
				if($this->Settings_Model->update_settings($update)) {
					echo 'saved';
				} else {
					echo 'not saved';
				}
			}
			
			$this->load->backend('office/settings', $data);
		}
	}