<?php

namespace SharedController\TextWithPostsLayout\Controller;

use Src\Shared\Controllers\ILayout as ILayout;
use WP_Post;

class TextWithPostsLayout implements ILayout
{
    public function renderLayout(WP_Post $post, array $aAtts)
    {
        global $loop_count;
        $imgUrl           = get_the_post_thumbnail_url($post->ID);
        $containerClasses = "col-12 col-sm-3 col-lg-" . $aAtts['item_size'];
        if (strlen($imgUrl) == 0) {
            $imgUrl = $aAtts['default_img'];
        }
        if ($loop_count < $aAtts['loop_time']) :
            ?>

            <div class="col-12 col-sm-6 col-lg-<?php echo $containerClasses ?>">
                <div class="<?php echo esc_attr($aAtts['wrapper_classes']) ?>">
                    <img class="service_img" src="<?php echo esc_url($imgUrl) ?>" alt="">
                    <h3><?php echo get_the_title() ?></h3>
                    <p><?php echo get_the_content() ?></p>
                </div>
            </div>

        <?php
        endif;
        $loop_count++;
    }
}
