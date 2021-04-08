<?php

class mainController
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
                $html =  new PortfolioController;
                $html->renderPortfolioItems($aAtts);
                break;
            case 'post':
                $html =  new PostController;
                $html->renderPostItems($aAtts);
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
                echo esc_attr($aAtts['subtitle']); 
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
