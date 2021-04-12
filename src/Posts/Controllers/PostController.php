<?php

namespace Posts\Controllers;

use Src\Scripts\CustomFilterHooks;

class PostController
{
    public function __construct()
    {
        add_shortcode('quan_render_post_items', [$this, 'renderPostItems']);
        add_shortcode('quan_render_post_item', [$this, 'renderPostItem']);
    }

    public function renderPostItem(\WP_Post $oPost, array $aAtts)
    {
        $oFilterHook = new CustomFilterHooks;
        $aAtts = wp_parse_args($aAtts, [
            'post' => $oPost,
        ]);
?>
        <h6><?php echo $oPost->post_title ?></h6>
        <p><?php echo $oFilterHook->renderPostDate($oPost, $aAtts) ?></p>
        <p><?php echo $oFilterHook->renderTrimmedContents($oPost, $aAtts) ?></p>
        <?php
    }

    public function renderPostItems(array $aAtts = [])
    {
        $oPost = new PostController;
        $aAtts = shortcode_atts(
            [
                'post_type'     => 'post',
                'items_per_row' => 3,
                'number_of_row' => 4,
                'date_format'   => 'M d, Y',
                'inner_classes' => 'photobox__previewbox',
                'wanted_strlen' => '60',
                'end'           => '...',
                'type_of_post'  => ''
            ],
            $aAtts
        );

        $itemsPerRow = apply_filters('checkItemsPerRow', $aAtts['items_per_row']);

        switch ($aAtts['type_of_post']) {
            case 'important':
                $classes = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                break;

            default:
                $classes = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;
        }
        
        $oQuery = new \WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => $itemsPerRow * $aAtts['number_of_row'],
            'post_status'    => 'publish'
        ]);
        $html = '';
        ob_start();

        if ($oQuery->have_posts()) {
            while ($oQuery->have_posts()) {
                $oQuery->the_post();
        ?>
                <div class="<?php echo esc_attr($classes); ?>">
                    <?php $oPost->renderPostItem($oQuery->post, $aAtts); ?>
                </div>
<?php
            }
        }

        $html = ob_get_contents();
        ob_end_clean();
        wp_reset_postdata();
        echo $html;
    }
}
