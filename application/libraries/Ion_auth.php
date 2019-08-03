<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

* Name:  Ion Auth

*

* Version: 2.5.2

*

* Author: John Peter

*		  ben.edmunds@gmail.com

*         @benedmunds

*

* Added Awesomeness: Phil Sturgeon

*

* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth

*

* Created:  10.01.2009

*

* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.

* Original Author name has been kept but that does not mean that the method has not been modified.

*

* Requirements: PHP5 or above

*

*/



class Ion_auth

{

	/**

	 * account status ('not_activated', etc ...)

	 *

	 * @var string

	 **/

	protected $status;



	/**

	 * extra where

	 *

	 * @var array

	 **/

	public $_extra_where = array();



	/**

	 * extra set

	 *

	 * @var array

	 **/

	public $_extra_set = array();



	/**

	 * caching of users and their groups

	 *

	 * @var array

	 **/

	public $_cache_user_in_group;



	/**

	 * __construct

	 *

	 * @return void

	 * @author Ben

	 **/

	public function __construct()

	{

		$this->load->config('ion_auth', TRUE);

		$this->load->library('email');

		$this->lang->load('ion_auth');

		$this->load->helper('cookie');

		$this->load->helper('language');

		$this->tables  = $this->config->item('tables', 'ion_auth');

		$this->load->helper('url');



		// Load the session, CI2 as a library, CI3 uses it as a driver

		if (substr(CI_VERSION, 0, 1) == '2')

		{

			$this->load->library('session');

		}

		else

		{

			$this->load->driver('session');

		}



		// Load IonAuth MongoDB model if it's set to use MongoDB,

		// We assign the model object to "ion_auth_model" variable.

			$this->config->item('use_mongodb', 'ion_auth') ?

			$this->load->model('ion_auth_mongodb_model', 'ion_auth_model') :

			$this->load->model('ion_auth_model');



		$this->_cache_user_in_group =& $this->ion_auth_model->_cache_user_in_group;



		//auto-login the user if they are remembered

		if (!$this->logged_in() && get_cookie('identity') && get_cookie('remember_code'))

		{

			$this->ion_auth_model->login_remembered_user();

		}



		$email_config = $this->config->item('email_config', 'ion_auth');



		if ($this->config->item('use_ci_email', 'ion_auth') && isset($email_config) && is_array($email_config))

		{

			$this->email->initialize($email_config);

		}



		$this->ion_auth_model->trigger_events('library_constructor');

	}



	/**

	 * __call

	 *

	 * Acts as a simple way to call model methods without loads of stupid alias'

	 *

	 **/

	public function __call($method, $arguments)

	{

		if (!method_exists( $this->ion_auth_model, $method) )

		{

			throw new Exception('Undefined method Ion_auth::' . $method . '() called');

		}



		return call_user_func_array( array($this->ion_auth_model, $method), $arguments);

	}



	/**

	 * __get

	 *

	 * Enables the use of CI super-global without having to define an extra variable.

	 *

	 * I can't remember where I first saw this, so thank you if you are the original author. -Militis

	 *

	 * @access	public

	 * @param	$var

	 * @return	mixed

	 */

	public function __get($var)

	{

		return get_instance()->$var;

	}





	/**

	 * forgotten password feature

	 *

	 * @return mixed  boolian / array

	 * @author Mathew

	 **/

	public function forgotten_password($identity)    //changed $email to $identity

	{

		if ( $this->ion_auth_model->forgotten_password($identity) )   //changed

		{

			// Get user information

            $user = $this->where($this->config->item('identity', 'ion_auth'), $identity)->where('active', 1)->users()->row();  //changed to get_user_by_identity from email



			if ($user)

			{

				$data = array(

					'identity'		=> $user->{$this->config->item('identity', 'ion_auth')},

					'forgotten_password_code' => $user->forgotten_password_code,

					'user_name' =>$user->username

				);



				if(!$this->config->item('use_ci_email', 'ion_auth'))

				{

					$this->set_message('forgot_password_successful');

					return $data;

				}

				else

				{

					/* $message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_forgot_password', 'ion_auth'), $data, true); */

                    
                    $email_template = $this->db->query("SELECT * FROM ".TBL_PREFIX.TBL_EMAIL_TEMPLATES." WHERE subject='forgot_password' ")->result();

                    

                    if(!empty($email_template))
					{
                        $email_template = $email_template[0];
						
						
						$logo_img   = '<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';
                        
                        $content 	= $email_template->email_template;

						$content 	= str_replace("__SITE_LOGO__", $logo_img,$content);
					
						$content 	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
                        
                        
                        $content 	= str_replace("___RESET_YOUR_PASSWORD___", '<a href="'.site_url().'auth/reset_password'.DS.$data['forgotten_password_code'].'">'.$this->lang->line('reset_your_password').'</a>',$content);
						
						
						$content 	= str_replace("__EMAIL__", $data['identity'], $content);

						$message 	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
                        

                        
                        $from = $this->config->item('site_settings')->portal_email;

                        $to = $user->email;

                        $sub = $this->lang->line('email_forgotten_password_subject');

                        if(sendEmail($from, $to, $sub, $message))
                        {

                            $this->set_message('forgot_password_successful');

                            return TRUE;

                        }

                        else

                        {

                            $this->set_error('forgot_password_unsuccessful');

                            return FALSE;

                        }
                    
                    }
                    else
					{
						$this->set_error('forgot_password_unsuccessful');
						return FALSE;
					}

				}

			}

			else

			{

				$this->set_error('forgot_password_unsuccessful');

				return FALSE;

			}

		}

		else

		{

			$this->set_error('forgot_password_unsuccessful');

			return FALSE;

		}

	}



