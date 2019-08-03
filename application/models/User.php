<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model
{
	function __construct() 
	{
		$this->tableName = 'users';
		$this->primaryKey = 'id';
		// $this->load->helper(array('url','language','date','string'));
	}
	public function checkUser($data = array())
	{
		$this->db->select($this->primaryKey);
		$this->db->from($this->db->dbprefix($this->tableName));
		$this->db->where(array('email'=>$data['email']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0)
		{
			$prevResult = $prevQuery->row_array();
			$userID = $prevResult['id'];
		}
		else
		{
			
			$username 	= $data['name'];
			$password 	= random_string('alnum', 5);
			$email 		= $data['email']; 
			$additional_data = array(
					'first_name' 			=> $data['first_name'],
					'last_name'  			=> $data['last_name'],
					'username'				=> $data['first_name'].' '.$data['last_name'],
					'phone'  			    => '',
					'date_of_registration'  	=> date('Y-m-d')
					);
			$group = array(2);
			$registered_by = $data['oauth_provider'];
			
			$userID = $this->ion_auth->register($username, $password, $email, $additional_data,$group,$registered_by);
		}
		return $userID?$userID:FALSE;
    }
}
?>