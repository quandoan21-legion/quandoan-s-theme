<?php

namespace Src\Shared\Controllers;

use Portfolios\Controllers\PortfolioController as PortfolioController;
use Posts\Controllers\PostController as PostController;

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
                    'post_type'       => 'post',
                    'container_class' => 'PostGrid',
                    'output_class'    => 'RenderPosts',
                ],
            );
        (new SharedController())
            ->setArgs($aArgs)
            ->renderContainerTagClass($aArgs['container_class'])
            ->output($aArgs['output_class']);
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

    public function outputLayout($output)
    {
        switch ($output) {
            case 'RenderPortfolios':
                $controller = new PortfolioController;
                return $controller;
                break;

            case 'RenderPosts':
                $controller = new PostController;
                return $controller;
                break;

            default:
                # code...
                break;
        }
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
        $typeOfPost = $this->aArgs['container_class'];
        switch ($this->aArgs['container_class']) {
            case 'PostGrid':
                switch ($typeOfPost) {
                    case 'important':
                        $this->containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                        break;

                    default:
                        $this->containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                        break;
                }
                return $this;
                break;

            case 'PortfolioGrid':
                $this->containerClasses = "col-12 col-lg-" . $itemsPerRow . " work-box1";
                return $this;
                break;

            default:
                $this->containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;
        }

        return $this;
    }

    public function output()
    {
        $this->oQuery = new \WP_Query([
            'post_type'      => $this->aArgs['post_type'],
            'posts_per_page' => $this->itemsPerRow * $this->aArgs['number_of_row'],
            'post_status'    => $this->aArgs['post_status']
        ]);
        $aNeededVal = [
            'wrapper_classes' => $this->aArgs['wrapper_classes'],
            'inner_classes'   => $this->aArgs['inner_classes'],
            'default_img'     => $this->aArgs['default_img'],
            'image_size'      => $this->aArgs['image_size'],

        ];

        $controller = $this->outputLayout($this->aArgs['output_class']);
        ob_start();
        if ($this->oQuery->have_posts()) :
            while ($this->oQuery->have_posts()) :
                $this->oQuery->the_post(); ?>
                <div class="<?php echo esc_attr($this->containerClasses); ?>">
                    <?php $controller->renderHtml(get_post(), $aNeededVal) ?>
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