	/**

	 * forgotten_password_complete

	 *

	 * @return void

	 * @author Mathew

	 **/

	public function forgotten_password_complete($code)

	{

		$this->ion_auth_model->trigger_events('pre_password_change');



		$identity = $this->config->item('identity', 'ion_auth');

		$profile  = $this->where('forgotten_password_code', $code)->users()->row(); //pass the code to profile



		if (!$profile)

		{

			$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_unsuccessful'));

			$this->set_error('password_change_unsuccessful');

			return FALSE;

		}



		$new_password = $this->ion_auth_model->forgotten_password_complete($code, $profile->salt);



		if ($new_password)

		{

			$data = array(

				'identity'     => $profile->{$identity},

				'new_password' => $new_password

			);

			if(!$this->config->item('use_ci_email', 'ion_auth'))

			{

				$this->set_message('password_change_successful');

				$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_successful'));

					return $data;

			}

			else

			{

				$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_forgot_password_complete', 'ion_auth'), $data, true);

				$from = $this->config->item('site_settings')->portal_email;

				$to = $profile->email;

				$sub = $this->lang->line('email_new_password_subject');

				if(sendEmail($from, $to, $sub, $message))
				{

					$this->set_message('password_change_successful');

					$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_successful'));

					return TRUE;

				}

				else

				{

					$this->set_error('password_change_unsuccessful');

					$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_unsuccessful'));

					return FALSE;

				}



			}

		}



		$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_unsuccessful'));

		return FALSE;

	}



	/**

	 * forgotten_password_check

	 *

	 * @return void

	 * @author Michael

	 **/

	public function forgotten_password_check($code)
	{

		$profile = $this->where('forgotten_password_code', $code)->users()->row(); //pass the code to profile



		if (!is_object($profile))

		{

			$this->set_error('password_change_unsuccessful');

			return FALSE;

		}

		else

		{

		

			if ($this->config->item('forgot_password_expiration', 'ion_auth') > 0) {

				//Make sure it isn't expired

				$expiration = $this->config->item('forgot_password_expiration', 'ion_auth');

				if (time() - $profile->forgotten_password_time > $expiration) {

					//it has expired

					$this->clear_forgotten_password_code($code);

					$this->set_error('password_change_unsuccessful');

					return FALSE;

				}

			}

			return $profile;

		}

	}



	/**

	 * register 

	 *

	 * @return void

	 * @author Mathew

	 **/

