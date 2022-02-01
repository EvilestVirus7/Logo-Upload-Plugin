<?php

/**
 * @package LogoUpload
 */

namespace Inc\CPT\Metaboxes;


class Save
{
    public function register()
    {
        add_action('save_post', array($this, 'save_gallery'), 10, 3);
    }

    function save_gallery($post_id, $post, $update)
    {
        if ($update) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $post_id;

            $meta_key = 'some_custom_gallery';

            update_post_meta($post_id, $meta_key, $_POST[$meta_key]);
        }
        return $post_id;
    }
}