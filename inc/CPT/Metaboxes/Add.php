<?php

/**
 * @package LogoUpload
 */

namespace Inc\CPT\Metaboxes;

class Add
{
    function add_metaboxes()
    {
        add_meta_box(
            'gallery', // meta box ID
            'Image gallery', // meta box title
            array($this, 'print_gallery'), // callback function that prints the meta box HTML 
            'lm-logo', // post type where to add it
            'normal', // priority
            'high'
        );
    }

    function print_gallery($post)
    {
        $meta_key = 'some_custom_gallery';
        echo $this->gallery_field($meta_key, get_post_meta($post->ID, $meta_key, true));
    }

    function gallery_field($name, $value = '')
    {
        $html = '<script src="https://kit.fontawesome.com/20ac8b5730.js" crossorigin="anonymous"></script>';
        $html .= '<div class="gallery-container">';
        /* array with image IDs for hidden field */
        $hidden = array();


        if ($images = get_posts(array(
            'post_type' => 'attachment',
            'orderby' => 'post__in', /* we have to save the order */
            'order' => 'ASC',
            'post__in' => explode(',', $value), /* $value is the image IDs comma separated */
            'numberposts' => -1,
            'post_mime_type' => 'image'
        ))) {

            foreach ($images as $image) {
                $hidden[] = $image->ID;
                $image_src = wp_get_attachment_image_src($image->ID, array(80, 80));
                $html .= '<div data-id="' . $image->ID .  '" class="inner" style="background-image: url('. $image_src[0] .')"><a href="#" class="misha_gallery_remove">&times;</a></div>';
            }
        }

        $html .= '<div style="clear:both"></div></div>';
        $html .= '<input type="hidden" name="' . $name . '" value="' . join(',', $hidden) . '" /><a href="#" class="button misha_upload_gallery_button">Add Images</a>';

        return $html;
    }
}