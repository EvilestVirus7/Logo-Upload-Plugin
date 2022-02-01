<link rel="stylesheet" href="<?= PLUGIN_URL . 'assets/css/site.css' ?>" />
<?php

$logos = get_posts(array('post_type' => 'lm-logo', 'numberposts' => -1));
foreach ($logos as $logo) {
    $images = get_post_meta($logo->ID, 'some_custom_gallery');
    foreach ($images as $image) {
?>
        <div class="container-logos">
            <h2><?= $logo->post_title ?></h2>

            <div class="collections-logos">
                <?php if (strrpos($image, ',')) {
                    $myArray = explode(',', $image);
                    foreach ($myArray as $sub_image) {
                        if ($sub_image != '') { ?>
                            <div class="image">
                                <img src="<?= wp_get_attachment_url($sub_image) ?>" />
                            </div>
                    <?php }
                    }
                } else {
                    print_r($image);
                    $image =  str_replace(',', '', $image); ?>

                    <div class="image">
                        <img src="<?= wp_get_attachment_url($image) ?>" />
                    </div>

                <?php
                } ?>
            </div>
        </div>
<?php
    }
}
