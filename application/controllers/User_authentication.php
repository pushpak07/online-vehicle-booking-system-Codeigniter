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
 * User_authentication.
 *
 * @category  User_authentication
 * @package   DOVBSV2
 * @author    DOVBSV2 <digitalvidhya4u@gmail.com>
 * @copyright 2017 - 2018, DOVBSV2
 * @license   http://opensource.org/licenses/MIT    MIT License
 * @link      http://codeigniter.com
 */
class User_authentication extends MY_Controller
{
    /**
    | -----------------------------------------------------
    | PRODUCT NAME:     DOVBSV2
    | -----------------------------------------------------
    | AUTHOR:           DIGITALVIDHYA TEAM
    | -----------------------------------------------------
    | EMAIL:            digitalvidhya4u@gmail.com
    | -----------------------------------------------------
    | COPYRIGHTS:       RESERVED BY DIGITALVIDHYA
    | -----------------------------------------------------      
    | http://codecanyon.net/user/codecakes
    | http://conquerorstech.net/
    | -----------------------------------------------------
    |
    | MODULE:           User_authentication CONTROLLER
    | -----------------------------------------------------
    | This is User_authentication module controller file.
    | -----------------------------------------------------
     **/
    function __construct() 
    {
        parent::__construct();
        // Load user model
        $this->load->model('user');
    }
    
    /**
     * Google signup
     *
     * @return boolean
     **/
    public function index() 
    {
        if(DEMO) 
        {
            $this->prepare_flashmessage($this->lang->line('CRUD_operations_disabled_in_DEMO_version'), 2);
            redirect(site_url().'auth/login', REFRESH);
        }
            
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = $this->config->item('site_settings')->google_client_id;
        $clientSecret = $this->config->item('site_settings')->google_client_secret;
        $redirectUrl = site_url().'user_authentication/';
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to DVBS');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setScopes('email');
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();

            if (!empty($userProfile)) {

                /* check whether user is already registered or not
                // if not registered save the details in database 
                // else directly login him */
                
                
                // Preparing data for database insertion
                $userData['name'] = $userProfile['name'];
                $userData['oauth_provider'] = 'google';
                $userData['first_name'] = $userProfile['given_name'];
                $userData['last_name'] = $userProfile['family_name'];
                $userData['email'] = $userProfile['email'];
                $userData['gender'] = $userProfile['gender'];
              
                $userData['profile_url'] = $userProfile['link'];
                $userData['picture_url'] = $userProfile['picture'];
                // Insert or update user data
                $userID = $this->user->checkUser($userData);
                if (!empty($userID)) {
                   
                    $password   = random_string('alnum', 5);
                    if ($this->ion_auth->login($userProfile['email'], $password, 1, true)) {
                    
                        $this->prepare_flashmessage('Logged in Successfully', 0);
                    
                        if ($this->ion_auth->is_member()) {
                            redirect(SITEURL, REFRESH);
                        } else {
                            redirect(SITEURL, REFRESH); 
                        }
                    } else {
                        $this->prepare_flashmessage($this->ion_auth->errors(), 1);
                        $this->session->set_userdata('login_error', 'yes');
                    
                        $this->session->set_userdata(array('loginup'=>true));
                        redirect(SITEURL, REFRESH);  

                    }
                    //
                                      
                } else {
                    $this->prepare_flashmessage("Unable to login", 1);
                    $this->session->set_userdata('login_error', 'yes');
                   
                    $this->session->set_userdata(array('loginup'=>true));
                    redirect(SITEURL, REFRESH);
                    
                }
               
                
            } else {
                // if not data is there 
                $this->prepare_flashmessage("Unable to login", 1);
                $this->session->set_userdata('login_error', 'yes');
                
                $this->session->set_userdata(array('loginup'=>true));
                    redirect(SITEURL, REFRESH);
                
            }
            
        } else {
            $this->prepare_flashmessage("Unable to login", 1);
            $this->session->set_userdata('login_error', 'yes');
            
            $this->session->set_userdata(array('loginup'=>true));
            redirect(SITEURL, REFRESH);
        }
        redirect(SITEURL);
    }
    
    /**
     * Logout
     *
     * @return boolean
     **/ 
    public function logout() 
    {
        
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/user_authentication');
    }
}
