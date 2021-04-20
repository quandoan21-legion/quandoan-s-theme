<?php

namespace Posts\Controllers;

use Src\Shared\Controllers\IRenderItems;
use Src\Shared\Controllers\SharedController as SharedController;
use Portfolios\Controllers\PortfolioController as PortfolioController;
use Src\Shared\Controllers\GridLayout as GridLayout;
use Src\Shared\Controllers\ListLayout as ListLayout;
use WP_Post;

class PostController implements IRenderItems
{
    public function __construct()
    {
        add_shortcode('post', [$this, 'renderContainerTagClasses']);
    }

    public function renderContainerTagClasses(array $aAtts = [])
    {
        $aAtts =
            shortcode_atts(
                [
                    'layout'          => 'list',
                    'display'         => 'posts',
                    'image_size'      => 'medium',
                    'date_format'     => 'M d,Y',
                    'wanted_strlen'   => '60',
                    'end'             => '...',
                    'wrapper_classes' => 'photobox photobox_type10',
                    'inner_classes'   => 'photobox__previewbox',
                    'items_per_row'   => '4',
                    'number_of_rows'  => '4',
                    'type_of_post'    => '',
                    'default_img'     => 'http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png',
                ],
                $aAtts,
            );

        if ($aAtts['display'] == 'portfolio') {
            $oDisplay = new PortfolioController();
        } else {
            $oDisplay = new PostController();
        }
        $oItemsPerRow = new SharedController();
        $itemsPerRow  = $oItemsPerRow->renderItemsPerRow($aAtts);
        if ($aAtts['layout'] == 'grid') {
            $oOutput = new GridLayout();
        } else {
            $oOutput = new ListLayout();
        }
        $aAtts['layout'] = $oOutput->renderContainerClass($itemsPerRow, $aAtts['type_of_post']);
        (new SharedController())->output([
            'post_type'      => 'post',
            'posts_per_page' => $itemsPerRow * $aAtts['number_of_rows'],
        ], $oDisplay, $aAtts
        );
    }

    public function renderHtml(WP_Post $post, $aAtts)
    {?>
        <h6><?php echo get_the_title() ?></h6>
        <p><?php echo apply_filters('renderPostDate', get_the_date(), $aAtts['date_format']) ?></p>
        <p><?php echo apply_filters('renderTrimmedContents', get_the_content(), $aAtts['wanted_strlen'], $aAtts['end'],) ?></p>
        <?php
    }
}
