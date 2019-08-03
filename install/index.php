<?php

//error_reporting(E_NONE);
 //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.
 
$db_config_path = '../application/config/database.php';
// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  	header( 'Location: loading_website') ;
		}

	}
	else {
		$message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Install | Vehicle Booking System</title>

		<style type="text/css">

	 html, body{
          background: -webkit-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
    background: -moz-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
    background: -o-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
    background: -ms-linear-gradient(-90deg, #f4f8fc 0%, rgba(252, 252, 252, 0) 100%);
      background-size:cover;
      width: 100%;
      height: auto; background-repeat:no-repeat; background-attachment:local;  font-size: 90%;
		    font-family: Helvetica,Arial,sans-serif;
		   
		    margin: 0 auto; 
      }
      .search-wrapper{
    padding: 40px 50px;position: relative;border-radius: 3px;
    background: #fff;
    -webkit-box-shadow: 0 2px 44px 0 rgba(0, 0, 0, 0.08);
    box-shadow: 0 2px 44px 0 rgba(0, 0, 0, 0.08);max-width: 500px;
}
.search-wrapper:before {
    position: absolute;
    content: "";
    background: rgba(255, 255, 255, 0.66);
    width: 97%;
    height: 30px;
    top: -10px;
    left: 0;
    right: 0;
    margin: auto;
    border-radius: 3px;
}
.search-wrapper:after {
    position: absolute;
    content: "";
    background: rgba(255, 255, 255, 0.88);
    width: 98%;
    height: 20px;
    top: -5px;
    left: 0;
    right: 0;
    margin: auto;
    border-radius: 3px;
}
		  input, select  {
		    display: block;
		    font-size: 12px;
		    margin: 0; height:35px; padding:0 15px;border-radius: 3px;
		    background: #fff !important;border: 1px solid #e6e6e6;margin-bottom: 15px;
		  
		  }
		  label {
		    margin: 5px 0px !important; display: block;color: #000;font-weight: 600;
		  }
		  input.input_text{width: calc(100% - 30px) !important}
		   select.input_text {
		    width: 100%; 
		  }
		  input#submit {
		    margin: auto;
		    font-size: 15px; 
			
			width: 150px;
height: 40px;
background: #384145;
border-radius: 3px;
border:0;
font-size: 15px;text-transform: uppercase;
    background: #707698 !important;
    color: #fff;
 
 
		  }
		 
		  legend {
		    font-size: 14px;
		    font-weight: bold; padding:0px 15px;
		  }
		  .error {
		    background: #ffd1d1;
		    border: 1px solid #ff5858;
        padding: 4px; margin:5px; clear:both;
		  }
		  .install{    background: none repeat scroll 0 0 #fff;
    border-radius: 5px;
    margin: 65px auto 0;
    width: 32%;}
		  .tag {
font-size: 16px;
    color: #403d3c;
    text-align: center;
    position: relative;
    left: 81px;
    top: -13px;
  }
  .fluid-hedder {
    background: none repeat scroll 0 0 #fff;
    border-bottom: 3px solid #ffffff;
    clear: both;
    display: flex;
    margin: 0 auto;
    position: relative;
    width: 100%;
    z-index: 999999;
}
.logo {
 
padding:0px 10px; float:left; height:48px;
}


		</style>
	</head>
	<body>

<div class="install search-wrapper"> 
<p align="middle" class="img-header"><img style="width:220px" src="logo.png" align="center" ><div class="tag">Installation</div></p>
    <br />
    <?php if(is_writable($db_config_path)){?>

		  <?php if(isset($message)) {echo '<p class="error">' . $message . '</p>';}?>

		  <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        
          <label for="hostname">Host Name</label><input type="text" id="hostname" value="localhost" class="input_text" name="hostname" required />
          <label for="username">User Name</label><input type="text" id="username" class="input_text" name="username" required />
          <label for="password">Password</label><input type="password" id="password" class="input_text" name="password"  />
          <label for="database">Database Name</label><input type="text" id="database" class="input_text" name="database" required />
          <label for="database_type">Installation Type</label>
          <select name="database_type" class="input_text" required>
          	<option value="Yes">With Data</option>
			<option value="No">Without Data</option>
          </select>
          <input type="submit" value="Install" id="submit" />
		  </form>

	  <?php } else { ?>
      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>
	  <?php } ?>
</div>
	</body>
</html>