<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - Turkish
*
* Author: Asil KARBEYAZ
* 		  asilkarbeyaz@gmail.com
*        instagram: 	@asilkarbeyaz
*        facebook :     /asilkarbeyaz
*        twitter  :     @asilkarbeyaz
*
* Created:  18.03.2015
*
* Description:  Turkis language file for Ion Auth example views
*
*/

// Hatalar
$lang['error_csrf'] = 'Bu gönderi güvenlik kontrollerimizden geçmedi.';

// Login
$lang['login_heading']         = 'Giriş';
$lang['login_subheading']      = 'Lütfen Kullanıcı Adınız(Eposta Adresiniz) ve Şifrenizi kullanarak giriş yapınız';
$lang['login_identity_label']  = 'Eposta/Kullanıcı Adı:';
$lang['login_password_label']  = 'Şifre:';
$lang['login_remember_label']  = 'Beni Hatırla:';
$lang['login_submit_btn']      = 'Giriş Yap';
$lang['login_forgot_password'] = 'Sorun mu yaşıyorsunuz?';

// Index
$lang['index_heading']           = 'Üyeler';
$lang['index_subheading']        = 'Üyelerin listesi aşağıdadır.';
$lang['index_fname_th']          = 'Adı';
$lang['index_lname_th']          = 'Soyadı';
$lang['index_email_th']          = 'Eposta';
$lang['index_groups_th']         = 'Gruplar';
$lang['index_status_th']         = 'Durum';
$lang['index_action_th']         = 'Eylem';
$lang['index_active_link']       = 'Aktif';
$lang['index_inactive_link']     = 'Pasif';
$lang['index_create_user_link']  = 'Yeni üye oluştur';
$lang['index_create_group_link'] = 'Yeni grup oluştur';

// Üye Devredışı Bırakma
$lang['deactivate_heading']                  = 'Üyeyi devredışı bırak';
$lang['deactivate_subheading']               = '\'%s\' devredışı bırakmak istediğinizden emin misiniz?';
$lang['deactivate_confirm_y_label']          = 'Evet:';
$lang['deactivate_confirm_n_label']          = 'Hayır:';
$lang['deactivate_submit_btn']               = 'Gönder'; 
$lang['deactivate_validation_confirm_label'] = 'Onay';
$lang['deactivate_validation_user_id_label'] = 'Üye ID';

// Üye Oluşturma
$lang['create_user_heading']                           = 'Üye Oluştur';
$lang['create_user_subheading']                        = 'Lütfen aşağıdaki alana üyenin bilgilerini giriniz.';
$lang['create_user_fname_label']                       = 'Adı';
$lang['create_user_lname_label']                       = 'Soyadı';
$lang['create_gender_label']                       	   = 'Cinsiyet  : ';
$lang['create_dob_label']                       	   = 'Doğum tarihi  ';
$lang['create_user_desired_location_label']			   = 'İstenilen Yer';
$lang['create_user_desired_job_type_label']			   = 'İstenilen İş Tipi';
$lang['create_user_open_for_contract_label']		   = 'Sözleşme için Açık';
$lang['create_user_pay_rate_label']		   			   = 'Ödeme Oranı';
$lang['create_current_salary_label']		   		   = 'Güncel Maaş';
$lang['create_city_label']							   = 'İlçe';
$lang['create_state_label']							   = 'İl';
$lang['create_country_label']						   = 'Ülke';
$lang['create_fax_label']						   	   = 'Fax';
$lang['create_industry_label']						   = 'Sektör';

$lang['create_Zipcode_label']						   = 'Posta Kodu';
$lang['create_willing_relocate_label']                 = 'Yer değiştirmek istiyor : ';
$lang['create_user_company_label']                     = 'Firma Adı:';
$lang['create_user_email_label']                       = 'Eposta';
$lang['create_user_primary_email_label']               = 'Birincil Eposta';
$lang['create_user_secondary_email_label']             = 'İkincil Eposta';
$lang['create_user_phone_label']                       = 'Telefon';

$lang['create_user_primary_phone_label']               = 'Birincil Telefon';
$lang['create_user_secondary_phone_label']             = 'İkincil Telefon';
$lang['create_user_password_label']                    = 'Şifre:';
$lang['create_user_password_confirm_label']            = 'Şifre Doğrulama:';
$lang['create_user_submit_btn']                        = 'Üye Oluştur';
$lang['create_user_validation_fname_label']            = 'Adı';
$lang['create_user_validation_lname_label']            = 'Soyadı';
$lang['create_user_validation_email_label']            = 'Eposta Adresi';
$lang['create_user_validation_phone1_label']           = 'Ülke Kodu';
$lang['create_user_validation_phone2_label']           = 'Alan Kodu';
$lang['create_user_validation_phone3_label']           = 'Telefon Numarası';
$lang['create_user_validation_company_label']          = 'Firma Adı';
$lang['create_user_validation_password_label']         = 'Şifre';
$lang['create_user_validation_password_confirm_label'] = 'Şifre Doğrulama';

