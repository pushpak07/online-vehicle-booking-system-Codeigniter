<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');







/* User Defined Constants*/
define('DS', '/');
define('DS_PATH', DIRECTORY_SEPARATOR);
define('FOLDERNAME', ltrim(str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']), "/") );



$base = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
$base .= '://'.$_SERVER['HTTP_HOST'].DS . FOLDERNAME;

define('SITEURL2',rtrim($base, "/"));
define('SITEURL',$base);


define('RESOURCES', 'assets');
define('UPLOADS','uploads');


define('SYSTEM_DSN',SITEURL.RESOURCES.DS.'system_design'.DS);
define('CSS_SYSTEM_DSN',SYSTEM_DSN.'css'.DS);


/**FRONT END CSS FILES**/
define('CSS_STYLE',CSS_SYSTEM_DSN.'styles.css');
define('CSS_CAB2',CSS_SYSTEM_DSN.'cab-2ntheame.css');
define('CSS_CAB',CSS_SYSTEM_DSN.'cab.css');




define('SCRIPTS_SYSTEM_DSN',SYSTEM_DSN.'scripts'.DS);
/**FRONT END & ADMIN JS FILES**/
define('JS_JQUERY_MIN',SCRIPTS_SYSTEM_DSN.'jquery.min.js');
define('JS_TIMEPICKER',SCRIPTS_SYSTEM_DSN.'timepicki.js');
define('JS_JQUERY_DATATABLES',SCRIPTS_SYSTEM_DSN.'jquery.dataTables.js');
define('JS_BEATPICKER_MIN',SCRIPTS_SYSTEM_DSN.'BeatPicker.min.js');
define('JS_BOOTSTRAP_MIN',SCRIPTS_SYSTEM_DSN.'bootstrap.min.js');
define('JS_CHOSEN_MIN',SCRIPTS_SYSTEM_DSN.'chosen.jquery.min.js');
define('JS_JQUERY_GEOCOMPLETE',SCRIPTS_SYSTEM_DSN.'jquery.geocomplete.js');
define('JS_LOGGER',SCRIPTS_SYSTEM_DSN.'logger.js');
define('JS_GMAP3',SCRIPTS_SYSTEM_DSN.'gmap3.js');


/**FRONT END JS FILES**/
define('JS_BOOTSTRAP_TIMEPICKER',SCRIPTS_SYSTEM_DSN.'bootstrap-timepicker.js');
define('JS_BX_SLIDER',SCRIPTS_SYSTEM_DSN.'bx-slider.js');
define('JS_JQUERY_REVEAL',SCRIPTS_SYSTEM_DSN.'jquery.reveal.js');






/**FRONT END IMAGES FOLDER**/
define('IMGS_SYSTEM_DSN',SYSTEM_DSN.'images'.DS);



define('FORM_VLDN',SYSTEM_DSN.'form_validation'.DS);
define('JS_FORM_VLDN',FORM_VLDN.'js'.DS);

/**FRONT END & ADMIN JS FILES**/
define('JS_JQUERY_VALIDATE_MIN',JS_FORM_VLDN.'jquery.validate.min.js');
define('JS_ADDITIONAL_METHODS_MIN',JS_FORM_VLDN.'additional-methods.min.js');



/**ADMIN CSS FILES**/
define('CSS_BOOTSTRAP_MIN',CSS_SYSTEM_DSN.'bootstrap.min.css');
define('CSS_BOOTSTRAP_RESPONSIVE_MIN',CSS_SYSTEM_DSN.'bootstrap-responsive.min.css');

define('CSS_THEME_2ND',CSS_SYSTEM_DSN.'theme-2ntheame.css');
define('CSS_SIDE_MENU_2ND_THEME',CSS_SYSTEM_DSN.'side-menu-2nd-theme.css');
define('CSS_THEME',CSS_SYSTEM_DSN.'theme.css');
define('CSS_SIDE_MENU',CSS_SYSTEM_DSN.'side-menu.css');
define('CSS_FONT_AWESOME_MIN',CSS_SYSTEM_DSN.'font-awesome.min.css');
define('CSS_JQUERY_DATATABLES',CSS_SYSTEM_DSN.'jquery.dataTables.css');
define('CSS_RESPONSIVE_CALENDAR',CSS_SYSTEM_DSN.'responsive-calendar.css');
define('CSS_BEATPICKER_MIN',CSS_SYSTEM_DSN.'BeatPicker.min.css');
define('CSS_TIMEPICKI',CSS_SYSTEM_DSN.'timepicki.css');
define('CSS_FORM_VLDN',FORM_VLDN.'css'.DS);
define('CSS_VALIDATION_ERROR',CSS_FORM_VLDN.'validation-error.css');


define('CSS_UNIFORM_DEFAULT',CSS_SYSTEM_DSN.'uniform.default.css');
define('CSS_CHOSEN_MIN',CSS_SYSTEM_DSN.'chosen.min.css');

define('CSS_ADMIN_STYLE',CSS_SYSTEM_DSN.'admin-style.css');



/**ADMIN JS FILES**/
define('JS_JQUERY',SCRIPTS_SYSTEM_DSN.'jquery.js');


define('JS_SIDEMENU_SCRIPT',SCRIPTS_SYSTEM_DSN.'sidemenu-script.js');
define('JS_RESPONSIVE_CALENDAR',SCRIPTS_SYSTEM_DSN.'responsive-calendar.js');
define('JS_JQUERY_UNIFORM_MIN',SCRIPTS_SYSTEM_DSN.'jquery.uniform.min.js');


define('JS_SCRIPT_JQUERY_MIN',SCRIPTS_SYSTEM_DSN.'jquery.min.js');

define('JS_SCRIPT_JQUERY_VALIDATE_MIN',SCRIPTS_SYSTEM_DSN.'jquery.validate.min.js');
define('JS_FORM_VALIDATION',SCRIPTS_SYSTEM_DSN.'form-validation.js');

define('JS_CHARTS',SCRIPTS_SYSTEM_DSN.'charts.js');




/***PNOTIFY****/
define('PNOTIFY',SYSTEM_DSN.'pnotify'.DS);
define('PNOTIFY_MIN_JS',PNOTIFY.'dist/pnotify.js');
define('PNOTIFY_ANIMATE_JS',PNOTIFY.'dist/pnotify.animate.js');
define('PNOTIFY_BUTTON_JS',PNOTIFY.'dist/pnotify.buttons.js');
define('PNOTIFY_CALLBACK_JS',PNOTIFY.'dist/pnotify.callbacks.js');
define('PNOTIFY_CONFIRM_JS',PNOTIFY.'dist/pnotify.confirm.js');
define('PNOTIFY_DESKTOP_JS',PNOTIFY.'dist/pnotify.desktop.js');
define('PNOTIFY_MIN_CSS',PNOTIFY.'dist/pnotify.css');
define('PNOTIFY_BRIGHTTHEME_CSS',PNOTIFY.'dist/pnotify.brighttheme.css');
define('PNOTIFY_BUTTONS_CSS',PNOTIFY.'dist/pnotify.buttons.css');



/* TEMPLATE CONSTANTS */
define('TEMPLATE_ADMIN','templates/admin_template');
define('TEMPLATE_EXECUTIVE','templates/executive_template');

define('TEMPLATE_SITE','templates/site_template');
define('TEMPLATE_DRIVER','templates/driver_template');




/**ADMIN DATATABLES**/
define('URL_ADMIN_DATATABLES',SYSTEM_DSN.'DataTables'.DS);



/***ICONS***/
define('CLASS_EDIT_BTN', 'btn btn-primary margin-right-5');
define('CLASS_ICON_EDIT', 'fa fa-edit');
define('CLASS_DELETE_BTN', 'btn btn-warning margin-right-5');
define('CLASS_ICON_DELETE', 'fa fa-trash');





/** TABLES **/
define('TBL_PREFIX','vbs_');
define('TBL_USERS','users');
define('TBL_USERS_GROUPS','users_groups');
define('TBL_GROUPS','groups');



define('TBL_ABOUTUS','aboutus');
define('TBL_AIRPORTS','airports');
define('TBL_ASSIGN_CAR_DRIVERS','assign_cars_driver');
define('TBL_BOOKINGS','bookings');
define('TBL_CALENDAR_TIMEZONES','calendar|timezones');
define('TBL_COST_TYPE_VALUES','cost_type_values');
define('TBL_COUNTRIES','country');
define('TBL_CURRENCY','currency');
define('TBL_DRIVERS','drivers');
define('TBL_EMAIL_SETTINGS','email_settings');
define('TBL_FAQS','faqs');
define('TBL_FEATURES','features');
define('TBL_INSTRUCTIONS','instructions');
define('TBL_LOGIN_ATTEMPTS','login_attempts');
define('TBL_PACKAGE_SETTINGS','package_settings');
define('TBL_PAYMENTS','payments');
define('TBL_PAYPAL_SETTINGS','paypal_settings');
define('TBL_REASONS_TO_BOOK','reasons_to_book');
define('TBL_SEO_SETTINGS','seo_settings');
define('TBL_SESSIONS','sessions');
define('TBL_SITE_SETTINGS','site_settings');
define('TBL_SMS_GATEWAYS','sms_gate_ways');
define('TBL_SOCIAL_NETWORKS','social_networks');
define('TBL_SETTINGS_FIELDS','system_settings_fields');
define('TBL_TESTIMONIALS_SETTINGS','testimonials_settings');
define('TBL_VEHICLE','vehicle');
define('TBL_VEHICLE_CATEGORIES','vehicle_categories');
define('TBL_VEHICLE_FEATURES','vehicle_features');
define('TBL_WAITINGS','waitings');
define('TBL_WAITING_TIME','waiting_time');
define('TBL_EMAIL_TEMPLATES','email_templates');
define('TBL_SMS_TEMPLATES','sms_templates');
define('TBL_COUPONS','coupons');






/**USER IMAGE UPLOAD URLS***/
define('USER_IMG_UPLOAD_PATH_URL','uploads'.DS.'user_images'.DS);

/**USER IMG URL FOR GET IMAGE**/
define('USER_IMG_PATH',SITEURL.UPLOADS.DS.'user_images'.DS);

/***DEFAULT USER IMAGE*/
define('DEFAULT_USER_IMAGE', USER_IMG_PATH.'user.png');


/**TESTIMONIALS USER IMAGE UPLOAD URLS***/
define('TESTI_USER_IMG_UPLOAD_PATH_URL','uploads'.DS.'testimonials_images'.DS);

/**TESTIMONIALS USER IMG URL FOR GET IMAGE**/
define('TEST_USER_IMG_PATH',SITEURL.UPLOADS.DS.'testimonials_images'.DS);






/**FEVICON UPLOAD URLS***/
define('FEVICON_IMG_UPLOAD_PATH_URL','uploads'.DS.'fevicon'.DS);

/**FEVICON IMG URL FOR GET IMAGE***/
define('FEVICON_IMG_PATH',SITEURL.UPLOADS.DS.'fevicon'.DS);

/**DEFAULT FEVICON**/
define('FEVICON',FEVICON_IMG_PATH.'default_favicon.ico');



/**SITELOGO UPLOAD URLS***/
define('LOGO_IMG_UPLOAD_PATH_URL','uploads'.DS.'site_logo'.DS);
define('LOGO_IMG_UPLOAD_THUMB_PATH_URL','uploads'.DS.'site_logo'.DS.'thumbs'.DS);


/**LOGO IMG URL FOR GET IMAGE***/
define('LOGO_IMG_PATH',SITEURL.UPLOADS.DS.'site_logo'.DS);
define('LOGO_IMG_THUMB_PATH',SITEURL.UPLOADS.DS.'site_logo'.DS.'thumbs'.DS);

/**DEFAULT SITE LOGO**/
define('DEFAULT_SITE_LOGO',LOGO_IMG_PATH.'default_logo.png');



/**PAYPAL LOGO UPLOAD URLS***/
define('PAYPAL_LOGO_IMG_UPLOAD_PATH_URL','uploads'.DS.'paypal_settings_images'.DS);

/**PAYPAL LOGO IMG URL FOR GET IMAGE***/
define('PAYPAL_LOGO_IMG_PATH',SITEURL.UPLOADS.DS.'paypal_settings_images'.DS);




/**VEHICLE IMAGES UPLOAD URLS***/
define('VEHICLE_IMG_UPLOAD_PATH_URL',UPLOADS.DS.'vehicle_images'.DS);

/**VEHICLE IMG URL FOR GET IMAGE***/
define('VEHICLE_IMG_PATH',SITEURL.UPLOADS.DS.'vehicle_images'.DS);


//DEFAULT VEHICLE IMAGE
define('DEFAULT_VEHICLE_IMG',VEHICLE_IMG_PATH.'default-car.jpg');









/**DRIVER LICENSE URLS***/
define('DRIVER_LICENSE_UPLOAD_PATH_URL','uploads'.DS.'driver_license'.DS);

/**DRIVER LICENSE URL FOR GET IMAGE***/
define('DRIVER_LICENSE_IMG_PATH',SITEURL.UPLOADS.DS.'driver_license'.DS);





define('ALLOWED_TYPES','gif|jpg|jpeg|png');
define('ALLOWED_FEVICON_TYPES','ico');

define('REFRESH','refresh');


define('DEMO',FALSE);

define('version','2');




/* End of file constants.php */
/* Location: ./application/config/constants.php */