<?php

namespace Portfolios\Controllers;

class RegisterPortfolio
{
    public function __construct()
    {
        add_action('init', [$this, 'customPortfolio']);
        add_action('init', [$this, 'portfolioTaxonomy']);
    }

    public function customPortfolio()
    {
        $aLabels = [
            'name'          => 'Portfolio',
            'singular_name' => 'Portfolio',
        ];
        $aArgs   = [
            'labels'             => $aLabels,
            'description'        => 'just a custom Portfolios post type',
            'public'             => true,
            'has_archive'        => true,
            'publicly_queryable' => true,
            'menu_icon'          => 'dashicons-media-document ',
            'supports'           => ['title', 'editor', 'thumbnail', 'post-thumbnail'],
            'rewrite'            => ['slug' => 'Portfolios'],

        ];

        register_post_type('portfolios', $aArgs);
    }

    public function portfolioTaxonomy()
    {
        $aLabels = [
            'name'          => 'Portfolio taxonomies',
            'singular_name' => 'Portfolio taxonomy',
        ];

        $aArgs = [
            'labels'       => $aLabels,
            'public'       => true,
            'hierarchical' => true,
        ];
        register_taxonomy('portfolios', ['portfolios'], $aArgs);
    }
}