// Üye Düzenleme
$lang['edit_user_heading']                           = 'Üye Düzenle';
$lang['edit_user_subheading']                        = 'Lütfen aşağıdaki alana üyenin bilgilerini giriniz.';
$lang['edit_user_fname_label']                       = 'Adı:';
$lang['edit_user_lname_label']                       = 'Soyadı:';
$lang['edit_user_company_label']                     = 'Firma Adı:';
$lang['edit_user_email_label']                       = 'Eposta:';
$lang['edit_user_phone_label']                       = 'Telefon:';
$lang['edit_user_password_label']                    = 'Şifre: (değiştirmek için kullanın)';
$lang['edit_user_password_confirm_label']            = 'Şifre Doğrulama: (değiştirmek için kullanın)';
$lang['edit_user_groups_heading']                    = 'Grup';
$lang['edit_user_submit_btn']                        = 'Kaydet';
$lang['edit_user_validation_fname_label']            = 'Adı';
$lang['edit_user_validation_lname_label']            = 'Soyadı';
$lang['edit_user_validation_email_label']            = 'Eposta Adresi';
$lang['edit_user_validation_phone1_label']           = 'Ülke Kodu';
$lang['edit_user_validation_phone2_label']           = 'Alan Kodu';
$lang['edit_user_validation_phone3_label']           = 'Telefon Numarası';
$lang['edit_user_validation_company_label']          = 'Firma Adı';
$lang['edit_user_validation_groups_label']           = 'Gruplar';
$lang['edit_user_validation_password_label']         = 'Şifre';
$lang['edit_user_validation_password_confirm_label'] = 'Şifre Doğrulama';

// Grup Oluşturma
$lang['create_group_title']                  = 'Grup Oluştur';
$lang['create_group_heading']                = 'Grup Oluştur';
$lang['create_group_subheading']             = 'Lütfen aşağıdaki alana grup bilgilerini giriniz.';
$lang['create_group_name_label']             = 'Grup Adı:';
$lang['create_group_desc_label']             = 'Açıklama:';
$lang['create_group_submit_btn']             = 'Oluştur';
$lang['create_group_validation_name_label']  = 'Grup Adı';
$lang['create_group_validation_desc_label']  = 'Açıklama';

// Grup Düzenleme
$lang['edit_group_title']                  = 'Grup Düzenle';
$lang['edit_group_saved']                  = 'Grup Kaydedildi';
$lang['edit_group_heading']                = 'Grup Düzenle';
$lang['edit_group_subheading']             = 'Lütfen aşağıdaki alana grup bilgilerini giriniz.';
$lang['edit_group_name_label']             = 'Grup Adı:';
$lang['edit_group_desc_label']             = 'Açıklama:';
$lang['edit_group_submit_btn']             = 'Kaydet';
$lang['edit_group_validation_name_label']  = 'Grup Adı';
$lang['edit_group_validation_desc_label']  = 'Açıklama';

// Şifre Değiştirme
$lang['change_password_heading']                               = 'Şifre Değiştirme';
$lang['change_password_old_password_label']                    = 'Eski Şifre:';
$lang['change_password_new_password_label']                    = 'Yeni Şifre (en az %s karakter uzunluğunda olmalıdır.):';
$lang['change_password_new_password_confirm_label']            = 'Yeni Şifreyi Onayla';
$lang['change_password_submit_btn']                            = 'Değiştir';
$lang['change_password_validation_old_password_label']         = 'Eski Şifre';
$lang['change_password_validation_new_password_label']         = 'Yeni Şifre';
$lang['change_password_validation_new_password_confirm_label'] = 'Yeni Şifreyi Onayla';

// Şifre Yenileme
$lang['forgot_password_heading']                 = 'Şifre Yenileme';
$lang['forgot_password_subheading']              = 'Şifre sıfırlama epostası gönderebilmemiz için %s nizi aşağıdaki alana giriniz.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Gönder';
$lang['forgot_password_validation_email_label']  = 'Eposta Adresi';
$lang['forgot_password_username_identity_label'] = 'Kullanıcı Adı';
$lang['forgot_password_email_identity_label']    = 'Eposta';
$lang['forgot_password_email_not_found']         = 'Bu eposta adresine ait kayıt bulunamadı.';

// Şifre Sıfırlama
$lang['reset_password_heading']                               = 'Şifre Değiştir';
$lang['reset_password_new_password_label']                    = 'Yeni Şifre (en az %s karakter uzunluğunda olmalıdır.):';
$lang['reset_password_new_password_confirm_label']            = 'Yeni Şifreyi Onayla:';
$lang['reset_password_submit_btn']                            = 'Değiştir';
$lang['reset_password_validation_new_password_label']         = 'Yeni Şifre';
$lang['reset_password_validation_new_password_confirm_label'] = 'Yeni Şifreyi Onayla';
