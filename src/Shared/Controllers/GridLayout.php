<?php

namespace Src\Shared\Controllers;

use WP_Post;

class GridLayout implements Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    : string
    {
        return "col-12 col-lg-" . $itemsPerRow . " work-box";
    }

    public function renderLayout(WP_Post $post, array $aAtts)
    {
        $imgUrl = get_the_post_thumbnail_url($post->ID);
        if (strlen($imgUrl) == 0) {
            $imgUrl = $aAtts['default_img'];
        } ?>
        <div class="<?php echo esc_attr($aAtts['wrapper_classes']); ?>">
            <div class="<?php echo esc_attr($aAtts['inner_classes']); ?>">
                <img class="photobox__preview attachment-<?php echo esc_attr($aAtts['image_size']) ?>"
                     src="<?php echo esc_url($imgUrl) ?>" alt="<?php echo get_the_title(); ?>">
                <span class="photobox__label"><?php echo get_the_title(); ?></span>
            </div>
        </div>
        <?php
    }
}
