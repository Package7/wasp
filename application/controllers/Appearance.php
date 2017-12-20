<?php

	Class Appearance Extends CI_Controller {
		public $data = array();
		Public Function __construct() {
			Parent::__construct();
		}
		
		Public Function Menus() {
			$this->load->model('Pages_Model');
			if($this->Pages_Model->get_pages()) {
				$this->data['pages'] = $this->Pages_Model->result;
			}
			$this->load->backend('office/appearance/menus', $this->data);
		}
		
		public function sort_menus() {
			var_dump($_POST);
		}
	}