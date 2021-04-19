<?php

namespace Portfolios\Controllers;

class RegisterPortfolio
{
    public function __construct()
    {
        add_action('init', [$this, 'custom_portfolios']);
        add_action('init', [$this, 'portfolio_taxonomy']);
    }

    public function custom_portfolios()
    {
        $aLabels = [
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
        ];
        $aArgs   = [
            'labels' => $aLabels,
            'desscription' => 'just a custom fortfolio post type',
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-media-document ',
            'supports' => ['title', 'editor', 'thumbnail'],
            'rewrite' => ['slug' => 'Portfolios'],

        ];

        register_post_type('portfolios', $aArgs);
    }

    public function portfolio_taxonomy()
    {
        $aLabels = [
            'name' => 'Portfolio taxonomies',
            'singular_name' => 'Portfolio taxonomy',
        ];

        $aArgs = [
            'labels' => $aLabels,
            'public' => true,
            'hierarchical' => true,
        ];
        register_taxonomy('portfolios', ['portfolios'], $aArgs);
    }
}
