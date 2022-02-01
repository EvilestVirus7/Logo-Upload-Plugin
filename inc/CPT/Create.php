<?php

/**
 * @package LogoUpload
 */

namespace Inc\CPT;

use Inc\CPT\Metaboxes\Add;

class Create
{
    public function register(){
        add_action('init', array($this, 'logos_post_type'));
    }

    public function logos_post_type()
    {
        if(isset($_COOKIE['logo_upload'])&&$_COOKIE["logo_upload"] == true){
        $labels = array(
            'name'               => __('Logo Upload'),
            'add_new'            => __('Add new Collection'),
            'add_new_item'       => __('Add new Collection'),
            'edit_item'          => __('Edit Collection'),
            'new_item'           => __('Add new Collection'),
            'view_item'          => __('View Collection'),
            'search_items'       => __('Search Collection'),
            'not_found'          => __('No collections found'),
            'not_found_in_trash' => __('No collections found in trash')
        );

        $supports = array(
            'title',
        );

        $args = array(
            'labels'               => $labels,
            'supports'             => $supports,
            'public'               => true,
            'capability_type'      => 'post',
            'rewrite'              => array('slug' => 'lm-logo'),
            'has_archive'          => true,
            'menu_position'        => 30,
            'menu_icon'            => 'dashicons-cloud-upload',
            'register_meta_box_cb' => array(new Add, 'add_metaboxes'),
        );

        register_post_type('lm-logo', $args);}
    }
}