<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Russian
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Аккаунт успешно создан';
$lang['account_creation_unsuccessful'] 	 	 = 'Не удалось создать Аккаунт';
$lang['account_creation_duplicate_email'] 	 = 'E-mail Уже использован или недействительный';
$lang['account_creation_duplicate_username'] = 'Имя пользователя Уже использовано или недействительное';

// Password
$lang['password_change_successful'] 	 	 = 'Пароль успешно изменен';
$lang['password_change_unsuccessful'] 	  	 = 'Невозможно изменить пароль';
$lang['forgot_password_successful'] 	 	 = 'Сброс пароля отправлен на E-mail';
$lang['forgot_password_unsuccessful'] 	 	 = 'Невозможно сбросить пароль';

// Activation
$lang['activate_successful'] 		  	     = 'Аккаунт Активирован';
$lang['activate_unsuccessful'] 		 	     = 'Невозможно Активировать Аккаунт';
$lang['deactivate_successful'] 		  	     = 'Аккаунт Деактивирован';
$lang['deactivate_unsuccessful'] 	  	     = 'Невозможно деактивировать Аккаунт';
$lang['activation_email_successful'] 	  	 = 'Активация отпралена вам на  E-mail';
$lang['activation_email_unsuccessful']   	 = 'Не удалось отправить письмо активации';

// Login / Logout
$lang['login_successful'] 		  	         = 'При успешном входе';
$lang['login_unsuccessful'] 		  	     = 'Неправильный Войти';
$lang['login_unsuccessful_not_active'] 		 = 'Аккаунт является неактивным';
$lang['login_timeout']                       = 'Временно заблокирован. Попробуйте еще раз позже.';
$lang['logout_successful'] 		 	         = 'Записан успешно';

// Account Changes
$lang['update_successful'] 		 	         = 'Информация об учетной записи успешно обновлена';
$lang['update_unsuccessful'] 		 	     = 'Не удается обновить информацию об учетной записи';
$lang['delete_successful']               = 'Пользователь Удален';
$lang['delete_unsuccessful']           = 'Невозможно удалить пользователя';

// Groups
$lang['group_creation_successful']  = 'Группа успешно создана';
$lang['group_already_exists']       = 'Название группы уже принято';
$lang['group_update_successful']    = 'Информация о группе обновляются';
$lang['group_delete_successful']    = 'Группа удалена';
$lang['group_delete_unsuccessful'] 	= 'Невозможно удалить группу';
$lang['group_name_required'] 		= 'Название группы является обязательным полем';

// Activation Email
$lang['email_activation_subject']            = 'Активизация Аккаунта';
$lang['email_activate_heading']    = 'Активизировать аккаунт для %s';
$lang['email_activate_subheading'] = 'Пожалуйста, нажмите на эту ссылку %s.';
$lang['email_activate_link']       = 'Активируйте свой аккаунт';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Забыли Пароль Подтверждение';
$lang['email_forgot_password_heading']    = 'Сброс пароля для %s';
$lang['email_forgot_password_subheading'] = 'Пожалуйста, нажмите на эту ссылку %s.';
$lang['email_forgot_password_link']       = 'Сбросить пароль';

// New Password Email
$lang['email_new_password_subject']          = 'Новый Пароль';
$lang['email_new_password_heading']    = 'Новый пароль для %s';
$lang['email_new_password_subheading'] = 'Ваш пароль был сброшен в: %s';
