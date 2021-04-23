<?php


namespace SharedController\ListLayout\Controller;

use Src\Shared\Controllers\SharedController;
use Src\Shared\Controllers\SharedLayout;
use Src\Shared\Controllers\IRenderItems;

class TextWithPostsController implements IRenderItems
{
    public function __construct()
    {
        add_shortcode('text_with_post_layout', [$this, 'renderContainerTagClasses']);
    }

    public function renderContainerTagClasses(array $aAtts = [])
    {
        global $aRedux_vars;
        $aAtts =
            shortcode_atts(
                [
                    'layout'                      => 'text_with_posts',
                    'image_size'                  => 'medium',
                    'date_format'                 => 'M d,Y',
                    'wanted_strlen'               => '60',
                    'end'                         => '...',
                    'wrapper_classes'             => 'service-box',
                    'inner_classes'               => '',
                    'items_per_row'               => '5',
                    'our_service_contact_btn_url' => '#',
                    'number_of_rows'              => '1',
                    'type_of_post'                => '',
                    'default_img'                 => 'http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png',
                ],
                $aAtts,
            );

        $oLayout  = new SharedLayout();
        $oDisplay = $oLayout->getLayout($aAtts['layout']);

        $oComponent = new SharedController();
        $aComponent = $oComponent->renderItemsPerRowWithComponent($aAtts);

        $aAtts = wp_parse_args($aComponent, $aAtts); ?>

        <div class="col-12 col-sm-12 col-lg-<?php echo $aAtts['item_size'] ?> service-txt">
            <h2><?php echo $aRedux_vars['our_service_title'] ?></h2>
            <div class="hero-btns service-btn">
                <a data-scroll="" href="<?php echo $aRedux_vars['our_service_contact_btn_url'] ?>">
                    <?php echo $aRedux_vars['our_service_contact_btn'] ?></a>
            </div>
        </div>
        <?php
        $postsPerPage = $aAtts['item_size'] * $aAtts['number_of_rows'];
        (new SharedController())->output([
            'post_type'      => 'ourservice',
            'posts_per_page' => $postsPerPage,
        ], $oDisplay, $aAtts
        );

    }
}