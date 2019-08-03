<?php
/**
 * DOVBSV2
 * 
 * An online cab booking system in codeigneter framework
 * 
 * This content is released under the Codecanyon Market License (CML)
 * 
 * Copyright (c) 2017 - 2018, Codecakes
 *
 * @category  Auth
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 * @since     Version 1.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter User_authentication Class
 * 
 * Auth.
 *
 * @category  Auth
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class Auth extends MY_Controller
{
	/**
	| -----------------------------------------------------
	| PRODUCT NAME: 	DIGI VEHICLE BOOKING SYSTEM (DVBSV2)
	| -----------------------------------------------------
	| AUTHOR:			DIGITAL VIDHYA TEAM
	| -----------------------------------------------------
	| EMAIL:			digitalvidhya4u@gmail.com
	| -----------------------------------------------------
	| COPYRIGHTS:		RESERVED BY DIGITAL VIDHYA
	| -----------------------------------------------------
	| WEBSITE:			http://digitalvidhya.com
	|                   http://codecanyon.net/user/digitalvidhya
	| -----------------------------------------------------
	|
	| MODULE: 			Auth
	| -----------------------------------------------------
	| This is auth module controller file.
	| -----------------------------------------------------
	**/
	function __construct()
	{
		parent::__construct();
        
		// Load MongoDB library instead of native db driver if required

		$this->config->item('use_mongodb', 'ion_auth') ? $this->load->library('mongo_db') : $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');

	}

	
	/**
     * Redirect if needed, otherwise display the user list
     *
     * @param string $param
     * @return boolean
    **/ 
	function index($param = '')
	{
      
		if ($param == "home") {
			$this->session->unset_userdata('journey_details');
			$this->session->unset_userdata('user');
		}

		if (!$this->ion_auth->logged_in()) {

			$this->data['css_type'] = array("homebooking");

			$this->data['bread_crumb'] = FALSE;

			$this->data['title'] = 'Welcome';

			/**waiting time options**/
			$waiting_options = $this->dvbs_model->waiting_time_options();
			$this->data['waiting_options'] = $waiting_options;


			/**Home vehicles**/
			$vehicles = $this->dvbs_model->get_home_vehicles();
			$this->data['vehicles'] = $vehicles; 


			/**Airports records**/
			$airports = $this->dvbs_model->get_home_airports();
			$this->data['airports'] = $airports;


			$this->data['content'] = 'site/index';
			$this->_render_page(getTemplate(), $this->data);

		} elseif ($this->ion_auth->is_member()) {
			
			$dt = array();
			$dt = $this->session->userdata('journey_details');
			if (count($dt) > 1) 
				redirect('welcome/passengerDetails', 'refresh');
			else 
				redirect('users');
		
		} elseif ($this->ion_auth->is_admin()) {
			   
			redirect('admin', 'refresh');
		
		} elseif($this->ion_auth->is_executive()) {
		
			redirect('executive', 'refresh');
            
		} elseif($this->ion_auth->is_driver()) {
		
			redirect('auth/logout', 'refresh');
		} 
	}



	/**
     * Create a new user
     *
     *
     * @return boolean
    **/ 
	function create_user()
	{
		$this->data['title'] = "register";

		if ($this->ion_auth->logged_in())
			redirect('auth/index');

		if (isset($_POST['register'])) {
            
            $this->check_isdemo(site_url().'auth/create_user');


			$msg='';
			$status=0;


			$this->config->load('ion_auth', TRUE);
			$tables = $this->config->item('tables', 'ion_auth');

			// validate form input

			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
			$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean|min_length[9]|max_length[30]');

			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
				$email = strtolower($this->input->post('email'));
				$password = $this->input->post('password');
				$additional_data = array(
					'first_name' => $this->input->post('first_name') ,
					'last_name' => $this->input->post('last_name') ,
					'phone' => $this->input->post('phone') ,
					'date_of_registration' => date('Y-m-d')
				);

				if ($this->form_validation->run() == TRUE) {

					// check to see if we are creating the user
					// redirect them back to the admin page

					$id = $this->ion_auth->register($username, $password, $email, $additional_data);

					if ($id) {
						// $msg .= strip_tags($this->ion_auth->messages());
						$msg .= 'Registration Done Successfully';
						$status=0;
					} else {
						$msg .= strip_tags($this->ion_auth->errors());
						$status=1;
					}

					$this->prepare_flashmessage($msg, $status);
					redirect("auth/login", 'refresh');

				} 

			}
		}

		$this->data['google_login_url'] = $this->googleplus->loginURL();

		$this->data['first_name'] = array(
			'name' => 'first_name',
			'class' => 'user',
			'placeholder' => $this->lang->line('first_name') ,
			'id' => 'first_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('first_name') ,
		);
		$this->data['last_name'] = array(
			'name' => 'last_name',
			'class' => 'user',
			'placeholder' => $this->lang->line('last_name') ,
			'id' => 'last_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('last_name') ,
		);
		$this->data['email'] = array(
			'name' => 'email',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('user_email') ,
			'id' => 'email',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email') ,
		);
		$this->data['phone'] = array(
			'name' => 'phone',
			'class' => 'phone1',
			'placeholder' => $this->lang->line('phone') ,
			'id' => 'phone',
			'type' => 'text',
			'maxlength' => '30',
			'value' => $this->form_validation->set_value('phone') ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'class' => 'password',
			'placeholder' => $this->lang->line('password') ,
			'id' => 'password',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password') ,
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'class' => 'password',
			'placeholder' => $this->lang->line('confirm_password') ,
			'id' => 'password_confirm',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password_confirm') ,
		);
		$this->data['css'] = array('form');
		$this->data['title'] = 'Register';
		$this->load->view('site/register', $this->data);
	}


	
	/**
     * Log the user in
     *
     *
     * @return boolean
    **/ 
	function login()
	{
		if ($this->ion_auth->logged_in())
			redirect('auth/index');

		$this->data['title'] = $this->lang->line('login');

		// validate form input

		$this->data['message'] = "";

		if (isset($_POST['login'])) {

			$this->form_validation->set_rules('identity', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == TRUE) {

				// check to see if the user is logging in
				// check for "remember me"

				$remember = (bool)$this->input->post('remember');

				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {

					// if the login is successful

					$this->session->set_flashdata('message', 'Successfully logged In');
					redirect('/', 'refresh');
				}
				else {

					// if the login was un-successful
					// redirect them back to the login page

					$this->prepare_flashmessage("Invalid Login", 1);
					redirect('auth/login', 'refresh');
				}
			}
		}
    
        $this->data['google_login_url'] = $this->googleplus->loginURL();
    
		$this->data['identity'] = array(
			'name' => 'identity',
			'id' => 'identity',
			'type' => 'text',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('email') ,
			'value' => $this->form_validation->set_value('identity') ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'type' => 'password',
			'placeholder' => $this->lang->line('password') ,
			'class' => 'password'
		);

		$this->data['css'] = array('form');
		$this->load->view('site/login', $this->data);
	}


	
	/**
     * Log the user out
     *
     *
     * @return boolean
    **/ 
	function logout()
	{
		$this->data['title'] = $this->lang->line('logout');

		// log the user out

		$logout = $this->ion_auth->logout();

		// redirect them to the login page

		$this->prepare_flashmessage($this->lang->line('success_logout'), 0);
		redirect('auth/login', 'refresh');
	}


	
	/**
     * Forgot password
     *
     *
     * @return boolean
    **/ 
	function forgot_password()
	{

		if ($this->ion_auth->logged_in())
			redirect('auth/index');
		// setting validation rules by checking wheather identity is username or email

		if (isset($_POST['forgot_pwd'])) {
            
          
			$this->check_isdemo(site_url().'auth/forgot_password');

			if ($this->config->item('identity', 'ion_auth') == 'username') {
				$this->form_validation->set_rules('email', $this->lang->line('forgot_password_username_identity_label'), 'required');
			}
			else {
				$this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
			}

			if ($this->form_validation->run() == TRUE) {

				// get identity from username or email
				
				if ($this->config->item('identity', 'ion_auth') == 'username') {
					$identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
				}
				else {
					$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
				}


				if (empty($identity)) {

					if ($this->config->item('identity', 'ion_auth') == 'username') 
					{
						$this->prepare_flashmessage($this->ion_auth->set_message('forgot_password_username_not_found'), 1);
					}
					else 
					{
						$this->prepare_flashmessage($this->ion_auth->set_message('forgot_password_email_not_found'), 1);
					}
					redirect("auth/forgot_password");
				}

				// run the forgotten password method to email an activation code to the user

				$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth') });
				if ($forgotten) {

					// if there were no errors

					$this->prepare_flashmessage($this->ion_auth->messages(), 0);
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else {
					$this->prepare_flashmessage($this->ion_auth->messages(), 1);
					redirect("auth/forgot_password", 'refresh');
				}
			} 
		}

		// setup the input

		if ($this->config->item('identity', 'ion_auth') == 'username') {
			$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
		}
		else {
			$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
		}

		// set any errors and display the form

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		$this->data['email'] = array(
			'name' => 'email',
			'id' => 'email',
			'type' => 'text',
			'class' => 'user-name',
			'placeholder' => $this->lang->line('email') ,
			'value' => $this->form_validation->set_value('email') ,
		);
		$this->data['css'] = array('form');
		$this->load->view('site/forgot_password', $this->data);
	}


	
	/**
     * Reset password - final step for forgotten password
     *
     * @param string $code
     * @return boolean
    **/ 
	public function reset_password($code = NULL)
	{
		if ($this->ion_auth->logged_in())
			redirect('auth/index');


		if (!$code) {
			show_404();
		}

		$this->check_isdemo(site_url().'auth/forgot_password');

		$user = $this->ion_auth->forgotten_password_check($code);
		
		if ($user) {

			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');

			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == FALSE) {

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
				$this->data['code'] = $code;

				
				$this->data['active_menu'] = 'home';
				$this->data['title'] = 'Welcome to ';

				$this->data['css'] = array('form');
				$this->load->view('site/reset_password', $this->data);

			} else {
                
                if(DEMO) 
                {
                    $this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
                    redirect(site_url().'auth/forgot_password', REFRESH);
                }
            
				// do we have a valid request?

				//if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

				if ($user->id != $this->input->post('user_id')) {
					// something fishy might be up

					$this->ion_auth->clear_forgotten_password_code($code);
					show_error($this->lang->line('error_csrf'));
				}
				else {

					// finally change the password

					$identity = $user->{$this->config->item('identity', 'ion_auth') };
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change) {

						// if the password was successfully changed

						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else {
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else {

			// if the code is invalid then send them back to the forgot password page

			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}



	
	/**
     * Change password
     *
     * @param string $param
     * @return boolean
    **/ 
	function change_password($param = '')
	{
        if (!$this->ion_auth->logged_in())
			redirect(SITEURL);
        
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new_password', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();
		if ($this->form_validation->run() == FALSE) {

			// display the form
			// set the flash data error message if there is one

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
				'placeholder' => $this->lang->line('old_password') ,
			);
			$this->data['new_password'] = array(
				'name' => 'new_password',
				'id' => 'new',
				'type' => 'password',
				'placeholder' => $this->lang->line('new_password') ,
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'placeholder' => $this->lang->line('confirm_password') ,
			);
			$this->data['user_id'] = array(
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			
			if ($param == "executive") {
				$this->data['content'] = 'executives/change_password';
				$this->data['css_type'] = array(
					'form'
				);
				$this->data['gmaps'] = "false";
				$this->data['title'] = $this->lang->line('change_password');
				$this->_render_page('templates/executive_template', $this->data);
			}
			elseif ($param == "admin") {
				$this->data['content'] = 'admin/change_password';
				$this->data['css_type'] = array(
					'form'
				);
				$this->data['gmaps'] = "false";
				$this->data['title'] = $this->lang->line('change_password');
				$this->_render_page('templates/admin_template', $this->data);
			}
            
            elseif ($param == "driver") {
				$this->data['content'] = 'drivers/change_password';
				$this->data['css_type'] = array(
					'form'
				);
				$this->data['gmaps'] = "false";
				$this->data['title'] = $this->lang->line('change_password');
				$this->_render_page('templates/driver_template', $this->data);
            }
		}
		else {
			
            $redirect=site_url().'auth/change_password/admin';
            
            if ($param == "executive") 
            {
                $redirect=site_url().'auth/change_password/executive';
            }
            
            
            if(DEMO) 
			{
				$this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
				redirect($redirect, REFRESH);
            }
            
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new_password'));
            
			if ($change) {

				// if the password was successfully changed
				// $this->session->set_flashdata('message', $this->ion_auth->messages());

				if ($param == "executive") 
                {
					$this->prepare_flashmessage($this->lang->line('password_changed_success'), 0);
					
				}
				else if ($param == "admin") 
                {
					$this->prepare_flashmessage($this->lang->line('password_changed_success'), 0);
					
				}
                
                redirect($redirect, 'refresh');

				// $this->logout();

			}
			else {

				
				if ($param == "executive") {
					$this->prepare_flashmessage($this->ion_auth->errors(), 1);
					redirect('auth/change_password/executive', 'refresh');
				}
				elseif ($param == "admin") {
					$this->prepare_flashmessage($this->ion_auth->errors(), 1);
					redirect('auth/change_password/admin', 'refresh');
				}
			}
		}
	}

	

	
	/**
     * Activate the user
     *
     * @param int    $id
     * @param string $code
     * @return boolean
    **/ 
	function activate($id, $code = FALSE)
	{
		
        if(DEMO) 
        {
            $this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
            redirect(SITEURL, REFRESH);
        }
            
		if ($code !== FALSE) 
        {
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin()) 
        {
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation) {

			// redirect them to the auth page

			$this->prepare_flashmessage($this->ion_auth->messages(), 0);

			
			redirect("auth/login", 'refresh');
		}
		else {

			// redirect them to the forgot password page

			$this->prepare_flashmessage($this->ion_auth->errors(), 1);
			redirect("auth/login", 'refresh');
		}
	}

	/**
	 *
	 * Customer De-Activate
	 * @param int $id
	 * @return boolean
	 **/
	function deactivate($id = NULL)
	{
        
        if(DEMO) 
        {
            $this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
            redirect(SITEURL, REFRESH);
        }
		
		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string)$id : (int)$id;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');
		if ($this->form_validation->run() == FALSE) {

			// insert csrf check

			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
			$this->data['title'] = 'Deactivate User';
			$this->data['content'] = 'auth/deactivate_user';
			$this->_render_page('templates/admin_template', $this->data);
		}
		else {

			// do we really want to deactivate?

			if ($this->input->post('confirm') == 'yes') {

				// do we have a valid request?

			
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?

				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page

			redirect('auth', 'refresh');
		}
	}




	

	/**
     * Edit User
     *
     * @param int $id
     * @return boolean
    **/ 
	function edit_user($id)
	{
        if (!$this->ion_auth->logged_in())
			redirect(SITEURL);
        
		$this->data['title'] = "Edit User";
		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input

		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean|min_length[9]|max_length[30]');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'xss_clean');
		$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');
		if (isset($_POST) && !empty($_POST)) {

			// do we have a valid request?

			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
				show_error($this->lang->line('error_csrf'));
			}

			$data = array(
				'first_name' => $this->input->post('first_name') ,
				'last_name' => $this->input->post('last_name') ,
				'company' => $this->input->post('company') ,
				'phone' => $this->input->post('phone') ,
			);

			// Only allow updating groups if user is admin

			if ($this->ion_auth->is_admin()) {

				// Update the groups user belongs to

				$groupData = $this->input->post('groups');
				if (isset($groupData) && !empty($groupData)) {
					$this->ion_auth->remove_from_group('', $id);
					foreach($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}
				}
			}

			// update the password if it was posted
			
			if ($this->input->post('password')) {
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE) {
			
				$this->ion_auth->update($user->id, $data);

				// check to see if we are creating the user
				// redirect them back to the admin page

				$this->session->set_flashdata('message', "User Saved");
				if ($this->ion_auth->is_admin()) {
					redirect('auth', 'refresh');
				}
				else {
					redirect('/', 'refresh');
				}
			}
		}

		// display the edit user form

		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one

		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view

		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;
		$this->data['first_name'] = array(
			'name' => 'first_name',
			'id' => 'first_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name) ,
		);
		$this->data['last_name'] = array(
			'name' => 'last_name',
			'id' => 'last_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name) ,
		);
		$this->data['company'] = array(
			'name' => 'company',
			'id' => 'company',
			'type' => 'text',
			'value' => $this->form_validation->set_value('company', $user->company) ,
		);
		$this->data['phone'] = array(
			'name' => 'phone',
			'id' => 'phone',
			'type' => 'text',
			'maxlength' => 30,
			'value' => $this->form_validation->set_value('phone', $user->phone) ,
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id' => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id' => 'password_confirm',
			'type' => 'password'
		);
		$this->data['active_menu'] = 'home';
		$this->data['title'] = 'Welcome to ';
		$this->data['content'] = 'auth/edit_user';
		$this->_render_page('template/admin_template', $this->data);

		// $this->_render_page('auth/edit_user', $this->data);

	}

	
	/**
     * List Groups
     *
     *
     * @return array
    **/ 
	function groups()
	{
		$this->data['title'] = "User Groups";
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$this->data['groups'] = $this->base_model->fetch_records_from('groups');
		$this->data['active_menu'] = 'home';
		$this->data['title'] = 'Welcome to ';
		$this->data['content'] = 'auth/user_groups';
		$this->_render_page('template/admin_template', $this->data);
	}

	
	/**
     * Create a new group
     *
     *
     * @return boolean
    **/ 
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		// validate form input

		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');
		if ($this->form_validation->run() == TRUE) {
			
			
			
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id) {

				// check to see if we are creating the group
				// redirect them back to the admin page

				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else {

			// display the create group form
			// set the flash data error message if there is one

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->data['group_name'] = array(
				'name' => 'group_name',
				'id' => 'group_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('group_name') ,
			);
			$this->data['description'] = array(
				'name' => 'description',
				'id' => 'description',
				'type' => 'text',
				'value' => $this->form_validation->set_value('description') ,
			);
			$this->data['active_menu'] = 'home';
			$this->data['title'] = 'Create Group';
			$this->data['content'] = 'auth/create_group';
			$this->_render_page('template/admin_template', $this->data);

			// $this->_render_page('auth/create_group', $this->data);

		}
	}

	
	/**
     * Edit a group
     *
     * @param int $id
     * @return boolean
    **/ 
	function edit_group($id)
	{

		// bail if no group id given

		if (!$id || empty($id)) {
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input

		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');
		if (isset($_POST) && !empty($_POST)) {
			if ($this->form_validation->run() === TRUE) {
			
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);
				if ($group_update) {
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}

				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one

		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view

		$this->data['group'] = $group;
		$this->data['group_name'] = array(
			'name' => 'group_name',
			'id' => 'group_name',
			'type' => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name) ,
		);
		$this->data['group_description'] = array(
			'name' => 'group_description',
			'id' => 'group_description',
			'type' => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description) ,
		);
		$this->data['active_menu'] = 'home';
		$this->data['title'] = 'Edit user Group';
		$this->data['content'] = 'auth/edit_group';
		$this->_render_page('template/admin_template', $this->data);
	}
}
