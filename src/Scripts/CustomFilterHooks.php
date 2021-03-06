<?php

namespace Src\Scripts;

class CustomFilterHooks
{
    public ?string $date;

    function __construct()
    {
        add_filter('renderPostDate', [$this, 'renderPostDate'], 10, 2);
        add_filter('checkItemsPerRow', [$this, 'checkItemsPerRow'], 10, 1);
        add_filter('renderTrimmedContents', [$this, 'renderTrimmedContents'], 10, 3);
    }

    function renderPostDate(string $postDate, string $dateFormat)
    : string
    {
        $date =  date_i18n($dateFormat, strtotime(esc_attr($postDate)));
        return $date;
    }

    function checkItemsPerRow($var)
    {
        if (
            is_numeric($var) == true &&
            (12 % $var)      == 0 &&
            $var != 0
        ) {
            $itemsPerRow = 12 / $var;
        } else {
            $itemsPerRow = 4;
        }
        return $itemsPerRow;
    }

    public function renderTrimmedContents(string $post_content, string $wantedStrlen, string $end)
    : string
    {
        if ($wantedStrlen < 30 || $wantedStrlen > 100) {
            $wanted_strlen   =  30;
        } else {
            $wanted_strlen   =  $wantedStrlen;
        }
        $myContent = $post_content;
        $myContent = wp_strip_all_tags($myContent);
        if (strlen($myContent) > $wanted_strlen) {
            $trimVal         = $wanted_strlen - strlen($myContent);
            $myContent       = substr($myContent, 0, $trimVal);
            $myContent      .= $end;
            return $myContent;
        } else {
            return $myContent;
        }
    }
}
