<?php

/**
 * Plugin Name: Logo Upload
 * Description: Upload logo to a new page
 * Version: 1.0.0
 * Author: Imperyum
 */

use Inc\Base\Activate;
use Inc\Base\Deactivate;

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN_NAME', plugin_basename(__FILE__));


function activate_logoupload(){
    Activate::activate();
}

function deactivate_logoupload(){
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_logoupload');
register_deactivation_hook(__FILE__, 'deactivate_logoupload');

if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}