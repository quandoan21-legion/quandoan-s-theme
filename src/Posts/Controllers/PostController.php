<?php

namespace Posts\Controllers;

use Src\Shared\Controllers\IRenderItems;
use Src\Shared\Controllers\SharedController as SharedController;
use Src\Shared\Controllers\SharedLayout as SharedLayout;

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

        $oLayout = new SharedLayout;
        $oDisplay = $oLayout->getLayout($aAtts['layout']);

        $oItemsPerRow             = new SharedController();
        $itemsPerRow              = $oItemsPerRow->renderItemsPerRow($aAtts);
        (new SharedController())->output([
            'post_type'      => 'post',
            'posts_per_page' => $itemsPerRow * $aAtts['number_of_rows'],
        ], $oDisplay, $aAtts
        );
    }
}
