<?php
namespace Src;
use Portfolios\Controllers\PortfolioController as PortfolioController; 
use Posts\Controllers\PostController as PostController; 
class MainController
{
    public static function renderInfo(array $aAtts)
    {
        $aAtts = wp_parse_args(
            $aAtts,
            [
                'post_type'     => '',
            ]
        );
        switch ($aAtts['post_type']) {
            case 'portfolios':
                $oHtml =  new PortfolioController;
                $oHtml->renderPortfolioItems($aAtts);
                break;
            case 'post':
                $oHtml =  new PostController;
                $oHtml->renderPostItems($aAtts);
                break;
        }
    }

    public static function quanRenderTitle(array $aAtts){
        $aAtts = shortcode_atts([
            'title'    => '',
            'subtitle' => '',
        ],$aAtts);
        ?>
            <h5>
                <?php
                echo strtoupper(esc_attr($aAtts['subtitle'])); 
                ?>
            </h5>
            <h2>
                <?php
                echo esc_attr($aAtts['title']); 
                ?>
            </h2>
        <?php
    }
}
