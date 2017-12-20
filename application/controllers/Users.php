<?php

	class Users extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Users_Model');
			if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
				redirect(base_url('login'));
			}
		}
		
		public function index() {
			$data = array();
			
			if($this->Users_Model->get_users() === TRUE) {
				$data['users'] = $this->Users_Model->result;
			}
			
			$this->load->backend('office/users/list.php', $data);
		}
		
		public function edit_user($user_id) {
			$data = array();
			$data['user'] = $this->ion_auth->user($user_id)->row();
			
			$this->load->backend('office/users/edit_user', $data);
		}
	}
	
?>