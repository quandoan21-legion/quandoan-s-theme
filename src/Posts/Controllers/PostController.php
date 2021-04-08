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
            'post'          => $post,
        ]);
?>
        <h6><?php do_action('get_title', $aAtts) ?></h6>
        <p><?php do_action('get_date', $aAtts) ?></p>
        <p><?php do_action('trim_content', $aAtts)?></p>
        <?php
    }

    public function renderPostItems($aAtts = [])
    {
        $post = new PostController;
        $aAtts = wp_parse_args(
            $aAtts,
            [
                'items_per_row' => 3,
                'number_of_row' => 4,
                'date_format'   => 'M d, Y',
                'inner_classes' => 'photobox__previewbox',
                'image_size'    => 'medium',
                'wanted_strlen' => '60',
                'end'           => '...',
                'type_of_post'  => ''
            ],
        );
        switch ($aAtts['type_of_post']) {
            case '':
                if ($aAtts['items_per_row'] == 3) {
                    $classes = 'col-12 col-lg-4 blog-box';
                } else if ($aAtts['items_per_row'] == 4) {
                    $classes = 'col-12 col-lg-3 blog-box ';
                } else {
                    $classes = 'col-12 col-lg-6 wor blog-box';
                }
                break;

            case 'important':
                if ($aAtts['items_per_row'] == 3) {
                    $classes = 'col-12 col-lg-4 blog-box blog-first';
                } else if ($aAtts['items_per_row'] == 4) {
                    $classes = 'col-12 col-lg-3 blog-box  blog-first';
                } else {
                    $classes = 'col-12 col-lg-6 wor blog-box blog-first';
                }
                break;
        }
        $query = new \WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => $aAtts['items_per_row'] * $aAtts['number_of_row'],
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
