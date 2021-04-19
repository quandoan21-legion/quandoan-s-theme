<?php

namespace Src\Shared\Controllers;

use Portfolios\Controllers\PortfolioController as PortfolioController;
use Posts\Controllers\PostController as PostController;
use Src\Shared\Controllers\GridLayout as GridLayout;

class SharedController
{
    /**
     * @var array
     */
    public ?array $aArgs = [];
    public $classes;
    public function __construct()
    {
        add_shortcode('sharedShortcode', [$this, 'sharedShortcode']);
    }
    public function sharedShortcode(array $aArgs = [])
    {
        $aArgs =
            wp_parse_args(
                $aArgs,
                [
                    'post_type'         => 'post',
                    'container_classes' => 'PostGrid',
                    'output_layout'     => 'RenderPosts',
                ],
            );
        (new SharedController())
            ->setArgs($aArgs)
            ->renderContainerTagClass($aArgs['container_class'])
            ->output($aArgs['output_layout'], $aArgs['type_of_post']);
    }

    public function setArgs(array $aArgs)
    {
        $this->aArgs =
            wp_parse_args(
                $aArgs,
                [
                    'post_type'       => '',
                    'type_of_post'    => '',
                    'wanted_strlen'   => '60',
                    'end'             => '...',
                    'date_format'     => 'M d, Y',
                    'items_per_row'   => 3,
                    'number_of_row'   => 4,
                    'default_img'     => 'http://wordpresstest.io/wp-content/uploads/2021/04/screenshot-copy-1.png',
                    'wrapper_classes' => 'photobox photobox_type10',
                    'inner_classes'   => 'photobox__previewbox',
                    'image_size'      => 'medium',
                    'post_status'     => 'publish'
                ],
            );
        return $this;
    }

    public function renderContainerTagClass()
    {
        if (
            is_numeric($this->aArgs['items_per_row']) == true &&
            (12 % $this->aArgs['items_per_row']) == 0 &&
            $this->aArgs['items_per_row'] != 0
        ) {
            $itemsPerRow = 12 / $this->aArgs['items_per_row'];
        } else {
            $itemsPerRow = 4;
        }
        return $itemsPerRow;
    }

    public function output($aArgs, $oOutput, $aAtts = [])
    {
        $this->oQuery = new \WP_Query($aArgs);

        var_dump($this->oQuery);die;
        $aAtts = wp_parse_args(
            $aAtts,
            $this->aAtts
        );

        ob_start();
        if ($this->oQuery->have_posts()) :
            while ($this->oQuery->have_posts()) :
                $this->oQuery->the_post(); ?>
                <div class="<?php echo esc_attr($oOutput); ?>">
                    <?php $oOutput->renderHtml($this->oQuery->post, $aAtts) ?>
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
