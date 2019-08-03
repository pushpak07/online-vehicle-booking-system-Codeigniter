<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - Russian
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'Эта  анкеты не прошла нашу проверки безопасности.';

// Login
$lang['login_heading']         = 'Войти';
$lang['login_subheading']      = 'Пожалуйста, войдите с Вашим E-mail/Логин и пароль ниже.';
$lang['login_identity_label']  = 'E-mail/Логин:';
$lang['login_password_label']  = 'Пароль:';
$lang['login_remember_label']  = 'Запомнить Меня:';
$lang['login_submit_btn']      = 'Войти';
$lang['login_forgot_password'] = 'Забыли пароль?';

// Index
$lang['index_heading']           = 'Пользователи';
$lang['index_subheading']        = 'Ниже списка пользователей.';
$lang['index_fname_th']          = 'Имя';
$lang['index_lname_th']          = 'Фамилия';
$lang['index_email_th']          = 'E-mail';
$lang['index_groups_th']         = 'Группы';
$lang['index_status_th']         = 'Статус';
$lang['index_action_th']         = 'Действие';
$lang['index_active_link']       = 'Активный';
$lang['index_inactive_link']     = 'Неактивный';
$lang['index_create_user_link']  = 'Создание нового пользователя';
$lang['index_create_group_link'] = 'Создать новую группу';

// Deactivate User
$lang['deactivate_heading']                  = 'Отключить Пользователя';
$lang['deactivate_subheading']               = 'Вы уверены, что хотите отключить пользователя \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Да:';
$lang['deactivate_confirm_n_label']          = 'Нет:';
$lang['deactivate_submit_btn']               = 'Подтвердить'; 
$lang['deactivate_validation_confirm_label'] = 'подтверждение';
$lang['deactivate_validation_user_id_label'] = 'ID пользователя';

// Create User
$lang['create_user_heading']                           = 'Создать пользователя';
$lang['create_user_subheading']                        = 'Пожалуйста, введите имя пользователя\ей Приведенная ниже информация.';
$lang['create_user_fname_label']                       = 'Имя';
$lang['create_user_lname_label']                       = 'Фамилия';
$lang['create_gender_label']                       	   = 'Пол  : ';
$lang['create_dob_label']                       	   = 'Дата Рождения ';
$lang['create_user_desired_location_label']			   = 'Ваше Расположение';
$lang['create_user_desired_job_type_label']			   = 'Желаемый Тип работы';
$lang['create_user_open_for_contract_label']		   = 'Открыть для контрактных';
$lang['create_user_pay_rate_label']		   			   = 'Платное Оценить';
$lang['create_current_salary_label']		   		   = 'Текущая заработная оплаты';
$lang['create_city_label']							   = 'Город';
$lang['create_state_label']							   = 'Область';
$lang['create_country_label']						   = 'Страна';
$lang['create_fax_label']						   	   = 'Факс';
$lang['create_industry_label']						   = 'Промышленность';

$lang['create_Zipcode_label']						   = 'Почтовый Индекс';
$lang['create_willing_relocate_label']                 = 'Готовность к переезду : ';
$lang['create_user_company_label']                     = 'Название Компании:';
$lang['create_user_email_label']                       = 'E-mail';
$lang['create_user_primary_email_label']               = 'Основной E-mail';
$lang['create_user_secondary_email_label']             = 'Дополнительный E-mail';
$lang['create_user_phone_label']                       = 'Телефон';

$lang['create_user_primary_phone_label']               = 'Основной Телефон';
$lang['create_user_secondary_phone_label']             = 'Дополнительный Телефон';
$lang['create_user_password_label']                    = 'Пароль:';
$lang['create_user_password_confirm_label']            = 'Подтвердите Пароль:';
$lang['create_user_submit_btn']                        = 'Создать пользователя';
$lang['create_user_validation_fname_label']            = 'Имя';
$lang['create_user_validation_lname_label']            = 'Фамилия';
$lang['create_user_validation_email_label']            = 'E-mail';
$lang['create_user_validation_phone1_label']           = 'Основной Телефон';
$lang['create_user_validation_phone2_label']           = 'Дополнительный Телефон';
$lang['create_user_validation_phone3_label']           = 'Резервный Телефон';
$lang['create_user_validation_company_label']          = 'Название Компании';
$lang['create_user_validation_password_label']         = 'Пароль';
$lang['create_user_validation_password_confirm_label'] = 'Подтверждение пароля';

