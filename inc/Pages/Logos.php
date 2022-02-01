<?php

/**
 * @package LogoUpload
 */

namespace Inc\Pages;

class Logos
{
    public function register()
    {
        add_action('init',  array($this, 'create_route'));
        add_filter('query_vars', array($this, 'create_vars'));
        add_action('template_include', array($this, 'add_template'));
    }

    public function add_template($template)
    {   
        
        $pagename = get_query_var('pagename');

        if ($pagename == 'logos') {
            return $this->get_locations();
        }
        return $template;
        
    }

    public function create_vars($query_vars)
    {
        $query_vars[] = 'logos2';
        return $query_vars;
    }

    public function create_route()
    {
        add_rewrite_rule('logos2/', 'index.php?logos2=$matches[1]', 'top');
    }

    public function get_locations()
    {
        require_once PLUGIN_PATH . 'templates/logos-index.php';
    }
}