	public function register($username, $password, $email, $additional_data = array(), $group_ids = array(),$fb = FALSE) {

        //need to test email activation
		$this->ion_auth_model->trigger_events('pre_account_creation');



		$email_activation = $this->config->item('email_activation', 'ion_auth');


        $id = $this->ion_auth_model->register($username, $password, $email, $additional_data, $group_ids,$fb);
        
		if (!$email_activation)
		{
			if ($id !== FALSE)
			{

				$this->set_message('account_creation_successful');

				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful'));

				return $id;
			}
			else
			{

				$this->set_error('account_creation_unsuccessful');

				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful'));

				return FALSE;
			}
		}
		else
		{
			if (!$id)
			{
				$this->set_error('account_creation_unsuccessful');
				return FALSE;
			}



			//$deactivate = $this->ion_auth_model->deactivate($id);

            // deactivate so the user much follow the activation flow
			if(!$fb)
			$deactivate = $this->ion_auth_model->deactivate($id);
			else
			$deactivate=true;	

        
			if (!$deactivate)
			{

				$this->set_error('deactivate_unsuccessful');

				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful'));

				return FALSE;

			}



			$activation_code = $this->ion_auth_model->activation_code;

			$identity        = $this->config->item('identity', 'ion_auth');

			$user            = $this->ion_auth_model->user($id)->row();



			$data = array(

				'identity'   => $user->{$identity},

				'id'         => $user->id,

				'email'      => $email,

				'user_name'  => $user->username,

				'activation' => $activation_code,

			);

			if(!$this->config->item('use_ci_email', 'ion_auth'))
			{

				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));

				$this->set_message('activation_email_successful');

					return $data;
			}
			else
			{

               
            
				/* $message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_activate', 'ion_auth'), $data, true); */
                
                $group = $this->ion_auth->get_users_groups($id)->result();
                
                if (!empty($group)) {
                    
                $message='';
                
                $logo_img='<img src="'.get_site_logo().'" class="img-responsive" style="width:30%">';


                
                if ($fb) {
                    
                     $email_template = $this->db->query("SELECT * FROM ".TBL_PREFIX.TBL_EMAIL_TEMPLATES." WHERE subject = 'fb_google_registration_template' ")->result();
                     
                } else {
                    
                    if($group[0]->id==2) {
                        
                        $email_template = $this->db->query("SELECT * FROM ".TBL_PREFIX.TBL_EMAIL_TEMPLATES." WHERE subject = 'user_registration' ")->result();
                        
                    } else if($group[0]->id==3) {
                        
                         $email_template = $this->db->query("SELECT * FROM ".TBL_PREFIX.TBL_EMAIL_TEMPLATES." WHERE subject = 'executive_registration' ")->result();
                         
                    } /*else if($group[0]->id==4) {
                        
                         $email_template = $this->db->query("SELECT * FROM ".TBL_PREFIX.TBL_EMAIL_TEMPLATES." WHERE subject = 'driver_registration' ")->result();
                    }*/
                
                }
                
                
                if(!empty($email_template))
                {
                    
                    
                $email_template = $email_template[0];
                $content 	= $email_template->email_template;
                
                $content 	= str_replace("__SITE_LOGO__",$logo_img,$content);
                
                $content 	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
                
                
                $name = $additional_data['first_name'].' '.$additional_data['last_name'];

				$content 	= str_replace("__USER__NAME__", $name,$content);
						
				$content 	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);
                
                
                
                $content 	= str_replace("__EMAIL__", $email,$content);
						
				$content 	= str_replace("__PASSWORD__", $password, $content);

   
                $content 	= str_replace("__ACCOUNT_ACTIVATOIN_LINK__", anchor(site_url().'auth/activate/'.$id.'/'.$activation_code,'Activate Your Account'),$content);
                
                
                $content 	= str_replace("__SITE_TITLE__", $this->config->item('site_settings')->site_title,$content);	
                    
                $message = $content;
                
				$from = $this->config->item('site_settings')->portal_email;

				$to = $email;

				$sub = $this->lang->line('email_activation_subject');

				

				if(sendEmail($from, $to, $sub, $message))
				{

					$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));

					$this->set_message('activation_email_successful');

					return $id;

				} else {
                 
                    $this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful'));
                    $this->set_message('post_account_creation_successful');
                    return $id;
                    
                }
                
                } else {
                    
                    $this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful'));
                    $this->set_message('post_account_creation_successful');
                    return $id;
                }
                
                
                }
                
                
			}



			$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful', 'activation_email_unsuccessful'));

			$this->set_error('activation_email_unsuccessful');

			return FALSE;

		}

	}



	/**

	 * logout

	 *

	 * @return void

	 * @author Mathew

	 **/

	public function logout()

	{

		$this->ion_auth_model->trigger_events('logout');



		$identity = $this->config->item('identity', 'ion_auth');

                $this->session->unset_userdata( array($identity => '', 'id' => '', 'user_id' => '') );



		//delete the remember me cookies if they exist

		if (get_cookie('identity'))

		{

			delete_cookie('identity');

		}

		if (get_cookie('remember_code'))

		{

			delete_cookie('remember_code');

		}



		//Destroy the session

		$this->session->sess_destroy();

        // session_start(); 

		//Recreate the session

		if (substr(CI_VERSION, 0, 1) == '2')

		{

			$this->session->sess_create();

		}

		else

		{
            
            if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
				session_start();
			}
			$this->session->sess_regenerate(TRUE);

		}



		$this->set_message('logout_successful');

		return TRUE;

	}



	/**

	 * logged_in 

	 *

	 * @return bool

	 * @author Mathew

	 **/

	public function logged_in()

	{

		$this->ion_auth_model->trigger_events('logged_in');


		// echo "<pre>"; print_r($this->session->all_userdata()); die();
		return (bool) $this->session->userdata('identity');

	}



