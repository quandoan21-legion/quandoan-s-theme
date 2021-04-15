<?php

namespace Posts\Controllers;

use Src\Scripts\CustomFilterHooks;

class PostController
{
    protected static $oPost;
    public function __construct()
    {
        add_shortcode('quan_render_post_items', [$this, 'renderPostItems']);
        add_shortcode('quan_render_post_item', [$this, 'renderPostItem']);
    }

    public function renderPostItem(array $aAtts)
    {
        $oFilterHook = new CustomFilterHooks;
        $aAtts = shortcode_atts(
            [
                'wanted_strlen' => '',
                'end'           => '',
                'date_format'   => '',   
                'post_title'    => self::$oPost->post_title,
                'post_date'     => self::$oPost->post_date,
                'post_content'  => self::$oPost->post_content,
            ],
            $aAtts,
        );
?>
        <h6><?php echo $aAtts['post_title'] ?></h6>
        <p><?php echo $oFilterHook->renderPostDate($aAtts['date_format'], $aAtts['post_date']) ?></p>
        <p><?php echo $oFilterHook->renderTrimmedContents($aAtts['post_content'], $aAtts) ?></p>
        <?php
    }

    public function renderPostItems($aAtts)
    {
        $aAtts = wp_parse_args(
            $aAtts,
            [
                'post_type'     => 'post',
                'wanted_strlen' => '60',
                'end'           => '...',
                'date_format'   => 'M d, Y',
                'items_per_row' => 3,
                'number_of_row' => 1,
                'inner_classes' => 'photobox__previewbox',
                'type_of_post'  => ''
            ],
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

        foreach ($oQuery->posts as $value) {
            self::$oPost = $value; ?>
            <div class="<?php echo esc_attr($classes); ?>">
                <?php $this->renderPostItem($aAtts); ?>
            </div>
<?php }

        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }
}
wp_reset_postdata();
