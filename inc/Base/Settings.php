<?php

/**
 * @package LogoUpload
 */

namespace Inc\Base;

class Settings
{
    public function register()
    {
        add_filter('plugin_action_links_'.PLUGIN_NAME, array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=logo-upload">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}