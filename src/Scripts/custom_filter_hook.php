<?php
class customFilterHooks
{
    public function hook_into_wordpress()
    {
        add_filter('get_title', [$this, 'get_title']);
        add_filter('get_date', [$this, 'get_date']);
        add_filter('trim_content', [$this, 'trim_content']);
        add_filter('get_img_url', [$this, 'get_img_url']);
        add_filter('check_items_per_row', [$this, 'check_items_per_row']);
    }

    public function get_date($aAgrs)
    {
        $post                =  $aAgrs['post'];
        $date                =  date_i18n($aAgrs['date_format'], strtotime(esc_attr($post->post_date)));
        return $date;
    }

    /**
     * @param $aAgrs
     * Trim post content with $aAgrs['wanted_strlen']  
     */
    function trim_content(array $aAgrs)
    {
        if ($aAgrs['wanted_strlen'] < 30) {
            $wanted_strlen   =  30;
        } else {
            $wanted_strlen   =  $aAgrs['wanted_strlen'];
        }

        $post                =  $aAgrs['post'];
        $my_content          =  apply_filters('the_content', get_the_content(esc_attr($post->post_content)));
        $my_content          =  wp_strip_all_tags($my_content);
        if (strlen($my_content) > $wanted_strlen) {
            $trimVal         =  $wanted_strlen - strlen($my_content);
            $my_content      =  substr($my_content, 0, $trimVal);
            $my_content     .=  $aAgrs['end'];
            return $my_content;
        } else {
            return $my_content;
        }
    }


    /**
     * @param $aAgrs
     * get post title
     */
    function get_title(array $aAgrs)
    {
        $post                =  $aAgrs['post'];
        $title               =  esc_attr($post->post_title);
        return $title;
    }


    /**
     * @param $aAgrs
     * get thumbnail img url 
     */
    function get_img_url($aAgrs)
    {
        $img_url             =  esc_url(get_the_post_thumbnail_url($aAgrs['post_id']));
        return $img_url;
    }
    /**
     * @param $aAgrs
     * calculate items per row
     */

    function check_items_per_row($var)
    {
        static $itemsPerRow  =  null;
        if (
            is_numeric($var) == true &&
            (12 % $var)      == 0 &&
            $var !=  0
        ) {
            $itemsPerRow     =  12 / $var;
        } else {
            $itemsPerRow     =  4;
        }
        return $itemsPerRow;
    }
}
$filterhook = new customFilterHooks;
$filterhook->hook_into_wordpress();