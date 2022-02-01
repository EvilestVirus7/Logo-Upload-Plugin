<?php

/**
 * @package LogoUpload
 */

namespace Inc\Base;

class Enqueue
{

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
        add_action('wp_enqueue_scripts', array($this, 'wp_enqueue'));
    }

    function admin_enqueue()
    {
        wp_enqueue_media();
        wp_enqueue_script('media-upload');
        wp_enqueue_style('logouploadstyle', PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_script('logouploadscript', PLUGIN_URL.'assets/js/script.js');
    }

    function wp_enqueue(){
        wp_enqueue_style('logouploadpagestyle', PLUGIN_URL.'assets/css/site.css');
    }
}