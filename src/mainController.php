<?php

use Basic\Portfolios\Controllers\PortfolioController as PortfolioController;
use Basic\Posts\Controllers\PostController as PostController;

class mainController
{
    public static function renderInfo(array $aAtts)
    {
        $aAtts = wp_parse_args(
            $aAtts,
            [
                'post_type'     => '',
                'items_per_row' => 3,
                'number_of_row' => 4,
            ]
        );
        switch ($aAtts['post_type']) {
            case 'portfolios':
                $html = PortfolioController::renderPortfolio($aAtts);
                echo $html;
                break;
            case 'post':
                $html = PostController::renderPost($aAtts);
                echo $html;
                break;
        }
    }
}
