<?php
namespace Src\Scripts;
class CustomFilterHooks
{
    function __construct()
    {
        add_filter('getDate', [$this, 'getDate'], 10, 2);
        add_filter('checkItemsPerRow', [$this, 'checkItemsPerRow'], 10, 2);
    }

    function renderPostDate(object $oPost, array $aAtts)
    {
        $date = '';
        $date =  date_i18n($aAtts['date_format'], strtotime(esc_attr($oPost->post_date)));
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

    public function renderTrimmedContents(object $oPost, array $aAgrs)
    {
        if ($aAgrs['wanted_strlen'] < 30 || $aAgrs['wanted_strlen'] > 100) {
            $wanted_strlen   =  30;
        } else {
            $wanted_strlen   =  $aAgrs['wanted_strlen'];
        }
        $myContent = '';
        $oPost      = $aAgrs['post'];
        $myContent = apply_filters('the_content', get_the_content(esc_attr($oPost->post_content)));
        $myContent = wp_strip_all_tags($myContent);
        if (strlen($myContent) > $wanted_strlen) {
            $trimVal         = $wanted_strlen - strlen($myContent);
            $myContent       = substr($myContent, 0, $trimVal);
            $myContent      .= $aAgrs['end'];
            return $myContent;
        } else {
            return $myContent;
        }
    }
}
