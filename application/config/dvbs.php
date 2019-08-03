<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


		$CI =& get_instance();
     	$CI->load->database();

		$results = $CI->db->get('vbs_site_settings')->row();
		if(count($results)>0) {
			$CI->config->set_item('site_settings', $results);
		}

		$seo_settings = $CI->db->get('vbs_seo_settings')->row();
		if(count($seo_settings)>0) {
			$CI->config->set_item('seo_settings', $seo_settings);
		}

		$email = $CI->db->get('vbs_email_settings')->row();
		if(count($email)>0) {
			$CI->config->set_item('emailSettings', $email);	
		}
		
		$date_seperators = array('.','-','/');
		for($i=0;$i<count($date_seperators);$i++) {
		
			if (preg_match("/".preg_quote($date_seperators[$i],'/')."/i", $results->date_formats)) {
			
				$seperator = $date_seperators[$i];
				$CI->config->set_item('seperator', $seperator);
				$date = explode($seperator, $results->date_formats);
				$CI->config->set_item('date_format', $date[0][0].$seperator.$date[1][0].$seperator.$date[2][0]);
				$CI->config->set_item('date_elem1', strtoupper($date[0]));
				$CI->config->set_item('date_elem2', strtoupper($date[1]));
				$CI->config->set_item('date_elem3', strtoupper($date[2]));
			}			
		}
		
		

		$config['use_mongodb'] = FALSE;



/*

| -------------------------------------------------------------------------

| MongoDB Collection.

| -------------------------------------------------------------------------

| Setup the mongodb docs using the following command:

| $ mongorestore sql/mongo

|

*/
$config['site_theme'] = $results->site_theme;
$config['collections']['users']          = 'users';

$config['collections']['groups']         = 'groups';

$config['collections']['login_attempts'] = 'login_attempts';



/*

| -------------------------------------------------------------------------

| Tables.

| -------------------------------------------------------------------------

| Database table names.

*/

$config['tables']['users']           = 'users';

$config['tables']['groups']          = 'groups';

$config['tables']['users_groups']    = 'users_groups';

$config['tables']['login_attempts']  = 'login_attempts';

$config['tables']['buser_customers'] = 'buser_customers';

$config['tables']['roles']  		 = 'roles';



/*

 | Users table column and Group table column you want to join WITH.

 |

 | Joins from users.id

 | Joins from groups.id

 */

$config['join']['users']  = 'user_id';

$config['join']['groups'] = 'group_id';







/* End of file ion_auth.php */

/* Location: ./application/config/ion_auth.php */

