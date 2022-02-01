<?php

/**
 * Uninstall plugin Logo Upload
 * 
 * @package LogoUpload
 */

 if(! defined('WP_UNINSTALL_PLUGIN')){
     die;
 }

 //Clear database data

 $logos = get_posts(array('post_type' => 'logos', 'numberposts' => -1));
 foreach ($logos as $logo) {
     wp_delete_post($logo->ID, true);
 }