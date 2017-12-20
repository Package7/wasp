<?php

	class Pages extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Pages_Model');
		}
		
		public function index() {
			$data = array();
			
			if($this->Pages_Model->get_pages() === true) {
				$data['pages'] = $this->Pages_Model->result;
			}
			
			$this->load->backend('office/pages/view_pages', $data);
		}
		
		public function add_page() {
			$data = array();
			
			if($this->Pages_Model->get_pages()) {
				$data['pages'] = $this->Pages_Model->result;
			}
			
			$this->form_validation->set_rules('page_title', 'Title', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->backend('office/pages/add_page', $data);
			} else {
				$data = array(
					'user_id'		=>	$this->ion_auth->user()->row()->id,
					'page_title'	=>	$this->input->post('page_title'),
					'page_slug'		=>	slugify($this->input->post('page_title')),
					'page_content'	=>	$this->input->post('page_content')
				);
				
				if($this->Pages_Model->add_page($data) === true) {
					redirect(base_url('pages'));
				} else {
					show_404();
				}
			}
		}
		
		public function edit_page($page_id) {
			$data = array();
			
			if($this->Pages_Model->get_page($page_id)) {
				$data['page'] = $this->Pages_Model->result;
			}
			
			$this->load->backend('office/pages/edit_page', $data);
		}
		
		public function view_page($page_slug) {
			$data = array();
			
			if($this->Pages_Model->get_page($page_slug)) {
				$data['page'] = $this->Pages_Model->result;
			}
			
			$this->load->frontend('pages/view_page', $data);
		}
	}
	
?>