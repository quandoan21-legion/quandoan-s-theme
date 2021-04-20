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

        switch ($aAtts['layout']) {
            case 'grid':
                $oDisplay = new GridLayout();
                break;

            case 'list':
                $oDisplay = new ListLayout();
                break;
        }

        $oItemsPerRow = new SharedController();
        $itemsPerRow  = $oItemsPerRow->renderItemsPerRow($aAtts);
        $aAtts['container_class'] = $oDisplay->renderContainerClass($itemsPerRow, $aAtts['type_of_post']);
        (new SharedController())->output([
            'post_type'      => 'post',
            'posts_per_page' => $itemsPerRow * $aAtts['number_of_rows'],
        ], $oDisplay, $aAtts
        );
    }
}
