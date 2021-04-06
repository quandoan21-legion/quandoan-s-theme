<?php


// SET UP - DEFINE
define('THEME_URI', get_theme_file_uri());
define('THEME_PATH', get_theme_file_path());
// INCLUDES
include('includes/enqueue.php');
include('includes/custom_setting.php');
include('includes/custom_post_type.php');
include('src/Controllers/MenuController.php');


// HOOK ACTION -FILTER
add_action('wp_enqueue_scripts', 'qd_enqueue');
add_action('init', 'quandoan_nav_menu');



/**
 * SHORT CODE
 */


add_shortcode('quan_render_info', 'quanRenderInfo');
function quanRenderInfo($aAtts)
{
    $aAtts = shortcode_atts([
        'post_type'        => '',
        'date_format'      => '',
        'heading'          => '',
        'toggle_view_more' => 'enable',
    ], $aAtts);

    $aArgs = [
        'post_type'   => $aAtts['post_type'],
        'date_format' => $aAtts['date_format'],
        'post_status' => 'publish'
    ];
    $query = new WP_Query($aArgs);
    $callback_func = 'quanRender' . ucfirst($aArgs['post_type']);
    call_user_func($callback_func, $query);
    wp_reset_postdata();
}

add_shortcode('quan_render_portfolios', 'quanRenderPortfolios');
function  quanRenderPortfolios($query)
{
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
}




add_shortcode('quan_render_post', 'quanRenderPost');
function quanRenderPost($query)
{
    if ($query->have_posts()) :
        $post  = -1;
        while ($query->have_posts()) :
            $query->the_post();
            $posts = $query->posts;
            $post  += 1;
        ?>
            <div class="col-12 col-lg-4 blog-box">
                <h6><?php echo $posts[$post]->post_title ?></h6>
                <p><?php echo date_i18n($query->query['date_format'], strtotime($posts[$post]->post_date)); ?></p>
                <p><?php echo $posts[$post]->post_content ?></p>
            </div>
    <?php
        endwhile;
    endif;
}


add_shortcode('quan_render_title', 'quanRenderTitle');
function quanRenderTitle($aAtts)
{
    $aAtts = shortcode_atts([
        'subtitle' => '',
        'title'    => '',
    ], $aAtts);
    $subtitle = strtoupper($aAtts['subtitle']);
    $title = $aAtts['title'];
    ?>
    <h5>
        <?php echo $subtitle; ?>
    </h5>
    <h2>
        <?php echo $title; ?>
    </h2>
<?php
}
