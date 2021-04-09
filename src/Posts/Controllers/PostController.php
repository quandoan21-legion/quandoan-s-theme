<?php

class PostController
{
    public function __construct()
    {
        add_shortcode('quan_render_post_items', [$this, 'renderPostItems']);
        add_shortcode('quan_render_post_item', [$this, 'renderPostItem']);
    }

    public function renderPostItem(\WP_Post $post, $aAtts = [])
    {
        $aAtts = wp_parse_args($aAtts, [
            'post' => $post,
        ]);

?>
        <h6><?php echo apply_filters('get_title', $aAtts) ?></h6>
        <p><?php echo apply_filters('get_date', $aAtts) ?></p>
        <p><?php echo apply_filters('trim_content', $aAtts) ?></p>
        <?php
    }

    public function renderPostItems(array $aAtts = [])
    {
        $post = new PostController;
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

        $itemsPerRow = apply_filters('check_items_per_row', $aAtts['items_per_row']);
        
        switch ($aAtts['type_of_post']) {
            case '':
                $classes = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;

            case 'important':
                $classes = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                break;
        }
        $query = new \WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => $itemsPerRow * $aAtts['number_of_row'],
            'post_status'    => 'publish'
        ]);
        $html = '';
        ob_start();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
        ?>
                <div class="<?php echo esc_attr($classes); ?>">
                    <?php $post->renderPostItem($query->post, $aAtts); ?>
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
