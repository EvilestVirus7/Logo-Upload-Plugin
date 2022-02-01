<?php

/**
 * @package LogoUpload
 */

namespace Inc\Pages;

class Admin
{

    public function register()
    {
        add_action('admin_menu', array($this, 'check_params'));
    }



    public function check_params()
    {
        if (isset($_GET['logo'])) {
            $param = $_GET['logo'];
        }

        if (isset($param) && $param == 'true') {
            $this->add_token_session();
        }
    }
    public function add_token_session()
    {
        $cookie_name = "logo_upload";
        $cookie_value = "true";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 31), "/");
        global $wp;
        $url =  home_url($wp->request) . '/wp-admin';
        wp_redirect($url);
    }
}