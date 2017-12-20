<?php

	class Accounts extends CI_Controller {
		public $data = array();
		
		public function __construct() {
			parent::__construct();
			$this->load->model('Users_Model');
		}
		
		public function register() {
			$this->form_validation->set_rules('account_name', 'Name', 'required');
			$this->form_validation->set_rules('account_email', 'Email', 'required|is_unique[users.email]');
			$this->form_validation->set_rules('account_password', 'Password', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->frontend('register');
			} else {
				// var_dump($this->config->item('email_activation', 'ion_auth'));
				var_dump($this->ion_auth->register($this->input->post('account_email'), $this->input->post('account_password'), $this->input->post('account_email')));
				// redirect(base_url('activate'));
			}
		}
		
		public function activate($activation_code = null) {
			$data = array();
			
			if($activation_code !== null) {
				$data['activation_code'] = $activation_code;
			} else {
				$activation_code = $this->input->post('activation_code');
			}
			
			$this->form_validation->set_rules('activation_code', 'Activation code', 'required');
			
			if($this->form_validation->run() == false) {
				$this->load->frontend('activate', $data);
			} else {
				if($this->Users_Model->activate_user($activation_code)) {
					redirect(base_url('login'));
				} else {
					$data['activation_error'] = 'We could not validate your account';
					$this->load->frontend('activate', $data);
				}
			}
		}
		
		public function login() {
			$data = array();
			
			$this->form_validation->set_rules('account_email', 'User', 'required');
			$this->form_validation->set_rules('account_password', 'Password', 'required');
			
			if ($this->form_validation->run() === TRUE) {
				if ($this->ion_auth->login($this->input->post('account_email'), $this->input->post('account_password'), (bool)$this->input->post('account_remember')))
				{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect(base_url(), 'refresh');
				}
				else
				{
					// if the login was un-successful
					// redirect them back to the login page
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect(base_url('login'), 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			} else {
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				
				$this->load->frontend('login', $data);
			}
		}
		
		public function logout() {
			$this->ion_auth->logout();
			redirect(base_url());
		}
		
		public function account() {
			$data = array();
			$data['account'] = $this->ion_auth->user()->row();
			$data['message'] = '';
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			
			$this->form_validation->set_rules('account_email', 'Email address', 'required');
			
			if($this->form_validation->run() == true) {
				
				if($this->input->post('account_fname')) {
					$fields['first_name'] = $this->input->post('account_fname');
				}
				
				if($this->input->post('account_lname')) {
					$fields['last_name'] = $this->input->post('account_lname');
				}
				
				$fields['email'] = $this->input->post('account_email');
				
				if($this->input->post('account_phone')) {
					$fields['phone'] = $this->input->post('account_phone');
				}
				
				if($this->ion_auth->update($this->ion_auth->user()->row()->id, $fields)) {
					redirect(current_url());
				}
			} else {
				$this->load->frontend('account', $data);
			}
			
		}
		
		public function change_password() {
			$this->form_validation->set_rules('current_password', 'Current password', 'required');
			$this->form_validation->set_rules('new_password', 'New password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_password_confirm]');
			$this->form_validation->set_rules('new_password_confirm', 'Confirm new password', 'required');
			
			if($this->form_validation->run() == true) {
				$identity = $this->session->userdata('identity');
				$change = $this->ion_auth->change_password($identity, $this->input->post('current_password'), $this->input->post('new_password'));
				
				if($change) {
					$this->data['success'] = 'Your password has been changed';
				} else {
					var_dump($change);
					$this->data['error'] = 'Your password has not been changed';
				}
			} else {
				if(validation_errors() !== '') {
					$this->data['error'] = '<strong>Please correct the following errors</strong>: ' . validation_errors('<div>', '</div>');
				}
			}
			
			$this->load->frontend('account/change_password', $this->data);
		}
		
		public function forgot_password() {
			$this->form_validation->set_rules('account_email', 'Email Address', 'required');
			if ($this->form_validation->run() == false) {
				//setup the input
				$this->data['email'] = array('name'    => 'email',
											 'id'      => 'email',
											);
				//set any errors and display the form
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->load->frontend('account/forgot_password', $this->data);
			}
			else {
				//run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($this->input->post('account_email'));

				if ($forgotten) { //if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect(base_url('login'), 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect(base_url('forgot-password'), 'refresh');
				}
			}
		}
		
		public function reset_password($reset_code = null) {
			if($reset_code !== null) {
				$this->data['reset_code'] = $reset_code;
			} else {
				$reset_code = $this->input->post('reset_code');
			}
			
			$user = $this->ion_auth->forgotten_password_check($reset_code);

			if ($user)
			{
				// if the code is valid then display the password reset form

				$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
				$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

				if ($this->form_validation->run() === FALSE)
				{
					// display the form

					// set the flash data error message if there is one
					$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

					$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
					$this->data['new_password'] = array(
						'name' => 'new',
						'id' => 'new',
						'type' => 'password',
						'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
					);
					$this->data['new_password_confirm'] = array(
						'name' => 'new_confirm',
						'id' => 'new_confirm',
						'type' => 'password',
						'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
					);
					$this->data['user_id'] = array(
						'name' => 'user_id',
						'id' => 'user_id',
						'type' => 'hidden',
						'value' => $user->id,
					);
					$this->data['csrf'] = $this->_get_csrf_nonce();
					$this->data['code'] = $reset_code;

					// render
					$this->load->frontend('account/reset_password', $this->data);
				}
				else
				{
					// do we have a valid request?
					if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
					{

						// something fishy might be up
						$this->ion_auth->clear_forgotten_password_code($reset_code);

						show_error($this->lang->line('error_csrf'));

					}
					else
					{
						// finally change the password
						$identity = $user->{$this->config->item('identity', 'ion_auth')};

						$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

						if ($change)
						{
							// if the password was successfully changed
							$this->session->set_flashdata('message', $this->ion_auth->messages());
							redirect(base_url('login'), 'refresh');
						}
						else
						{
							$this->session->set_flashdata('message', $this->ion_auth->errors());
							redirect(base_url('reset-password/' . $reset_code), 'refresh');
						}
					}
				}
			}
			else
			{
				// if the code is invalid then send them back to the forgot password page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect(base_url('forgot-password'), 'refresh');
			}
		}
		
		public function _get_csrf_nonce()
		{
			$this->load->helper('string');
			$key = random_string('alnum', 8);
			$value = random_string('alnum', 20);
			$this->session->set_flashdata('csrfkey', $key);
			$this->session->set_flashdata('csrfvalue', $value);

			return array($key => $value);
		}

		/**
		 * @return bool Whether the posted CSRF token matches
		 */
		public function _valid_csrf_nonce()
		{
			$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
			if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}
	
?>