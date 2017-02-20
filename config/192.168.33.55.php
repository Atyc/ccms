<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['base_path'] = trim(getcwd()).'/';
$config['base_url']	= '/';
$config['upload_path'] = $config['base_path'].'img/';
$config['upload_url'] = $config['base_url'].'img/';
$config['environment'] = 'LOCAL';
$config['title'] = (!empty($config['environment']) ? '['.$config['environment'].'] ' : '').'CMS TEST';
$config['errors_log'] = '/var/log/errors_bccms.log';
$config['errors_visible'] = 1;
$config['analytics'] = 0;
$config['cache']['force_download'] = 1;
$config['cache']['pack_js'] = 0;
$config['cache']['pack_css'] = 1;
$config['update']['allow_updates'] = 1;

$config['database']['hostname'] = '127.0.0.1';
$config['database']['username'] = 'root';
$config['database']['password'] = 'root';
$config['database']['database'] = 'scotchbox';
$config['database']['dbdriver'] = 'mysqli';

// what modules to load
$config['modules'] = array('cms', 'testsite', );

// admin superuser password
$config['admin_username'] = 'cms';
$config['admin_password'] = 'cms';

// static panels - position => panel_name
// $config['static_panels'] = array('footer'=> 'header');
$config['static_panels'] = array(
	);
