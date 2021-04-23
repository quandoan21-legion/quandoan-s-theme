<?php

namespace Src\Shared\Controllers;

use WP_Query;

class SharedController
{
    public ?array $aArgs = [];

    public function __construct()
    {
        add_shortcode('sharedShortcode', [$this, 'sharedShortcode']);
    }

    public function renderItemsPerRow(array $aArgs)
    : int
    {
        if (
            is_numeric($aArgs['items_per_row']) == true &&
            (12 % $aArgs['items_per_row']) == 0 &&
            $aArgs['items_per_row'] != 0
        ) {
            $itemsPerRow = 12 / $aArgs['items_per_row'];
        } else {
            $itemsPerRow = 4;
        }
        return $itemsPerRow;
    }

    public function renderItemsPerRowWithComponent(array $aArgs)
    : array
    {
        $itemsPerRow = $aArgs['items_per_row'];
        if ((12 % $itemsPerRow) == 0 && $itemsPerRow <= 6 ) {
            $itemsPerRow = $aArgs['items_per_row'];
        } else {
            $itemsPerRow = 3;
        }
        $itemSize = 12 / $itemsPerRow;
        $loopTime = (12 - $itemSize) / $itemSize;
        return $aArgs = [
            'item_size' => $itemSize,
            'loop_time' => $loopTime,
        ];
    }

    public function output($aArgs, $oDisplay, $aAtts = [])
    {
        $this->oQuery = new WP_Query($aArgs);
        ob_start();

        if ($this->oQuery->have_posts()) :
            $loop_count = 0;
            while ($this->oQuery->have_posts()) :

                $this->oQuery->the_post();
                $oDisplay->renderLayout($this->oQuery->post, $aAtts);

            endwhile;

        endif;

        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
        wp_reset_postdata();
    }
}
