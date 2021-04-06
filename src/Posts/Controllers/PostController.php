<?php

namespace Basic\Posts\Controllers;

class PostController
{
    public function __construct()
    {
        add_shortcode('quan_render_portfio', [$this, 'renderPortfolio']);
        add_shortcode('quan_render_portfio_item', [$this, 'renderPortfolioItem']);
    }

    public static function renderPortfolioItem(\WP_Post $post, $aAtts = [])
    {
        $aAtts = wp_parse_args($aAtts, []);

?>
        <h6><?php echo esc_attr($post->post_title) ?></h6>
        <p><?php echo date_i18n(esc_attr($post->post_format), strtotime(esc_attr($post->post_date))); ?></p>
        <p><?php echo esc_attr($post->post_content) ?></p>
        <?php
    }

    public static function renderPost($aAtts = [])
    {
        $aAtts = wp_parse_args(
            $aAtts,
            [
                'items_per_row' => 3,
                'number_of_row' => 4,
                'inner_classes' => 'photobox__previewbox',
                'image_size' => 'medium'
            ],
        );
        // echo "<pre>";
        // var_dump($aAtts);
        // echo "</pre>";
        // die;
        switch ($aAtts['items_per_row']) {
            case '':
                if ($aAtts['items_per_row'] == 3) {
                    $classes = 'col-12 col-lg-4 blog-box';
                } else if ($aAtts['items_per_row'] == 4) {
                    $classes = 'col-12 col-lg-3 blog-box ';
                } else {
                    $classes = 'col-12 col-lg-6 wor blog-box';
                }
                break;

            case 'value':
                if ($aAtts['items_per_row'] == 3) {
                    $classes = 'col-12 col-lg-4 blog-box first-blog';
                } else if ($aAtts['items_per_row'] == 4) {
                    $classes = 'col-12 col-lg-3 blog-box  first-blog';
                } else {
                    $classes = 'col-12 col-lg-6 wor blog-box first-blog';
                }
                break;
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
                    <?php echo self::renderPortfolioItem($query->post, $aAtts); ?>
                </div>
<?php
            }
        }

        $html = ob_get_contents();
        ob_end_clean();

        wp_reset_postdata();
        return $html;
    }
}
