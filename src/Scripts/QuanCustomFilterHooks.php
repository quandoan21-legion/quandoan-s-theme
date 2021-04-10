<?php
class customFilterHooks
{
    public function __construct()
    {
        add_filter('the_title', [$this, 'getTitle'], 10, 2);
        add_filter('getDate', [$this, 'getDate'], 10, 2);
        add_filter('modifyContent', [$this, 'Content'], 10, 2);
        add_filter('getImgUrl', [$this, 'getImgUrl'], 10, 2);
        add_filter('checkItemsPerRow', [$this, 'checkItemsPerRow'], 10, 2);
    }

    public function getDate(string $date, array $post)
    {
        $date =  date_i18n($post['date_format'], strtotime(esc_attr($post['post']->post_date)));
        return $date;
    }

    function checkItemsPerRow($var)
    {
        $itemsPerRow  =  '';
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
