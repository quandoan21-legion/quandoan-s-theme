<?php

add_filter('get_date', 'get_date');
function get_date(array $aAgrs)
{
    $post = $aAgrs['post'];
    $date = date_i18n($aAgrs['date_format'], strtotime(esc_attr($post->post_date)));
    return $date;
}

/**
 * @param $aAgrs
 * Trim post content with $aAgrs['wanted_strlen']  
 */
add_filter('trim_content', 'trim_content');
function trim_content(array $aAgrs)
{
    if ($aAgrs['wanted_strlen'] < 30) {
        $wanted_strlen = 30;
    } else {
        $wanted_strlen = $aAgrs['wanted_strlen'];
    }

    $post       = $aAgrs['post'];
    $my_content = apply_filters('the_content', get_the_content(esc_attr($post->post_content)));
    $my_content = wp_strip_all_tags($my_content);
    if (strlen($my_content) > $wanted_strlen) {
        $trimVal      = $wanted_strlen - strlen($my_content);
        $my_content   = substr($my_content, 0, $trimVal);
        $my_content  .= $aAgrs['end'];
        return $my_content;
    } else {
        return $my_content;
    }
}


/**
 * @param $aAgrs
 * get post title
 */
add_filter('get_title', 'get_title');
function get_title(array $aAgrs)
{
    $post  = $aAgrs['post'];
    $title = esc_attr($post->post_title);
    return $title;
}


/**
 * @param $aAgrs
 * get thumbnail img url 
 */
add_filter('get_img_url', 'get_img_url');
function get_img_url(array $aAgrs)
{
    $img_url = esc_url(get_the_post_thumbnail_url($aAgrs['post_id']));
    return $img_url;
}
/**
 * @param $aAgrs
 * calculate items per row
 */

add_filter('check_items_per_row', 'check_items_per_row');
function check_items_per_row($var)
{
    static $itemsPerRow = null;
    if (
        is_numeric($var) == true &&
        (12 % $var) == 0 &&
        $var != 0
    ) {
        $itemsPerRow = 12 / $var;
    } else {
        $itemsPerRow = 4;
    }
    return $itemsPerRow;
}