<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Turkish
*
* Author: Asil KARBEYAZ
* 		  asilkarbeyaz@gmail.com
*         t: @asilkarbeyaz
*		  f: /asilkarbeyaz	
* 		  i: @asilkarbeyaz	
*
* Created:  18.03.2015
*
* Description:  Turkish language file for Ion Auth messages and errors
*
*/

// Hesap Oluşturma
$lang['account_creation_successful'] 	  	 = 'Hesap Başarıyla Oluşturuldu';
$lang['account_creation_unsuccessful'] 	 	 = 'Hesap Oluşturma Kapalı';
$lang['account_creation_duplicate_email'] 	 = 'Eposta Kullanılmakta ya da Geçersiz';
$lang['account_creation_duplicate_username'] = 'Kullanıcı Adı Kullanılmakta ya da Geçersiz';

// Şifre
$lang['password_change_successful'] 	 	 = 'Şifre Başarıyla Değiştirildi';
$lang['password_change_unsuccessful'] 	  	 = 'Şifre Değiştirme Kapalı';
$lang['forgot_password_successful'] 	 	 = 'Şifre Sıfırlama Maili Gönderildi';
$lang['forgot_password_unsuccessful'] 	 	 = 'Şifre Sıfırlama Kapalı';

// Aktivasyon
$lang['activate_successful'] 		  	     = 'Hesap Aktifedildi';
$lang['activate_unsuccessful'] 		 	     = 'Hesap Aktivasyonu Kapalı';
$lang['deactivate_successful'] 		  	     = 'Hesap Devredışı Bırakıldı';
$lang['deactivate_unsuccessful'] 	  	     = 'Hesabı Devredışı Bırakmak Kapalı';
$lang['activation_email_successful'] 	  	 = 'Aktivasyon Maili Gönderildi';
$lang['activation_email_unsuccessful']   	 = 'Aktivasyon Maili Gönderme Kapalı';

// Giriş / Çıkış
$lang['login_successful'] 		  	         = 'Başarıyla Giriş Yapıldı';
$lang['login_unsuccessful'] 		  	     = 'Hatalı Giriş';
$lang['login_unsuccessful_not_active'] 		 = 'Hesap Aktif Değil';
$lang['login_timeout']                       = 'Geçici Olarak Kilitlendi.  Lütfen Daha Sonra Tekrar Deneyiniz.';
$lang['logout_successful'] 		 	         = 'Başarıyla Çıkış Yapıldı';

// Hesap Değişiklikleri
$lang['update_successful'] 		 	         = 'Hesap Bilgisi Başarıyla Güncellendi';
$lang['update_unsuccessful'] 		 	     = 'Hesap Bilgisi Güncelle Kapalı';
$lang['delete_successful']               = 'Üye Silindi';
$lang['delete_unsuccessful']           = 'Üye Silme Kapalı';

// Gruplar
$lang['group_creation_successful']  = 'Grup Başarıyla Oluşturuldu';
$lang['group_already_exists']       = 'Grup Adı Kullanılmaktadır';
$lang['group_update_successful']    = 'Grup Detayları Güncellendi';
$lang['group_delete_successful']    = 'Grup Silindi';
$lang['group_delete_unsuccessful'] 	= 'Grup Silme Kapalı';
$lang['group_name_required'] 		= 'Grup Adı Gerekli Bir Alandır';

// Aktivasyon Epostası
$lang['email_activation_subject']            = 'Hesap Aktivasyonu';
$lang['email_activate_heading']    = '%s Hesabını Aktifet';
$lang['email_activate_subheading'] = 'Lütfen %s. linkine tıklayarak';
$lang['email_activate_link']       = 'Hesabınızı aktif edin.';

// Unutulan Şifre Maili
$lang['email_forgotten_password_subject']    = 'Şifre Yenileme Bildirisi';
$lang['email_forgot_password_heading']    = '%s için şifre yenileme';
$lang['email_forgot_password_subheading'] = 'Lütfen %s. linkine tıklayarak';
$lang['email_forgot_password_link']       = 'şifrenizi sıfırlayınız';

// Yeni Şifre Maili
$lang['email_new_password_subject']          = 'Yeni Şifre';
$lang['email_new_password_heading']    = '%s için yeni şifre';
$lang['email_new_password_subheading'] = 'Şifreniz  %s ile değiştirilmiştir.';
