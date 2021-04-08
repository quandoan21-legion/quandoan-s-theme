<?php
// add_action('admin_init', 'register_settings');
// function register_settings()
// {
//     //đăng ký các fields settings
//     register_setting('my-settings-group', 'phone');
//     register_setting('my-settings-group', 'company_address');
// }
add_action('after_setup_theme', 'quantheme_after_theme_setup');
function quantheme_after_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menus(
        array(
            'main-nav' => 'Menu chính'
        )
    );
}
add_action('trim_content', 'trim_content');
function trim_content($aAgrs){
    $post       = $aAgrs['post'];
    $my_content = apply_filters('the_content', get_the_content(esc_attr($post->post_content)));
    $my_content = wp_strip_all_tags($my_content);
    if (strlen($my_content) > $aAgrs['wanted_strlen']) {
        $trimVal      = $aAgrs['wanted_strlen'] - strlen($my_content);
        $my_content   = substr($my_content, 0, $trimVal);
        $my_content  .= $aAgrs['end'];
        echo $my_content;
    } 
    else {
        echo $my_content;
    }
}

add_action ('get_date', 'get_date');
function get_date($aAgrs){
    $post       = $aAgrs['post'];
    $date = date_i18n($aAgrs['date_format'], strtotime(esc_attr($post->post_date)));
    echo $date;
}

add_action ('get_title', 'get_title');
function get_title($aAgrs){
    $post       = $aAgrs['post'];
    $title = esc_attr($post->post_title);
    echo $title;
}

add_action ('get_img_url' , 'get_img_url');
function get_img_url($aAgrs){
    $img_url = esc_url(get_the_post_thumbnail_url($aAgrs['post_id']));
    echo $img_url;

}