// Edit User
$lang['edit_user_heading']                           = 'Редак-ние Пользователя';
$lang['edit_user_subheading']                        = 'Пожалуйста, введите имя пользователя\ей Приведенная ниже информация.';
$lang['edit_user_fname_label']                       = 'Имя:';
$lang['edit_user_lname_label']                       = 'Фамилия:';
$lang['edit_user_company_label']                     = 'Название Компании:';
$lang['edit_user_email_label']                       = 'E-mail:';
$lang['edit_user_phone_label']                       = 'Телефон:';
$lang['edit_user_password_label']                    = 'Пароль: (если изменение пароля)';
$lang['edit_user_password_confirm_label']            = 'Подтвердите пароль: (если изменения пароля)';
$lang['edit_user_groups_heading']                    = 'Член группы';
$lang['edit_user_submit_btn']                        = 'Сохранить пользователя';
$lang['edit_user_validation_fname_label']            = 'Имя';
$lang['edit_user_validation_lname_label']            = 'Фамилия';
$lang['edit_user_validation_email_label']            = 'E-mail';
$lang['edit_user_validation_phone1_label']           = 'Основной Телефон';
$lang['edit_user_validation_phone2_label']           = 'Дополнительный Телефон';
$lang['edit_user_validation_phone3_label']           = 'Резервный Телефон';
$lang['edit_user_validation_company_label']          = 'Название Компании';
$lang['edit_user_validation_groups_label']           = 'Группы';
$lang['edit_user_validation_password_label']         = 'Пароль';
$lang['edit_user_validation_password_confirm_label'] = 'Повторите Пароль';

// Create Group
$lang['create_group_title']                  = 'Создать группу';
$lang['create_group_heading']                = 'Создать группу';
$lang['create_group_subheading']             = 'Пожалуйста, введите информацию о группе ниже.';
$lang['create_group_name_label']             = 'Название группы:';
$lang['create_group_desc_label']             = 'Описание:';
$lang['create_group_submit_btn']             = 'Создать группу';
$lang['create_group_validation_name_label']  = 'Название группы';
$lang['create_group_validation_desc_label']  = 'Описание';

// Edit Group
$lang['edit_group_title']                  = 'Изменить группу';
$lang['edit_group_saved']                  = 'Сохраненные группы';
$lang['edit_group_heading']                = 'Изменить группу';
$lang['edit_group_subheading']             = 'Пожалуйста, введите информацию о группе ниже.';
$lang['edit_group_name_label']             = 'Название группы:';
$lang['edit_group_desc_label']             = 'Описание:';
$lang['edit_group_submit_btn']             = 'Сохранить Группу';
$lang['edit_group_validation_name_label']  = 'Название группы';
$lang['edit_group_validation_desc_label']  = 'Описание';

// Change Password
$lang['change_password_heading']                               = 'Изменить Пароль';
$lang['change_password_old_password_label']                    = 'Старый Пароль:';
$lang['change_password_new_password_label']                    = 'Новый пароль (длиной символов минимум %s ):';
$lang['change_password_new_password_confirm_label']            = 'Подтвердите новый пароль';
$lang['change_password_submit_btn']                            = 'Изменение';
$lang['change_password_validation_old_password_label']         = 'Старый Пароль';
$lang['change_password_validation_new_password_label']         = 'Новый Пароль';
$lang['change_password_validation_new_password_confirm_label'] = 'Подтвердите новый пароль';

// Forgot Password
$lang['forgot_password_heading']                 = 'Забыли Пароль';
$lang['forgot_password_subheading']              = 'Пожалуйста, введите ваш %s чтобы мы могли отправить вам письмо для восстановления пароля.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Отправить';
$lang['forgot_password_validation_email_label']  = 'E-mail';
$lang['forgot_password_username_identity_label'] = 'Имя пользователя';
$lang['forgot_password_email_identity_label']    = 'E-mail';
$lang['forgot_password_email_not_found']         = 'У нас нет записи этого E-mail.';

// Reset Password
$lang['reset_password_heading']                               = 'Изменить Пароль';
$lang['reset_password_new_password_label']                    = 'Новый пароль (длиной символов минимум %s ):';
$lang['reset_password_new_password_confirm_label']            = 'Подтвердите новый пароль:';
$lang['reset_password_submit_btn']                            = 'Изменить';
$lang['reset_password_validation_new_password_label']         = 'Новый Пароль';
$lang['reset_password_validation_new_password_confirm_label'] = 'Подтвердите новый пароль';
