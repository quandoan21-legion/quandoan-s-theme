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

    public function output($aArgs, $oDisplay, $aAtts = [])
    {
        $this->oQuery = new WP_Query($aArgs);
        ob_start();
        if ($this->oQuery->have_posts()) :
            while ($this->oQuery->have_posts()) :
                $this->oQuery->the_post(); ?>
                <div class="<?php echo esc_attr($aAtts['layout']); ?>">
                    <?php $oDisplay->renderHtml($this->oQuery->post, $aAtts) ?>
                </div>
            <?php
            endwhile;
        endif;

        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
        wp_reset_postdata();
    }
}
