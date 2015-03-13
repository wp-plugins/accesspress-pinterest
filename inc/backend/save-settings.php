<?php 
defined('ABSPATH') or die('No script kiddies please!');
//var_dump($_POST);
//die();

/*

'action' => string 'apsp_save_options' (length=17)
  'apsp-pinterest-button-size' => string 'small' (length=5)
  'apsp-pinterest-button-shape' => string 'rectangular' (length=11)
  'apsp-pinterest-rectangle-color' => string 'red' (length=3)
  'apsp-pinterest-rectangle-lang' => string 'english' (length=7)
  'apsp_add_nonce_save_settings' => string '790eef5ce5' (length=10)
  '_wp_http_referer' => string '/accesspress-pinterest/wp-admin/admin.php?page=apsp-pinterest' (length=61)
  'apsp_save_settings' => string 'Save Settings' (length=13)

*/

$apsp_settings = array();

$pinit_js_disable = isset($_POST['apsp-pinit-js-disable']) ? $_POST['apsp-pinit-js-disable'] : 'off';
$js_enable= isset($_POST['apsp-pinit-js']) ? $_POST['apsp-pinit-js'] : 'off';
$button_size 	= 	$_POST['apsp-pinterest-button-size'];
$button_shape 	= 	$_POST['apsp-pinterest-button-shape'];
$button_color	= 	$_POST['apsp-pinterest-rectangle-color'];
$button_lang 	=	$_POST['apsp-pinterest-rectangle-lang'];
if ($_POST['action'] == 'apsp_save_options') {
  $apsp_settings['pinit_js_disable'] =$pinit_js_disable;
	$apsp_settings['js_enabled'] = $js_enable;
	$apsp_settings['size']=$button_size;
	$apsp_settings['shape']=$button_shape;
	$apsp_settings['color']=$button_color;
	$apsp_settings['language']=$button_lang;
	update_option( APSP_SETTINGS, $apsp_settings);
	$_SESSION['apsp_message'] = __('Settings Saved Successfully.', APSP_TEXT_DOMAIN);
    wp_redirect(admin_url() . 'admin.php?page=apsp-pinterest');
    exit;
}


 ?>