<?php

function portfolio_custom_posts()
{

    $labels = array(
        'name'          => 'Portfolios',
        'singular_name' => 'Portfolio',
    );
    $args              =  array(
        'labels'             => $labels,
        'desscription'       => 'just a custom fortfolio post type',
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-media-document ',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'rewrite'            => array('slug' => 'Portfolios'),

    );

    register_post_type('portfolios', $args);
}
add_action('init', 'portfolio_custom_posts');

function quandoan_custom_posts()
{

    $labels = array(
        'name'          => 'quandoans',
        'singular_name' => 'quandoan',
    );
    $args              =  array(
        'labels'             => $labels,
        'desscription'       => 'just a custom quandoan post type',
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-media-document ',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'rewrite'            => array('slug' => 'quandoan'),

    );

    register_post_type('quandoans', $args);
}
add_action('init', 'quandoan_custom_posts');

function portfolio_taxonomy()
{

    $labels = array(
        'name'          => 'Portfolio taxonomies',
        'singular_name' => 'Portfolio taxonomy',
    );

    $args = array(
        'labels'       => $labels,
        'public'       => true,
        'hierarchical' => true,
    );

    register_taxonomy('portfolios', array('portfolios'), $args);
}

add_action('init', 'portfolio_taxonomy');
