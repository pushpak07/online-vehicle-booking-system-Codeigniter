<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dvbs_Model extends Base_Model  
{
	function __construct()
	{
		parent::__construct();
	}


	function get_testimonials($status='') {

		
		if ($status!='')
			$status=$status;
		else
			$status='';

		$cond=array();

		if ($status!='')
		$cond=array('status'=>$status);

		$records = $this->base_model->fetch_records_from(TBL_TESTIMONIALS_SETTINGS,$cond);

		return $records;

	}


	function get_footer_pages($status='') {

		if ($status!='')
			$status=$status;
		else
			$status='';

		$cond=array('is_bottom'=>'1');
		if ($status!='')
			$cond=array('is_bottom'=>'1','status'=>$status);


		$this->db->select('id,name,parent_id');
		$sub_categories = $this->db->get_where(TBL_ABOUTUS,$cond)->result();

		return $sub_categories;

	}


	function get_navigation_features() {

		$this->db->select('id,name');
        $categories = $this->db->get_where(TBL_ABOUTUS,array('parent_id' => 0,'status'=>'Active'))->result();

        return $categories;
	}

	function get_sub_features($parent_id) {

		$this->db->select('id,name,parent_id');

		$this->db->order_by('sort_order','asc');

        $sub_categories = $this->db->get_where('vbs_aboutus',array('parent_id' => $parent_id,'status' => 'Active'))->result();

        return $sub_categories;
	}

	function waiting_time_options() {

		$waiting_times = $this->base_model->run_query("SELECT * FROM ".TBL_PREFIX.TBL_WAITINGS." where status='Active'");

		$waiting_options = array("0 0" => $this->lang->line('select_waiting_time'));

		if (!empty($waiting_times)) {

			foreach($waiting_times as $row):
				$waiting_options[$row->waiting_time . "Mins " . $row->cost] = $row->waiting_time . " min (" . $row->cost . ")";
			endforeach;
		}

		return $waiting_options;

	}


	function get_home_vehicles() {

		$this->db->order_by("image", "random");

		$vehicles = $this->db->get(TBL_PREFIX.TBL_VEHICLE)->result();

		return $vehicles;
	}

	function get_home_airports() {

		$airports = $this->db->get_where($this->db->dbprefix('airports') , array('status' => 'active'))->result();

		return $airports;
	}


	function get_home_packages() {

		$records = $this->base_model->run_query("SELECT p.*,v.image,v.name as vehicle_name,v.model FROM " . $this->db->dbprefix('package_settings') . " p, " . $this->db->dbprefix('vehicle') . " v WHERE v.id=p.vehicle_id AND p.status='Active'");
		
		return $records;

	}

	function get_home_faqs() {

		$records = $this->db->get_where('faqs', array('status' => 'Active'))->result();
		
		return $records;
	}
    
    function admin_header_unread_bookings() {
        
        $this->db->where('is_new',0);
         
        $unread_bookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND b.is_new = '0' ORDER BY b.bookdate DESC");
        
        return $unread_bookings;
    }
    
    function admin_header_today_bookings() {
        
        $today = date("Y-m-d");
        
        $todaybookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '".$today."' AND b.is_conformed = 'pending' ORDER BY b.pick_date ASC LIMIT 10" );
        
        return $todaybookings;
    }
    
    function admin_home_get_todays_bookings() {
        
        $today = date("Y-m-d");
        
		$todaybookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '" . $today . "' AND b.is_conformed = 'pending' ORDER BY b.pick_date ASC LIMIT 10");
        
        return $todaybookings;
        
    }
    
    function admin_home_get_customers() {
        
        $records = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and g.group_id='2' GROUP BY u.id ORDER BY u.date_of_registration DESC LIMIT 10")->result();
        
        return $records;
    }
    
    function admin_home_get_members_count() {
        
        $records = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='1' and g.group_id='2'")->result();
        
        return count($records);
    }
    
    function admin_home_inactive_members_count() {
        
        $records = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='0' and g.group_id='2'")->result();
        
        return count($records);
    }
    
    function admin_home_executives_count() {
        
        $records = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='1' and g.group_id='3'")->result();
        
        return count($records);
    }
    
    function admin_home_inactive_executives_count() {
        
        $records = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='0' and g.group_id='3'")->result();
        
        return count($records);
    }
    
    function admin_home_vehicles_count() {
        
        $records = $this->db->query("select * from vbs_vehicle where status='active'")->result();
        
        return count($records);
        
    }
    
    function admin_home_airports_count() {
        
        $records = $this->db->query("select * from vbs_airports where status='active'")->result();
        
        return count($records);
        
    }
    
    function admin_home_packages_count() {
        
        $records = $this->db->query("select p.* from vbs_package_settings p where p.status='Active' AND EXISTS (select v.id from vbs_vehicle v where v.id=p.vehicle_id AND v.status='Active')")->result();
        
        return count($records);
        
    }
    
    function admin_home_bookings_count() {
        
        $records = $this->db->query("select * from vbs_bookings")->result();
        
        return count($records);
        
    }
    
    function get_executives() {
        
        $records = $this->db->query("select u.* from vbs_users u,vbs_users_groups g where  u.id=g.user_id and g.group_id='3' GROUP BY u.id")->result();
        
        return $records;
    }
    
    function get_executive_record($param1) {
        
        $user = $this->db->query("select u.* from vbs_users u,vbs_users_groups g where  u.id=g.user_id and g.group_id='3' and u.id= " . $param1 . " GROUP BY u.id")->result();
        
        if (!empty($user)) {
            $user = $user[0];
        }
        
        return $user;
    }
    
    function get_customers() {
        
        
        $records = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and g.group_id='2' GROUP BY u.id")->result();
        
        return $records;
    }
    
    function get_country_options() {
        
        $countries = $this->db->get('country')->result();
        
		$country_options = array();
        
		foreach($countries as $row):
			$country_options[$row->country_code_alpha2] = $row->country_name;
        endforeach;
        
        return $country_options;
    }
    
    
    function get_timezone_options() {
        
        $this->db->select('TimeZone');
		$time_zones = $this->db->get('calendar|timezones')->result();
        
		$time_zone_options 	= array();
        
		foreach($time_zones as $row):
            $time_zone_options[$row->TimeZone] = $row->TimeZone;
        endforeach;
        
        return $time_zone_options;
    }
    
    function get_waiting_options() {
        
        $waiting_times 	= $this->base_model->run_query(
			"SELECT * FROM vbs_waitings where status='Active'");
            
        $waiting_options = array("0 0" => "Select waiting time");
        
        foreach($waiting_times as $row):
            $waiting_options[$row->waiting_time . "Mins " . $row->cost] = $row->waiting_time . " min (" . $row->cost . ")";
        endforeach;
        
        
        return $waiting_options;
    }
    
     function get_book_waiting_options() {
        
        $waiting_times 	= $this->base_model->run_query("SELECT * FROM vbs_waitings where status='Active'");

		$waiting_options = array('0.0_No ' => 'No Waiting Time');

		if (!empty($waiting_times)) 
        {

            foreach($waiting_times as $row):

            $waiting_options[$row->cost . "_" . $row->waiting_time . " Mins"] 	= $row->waiting_time . " Mins (" . $row->cost . ")";
            endforeach;
		}
        
        
        
        return $waiting_options;
    }
    
    function get_exe_home_today_bookings() {
        
         $today = date("Y-m-d");
         
         $todaybookings1 = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '".$today."' AND b.is_conformed = 'pending' ORDER BY b.pick_date ASC LIMIT 10" );
         
         return $todaybookings1;
    }
    
    function get_exe_dashboard_today_bookings() {
        
        $today = date("Y-m-d");
		$todaybookings = $this->base_model->run_query("SELECT b.*,v.name FROM vbs_bookings AS b , vbs_vehicle AS v WHERE b.vehicle_selected = v.id AND  b.bookdate = '" . $today . "' AND b.is_conformed = 'pending' ORDER BY b.pick_date ASC LIMIT 10");
        
        return $todaybookings;
    }
    
    function exe_dashboard_customers() {
        
        $customers = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and g.group_id='2' GROUP BY u.id ORDER BY u.date_of_registration DESC LIMIT 10")->result();
        
        return $customers;
    }
    
    function exe_dashboard_members_count() {
        
        $members = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='1' and g.group_id='2'")->result();
        
		return count($members);
    }
    
    function exe_dashboard_inactive_members_count() {
        
        $inactiveMembers = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id and u.active='0' and g.group_id='2'")->result();
        
		return count($inactiveMembers);
    }
    
    function exe_dashboard_executives_count() {
        
       $executives =  $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='1' and g.group_id='3'")->result();
        
		return count($executives);
        
    }
    
    function exe_dashboard_inactive_executives_count() {
        
        $inactiveExecutives = $this->db->query("select u.* from vbs_users u, vbs_users_groups g where u.id=g.user_id  and u.active='0' and g.group_id='3'")->result();
        
		return count($inactiveExecutives);
    }
    
    function exe_dashboard_vehicles_count() {
        
        $vehicles = $this->db->query("select * from vbs_vehicle where status='active'")->result();
        
		return count($vehicles);
    }
    
    function exe_dashboard_airports_count() {
        
        $airports = $this->db->query("select * from vbs_airports where status='active'")->result();
        
		return count($airports);
    }
    
    function exe_dashboard_packages_count() {
        
        $package = $this->db->query("select * from vbs_package_settings where status='active'")->result();
        
		return count($package);
   
    }
    
    function exe_dashboard_bookings_count() {
        
        $bookings=$this->db->query("select * from vbs_bookings")->result();
        
		return count($bookings);
    }
    
    
    function get_drivers() {
        
        $records = $this->db->query("select u.* from vbs_users u,vbs_users_groups g where  u.id=g.user_id and g.group_id='4' GROUP BY u.id")->result();
        
        return $records;
    }
    
    function get_driver_record($param1) {
        
        $user = $this->db->query("select u.* from vbs_users u,vbs_users_groups g where  u.id=g.user_id and g.group_id='4' and u.id= " . $param1 . " GROUP BY u.id")->result();
        
        if (!empty($user)) {
            $user = $user[0];
        }
        
        return $user;
    }
    
    function get_exe_header_unread_bookings() {
        
        $this->db->where('is_new',0);
        
        $unread_bookings = $this->db->count_all_results('vbs_bookings');
        
        return $unread_bookings;
    }
    
    function get_sms_users() {
        
        $records = $this->base_model->run_query("select u.phone from ".TBL_PREFIX.TBL_USERS." u inner join ".TBL_PREFIX.TBL_USERS_GROUPS." ug on u.id=ug.user_id and ug.group_id=2 where u.active=1 and u.phone!=''");
        
        return $records;
        
    }
    
    function parent_pages_options() {
        
        $this->db->select('id,name');
        $categories = $this->db->get_where('vbs_aboutus', array('parent_id' => 0))->result();
        
        $category_opts 	= array("0" => "Root");
        
        if (!empty($categories)) {
            
            foreach($categories as $row):
                $category_opts[$row->id] = $row->name;
            endforeach;
        }
        
        return $category_opts;
    }
    
    function get_currency_options() {
        
        $currency = $this->base_model->run_query("SELECT * FROM " . $this->db->dbprefix('currency'));

		$currency_opts = array();
        
        if (!empty($currency)) {
            
            foreach ($currency as $row):
                $currency_opts[$row->currency_code_alpha] = $row->currency_name;
            endforeach;
        }
        
        return $currency_opts;
    }
    
    
    function get_vehicle_options() {
        
        $vehicles = $this->base_model->fetch_records_from('vehicle', array('status' => 'Active'));
            
		$vehicleOptions[''] = $this->lang->line('select_vehicle');
            
		foreach ($vehicles as $key => $val):
			$vehicleOptions[$val->id] = $val->name . " - " . $val->model . " (P: " . $val->passengers_capacity . ", LL: " . $val->large_luggage_capacity . ", SL: " . $val->small_luggage_capacity . ")";
		endforeach;
            
        return $vehicleOptions;    
    }

    function get_reasons_to_book() {

        $record = $this->base_model->fetch_records_from(TBL_REASONS_TO_BOOK,array('status'=>'Active'));

        if (!empty($record))
            $record = $record[0];

        return $record;
    }
}
?>