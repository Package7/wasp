<?php

	class Pages_Model extends CI_Model {
		public $result;
		public $response;
		
		public function __construct() {
			parent::__construct();
		}
		
		public function get_pages() {
			try {
				$query = $this->db->query("SELECT pages.page_id, pages.page_title, pages.page_slug, pages.page_created, users.username AS page_author FROM pages LEFT JOIN users ON users.id = pages.user_id ORDER BY pages.page_created DESC");
				
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
		
		public function get_page($page_identifier) {
			try {
				if(is_numeric($page_identifier)) {
					$page_id = $page_identifier;
					$query = $this->db->query("SELECT page_parent, page_title, page_slug, page_content, page_created FROM pages WHERE page_id= '$page_id'");
				} else {
					$page_slug = $page_identifier;
					$query = $this->db->query("SELECT page_parent, page_title, page_slug, page_content, page_created FROM pages WHERE page_slug= '$page_slug'");
				}
				
				if($query->num_rows() === 1) {
					$this->result = $query->row_array();
					return true;
				} else {
					return false;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
		
		public function add_page($data) {
			if($this->check_slug($data['page_slug']) === false) {
				$data['page_slug'] = $this->response;
			}
			
			try {
				$query = $this->db->insert('pages', $data);
				
				if($this->db->affected_rows() > 0) {
					return true;
				} else {
					return false;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
		
		public function update_page() {
		}
		
		public function check_slug($page_slug) {
			try {
				$query = $this->db->query("SELECT page_slug FROM pages WHERE page_slug = '$page_slug'");
				
				if($query->num_rows() == 0) {
					return true;
				} else {
					$this->response = $page_slug . $query->num_rows();
					return false;
				}
			} catch(Exception $ex) {
				return false;
			}
		}
	}
	
?>