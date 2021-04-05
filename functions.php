<?php


// SET UP - DEFINE
define('THEME_URI', get_theme_file_uri());
define('THEME_PATH', get_theme_file_path());
// INCLUDES
include('includes/enqueue.php');
include('includes/custom_post_type.php');
include('src/Controllers/MenuController.php');


// HOOK ACTION -FILTER
add_action('wp_enqueue_scripts', 'qd_enqueue');
add_action('init', 'quandoan_nav_menu');



/**
 * SHORT CODE
 */

add_shortcode('quan_render_portfolio', 'quanRenderPortfolio');
function  quanRenderPortfolio($aAtts)
{
    $aAtts = shortcode_atts([
        'items_per_row'    => 3,
        'number_of_rows'   => 2,
        'heading'          => '',
        'toggle_view_more' =>  'enable',
    ], $aAtts);

    $aArgs = [
        'post_type' => 'portfolios',
        'posts_per_page' => $aAtts['number_of_rows'] * $aAtts['items_per_row'],
        'post_status' => 'publish'
    ];

    $query = new WP_Query($aArgs);
    if ($query->have_posts()) :
        $post  = -1;
        while ($query->have_posts()) :
            $query->the_post();
            $posts = $query->posts;
            $post  += 1;
?>
            <div class="col-12 col-lg-4 work-box">
                <div class="photobox photobox_type10">
                    <div class="photobox__previewbox">
                        <!-- Replace Patch to Image Under -->
                        <img src="images/4.png" class="photobox__preview" alt="Preview">
                        <!-- Replace Image Title Under -->
                        <span class="photobox__label"><?php echo $posts[$post]->post_title ?></span>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
}




add_shortcode('quan_render_news', 'quanRenderNews');
function quanRenderNews($aAtts)
{
    $aAtts = shortcode_atts([
        'items_per_row'    => 3,
        'number_of_rows'   => 2,
        'heading'          => '',
        'toggle_view_more' =>  'enable',
    ], $aAtts);

    $aArgs = [
        'post_type'      => 'post',
        'posts_per_page' => $aAtts['number_of_rows'] * $aAtts['items_per_row'],
        'post_status'    => 'publish'
    ];
    $query = new WP_Query($aArgs);
    if ($query->have_posts()) :
        $post  = -1;
        while ($query->have_posts()) :
            $query->the_post();
            $posts = $query->posts;
            $post  += 1;
        ?>
            <div class="col-12 col-lg-4 blog-box">
                <h6><?php echo $posts[$post]->post_title ?></h6>
                <p><?php  ?></p>
                <p>Vestibulum ac diam sit amet quam vehicula elementum amet est on dui. Nulla porttitor accumsan tincidunt.</p>
            </div>
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
}


add_shortcode('our_service', function ($aAtts, $content = null) {
    $aAtts = shortcode_atts([
        [
            'icon' => '',
            'heading' => '',
            'desc' => ''
        ]
    ], $aAtts);

    ?>
    <div>
        <div class="col-12 col-sm-12 col-lg-4 service-txt">
            <h2>Anything you need,we’ve got you covered</h2>
            <div class="hero-btns service-btn">
                <a data-scroll="" href="#contact-us">Get in Touch</a>
            </div>
        </div>
        <?php
        if (!empty($content)) {
            echo do_shortcode($content);
        } ?>
    </div>
<?php
});

add_action('quan-s_theme/footer/before-footer', function () {
    echo 2;
}, 10);



add_action('quan-s_theme/footer/before-footer', function () {
    echo 1;
}, 1);


add_filter('quan-s_theme/filter/footer/social-networks', function ($aSocialNetworks, $number) {
    $aSocialNetworks['zalo'] = '#';
    unset($aSocialNetworks['facebook']);
    return $aSocialNetworks;
}, 10, 2);


add_filter('quan-s_theme/filter/footer/social-networks', function ($aSocialNetworks, $number) {
    $aSocialNetworks['twiitter'] = '#';
    return $aSocialNetworks;
}, 1, 2);
