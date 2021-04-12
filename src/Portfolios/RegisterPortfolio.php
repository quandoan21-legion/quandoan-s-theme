<?php

namespace Portfolios;

class RegisterPortfolio
{
    public function __construct()
    {
        add_action('init', [$this, 'custom_portfolios']);
        add_action('init', [$this, 'portfolio_taxonomy']);
    }
    public function custom_portfolios()
    {
        $aLabels                  =  array(
            'name'               => 'Portfolios',
            'singular_name'      => 'Portfolio',
        );
        $aArgs                    =  array(
            'labels'             => $aLabels,
            'desscription'       => 'just a custom fortfolio post type',
            'public'             => true,
            'has_archive'        => true,
            'publicly_queryable' => true,
            'has_archive'        => true,
            'menu_icon'          => 'dashicons-media-document ',
            'supports'           => array('title', 'editor', 'thumbnail'),
            'rewrite'            => array('slug' => 'Portfolios'),

        );

        register_post_type('portfolios', $aArgs);
    }

    public function portfolio_taxonomy()
    {
        $aLabels                  =  array(
            'name'               => 'Portfolio taxonomies',
            'singular_name'      => 'Portfolio taxonomy',
        );

        $aArgs                    =  array(
            'labels'             => $aLabels,
            'public'             => true,
            'hierarchical'       => true,
        );
        register_taxonomy('portfolios', array('portfolios'), $aArgs);
    }
}