/**

* Customer Login

* 

* @return bool

* @author John Peter

*/

public function customer_logged_in()

{

		$this->ion_auth_model->trigger_events('customer_logged_in');



		return (bool) $this->session->userdata('customer_id');

}

	/**

	 * logged_in

	 *

	 * @return integer

	 * @author jrmadsen67

	 **/

	public function get_user_id()

	{

		$user_id = $this->session->userdata('user_id');

		if (!empty($user_id))

		{

			return $user_id;

		}

		return null;

	}

	

	public function check_user_details()

	{

		$user_id = $this->session->userdata('user_id');
       
        
		if (!empty($user_id))
		{
            
			$query = $this->db->select('*')

		                  ->from('users')

						  ->where('id', $user_id)

						  ->get();
            
               
            if ($query->num_rows() !== 1)
            {
                return null;
            }
            else
            {
                return $query->row();
            }
 
		}

		else

		{

		return null;

		}

		

	}

	public function check_user_id()

	{

		$user_id = $this->session->userdata('user_id');

		if (!empty($user_id))

		{

			$user = $this->db->get_where('employee',array('user_id'=>$user_id));  //changed to get_user_by_identity from email

					

			return $user;

		}

		else

		{

			return null;

		}

	}

	public function get_user_details()

	{

		$user_id = $this->session->userdata('user_id');

		if (!empty($user_id))

		{

			$user = $this->where('id', $user_id)->users()->row();  //changed to get_user_by_identity from email

						

			return $user;

		}

		return null;

	}



	/**

	 * is_admin

	 *

	 * @return bool

	 * @author Ben Edmunds

	 **/

	public function is_admin($id=false)

	{

		$this->ion_auth_model->trigger_events('is_admin');



		$admin_group = $this->config->item('admin_group', 'ion_auth');



		return $this->in_group($admin_group, $id);

	}

	/**

	 * is_executive

	 *

	 * @return bool

	 * @author John Peter

	 **/

	public function is_executive($id=false)

	{

		$this->ion_auth_model->trigger_events('is_executive');



		$executives_group = $this->config->item('executives_group', 'ion_auth');

		

		return $this->in_group($executives_group, $id);

	}
	/**

	 * is_member

	 *

	 * @return bool

	 * @author John Peter

	 **/
	

	public function is_member($id=false)

	{

		$this->ion_auth_model->trigger_events('default_group');



		$general_group = $this->config->item('default_group', 'ion_auth');


		// echo "<pre>"; print_r($this->in_group($general_group, $id)); die();
		return $this->in_group($general_group, $id);

	}
    
    /**

	 * is_driver

	 *

	 * @return bool

	 * @author John Peter

	 **/
	

	/*public function is_driver($id=false)

	{

		$this->ion_auth_model->trigger_events('driver_group');



		$driver_group = $this->config->item('driver_group', 'ion_auth');


		return $this->in_group($driver_group, $id);

	}*/

	/**

	 * in_group

	 *

	 * @param mixed group(s) to check

	 * @param bool user id

	 * @param bool check if all groups is present, or any of the groups

	 *

	 * @return bool

	 * @author Phil Sturgeon

	 **/

	public function in_group($check_group, $id=false, $check_all = false)

	{

		$this->ion_auth_model->trigger_events('in_group');



		$id || $id = $this->session->userdata('user_id');



		if (!is_array($check_group))

		{

			$check_group = array($check_group);

		}



		if (isset($this->_cache_user_in_group[$id]))

		{

			$groups_array = $this->_cache_user_in_group[$id];

		}

		else

		{

			$users_groups = $this->ion_auth_model->get_users_groups($id)->result();

			$groups_array = array();

			foreach ($users_groups as $group)

			{

				$groups_array[$group->id] = $group->name;

			}

			$this->_cache_user_in_group[$id] = $groups_array;

		}

		foreach ($check_group as $key => $value)

		{

			$groups = (is_string($value)) ? $groups_array : array_keys($groups_array);



			/**

			 * if !all (default), in_array

			 * if all, !in_array

			 */

			if (in_array($value, $groups) xor $check_all)

			{

				/**

				 * if !all (default), true

				 * if all, false

				 */

				return !$check_all;

			}

		}



		/**

		 * if !all (default), false

		 * if all, true

		 */

		return $check_all;

	}

	

	public function get_customer_id()

	{

		$customer_id = $this->session->userdata('customer_id');

		if(!empty($customer_id))

		{

			return $customer_id;

		}

		return NULL;

	}

	public function get_buser_id()

	{

		$buser_id = $this->session->userdata('buser_id');

		if(!empty($buser_id))

		{

			return $buser_id;

		}

		return NULL;

	}
}
?>