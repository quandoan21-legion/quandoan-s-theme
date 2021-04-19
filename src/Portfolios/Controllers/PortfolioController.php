<?php

namespace Portfolios\Controllers;

use Src\Shared\Controllers\SharedController as SharedController;
use Posts\Controllers\PostController as PostController;
use Src\Shared\Controllers\GridLayout as GridLayout;
use Src\Shared\Controllers\ListLayout as ListLayout;
use Src\Shared\Controllers\IRenderItems;

class PortfolioController implements IRenderItems
{
    public function __construct()
    {
        add_shortcode('portfolio', [$this, 'renderContainerTagClasses']);
    }

    public function renderContainerTagClasses(array $aAtts = [])
    {

        $aAtts        =
            shortcode_atts(
                [
                    'layout'          => 'list',
                    'display'         => 'portfolio',
                    'image_size'      => 'medium',
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
            'post_type'      => 'portfolios',
            'posts_per_page' => $itemsPerRow * $aAtts['number_of_rows'],
        ], $oDisplay, $aAtts
        );
    }

    public function renderHtml(\WP_Post $post, $aAtts)
    {
        $imgUrl = get_the_post_thumbnail_url($post->ID);
        if (strlen($imgUrl) == 0) {
            $imgUrl = $aAtts['default_img'];
        } ?>
        <div class="<?php echo esc_attr($aAtts['wrapper_classes']); ?>">
            <div class="<?php echo esc_attr($aAtts['inner_classes']); ?>">
                <img class="attachment-<?php echo esc_attr($aAtts['image_size']) ?>"
                     src="<?php echo esc_url($imgUrl) ?>" alt="<?php echo get_the_title(); ?>">
                <span class="photobox__label"><?php echo get_the_title(); ?></span>
            </div>
        </div>
        <?php
    }
}
