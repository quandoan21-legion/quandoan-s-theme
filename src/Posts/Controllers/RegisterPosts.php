<?php

namespace Posts\Controllers;

class RegisterPosts
{
    function __construct()
    {
        add_action('init', [$this, 'quandoan_custom_posts']);
    }
    function quandoan_custom_posts()
    {

        $aLabels                  =  array(
            'name'               => 'quandoans',
            'singular_name'      => 'quandoan',
        );
        $aArgs                    =  array(
            'aLabels'             => $aLabels,
            'desscription'       => 'just a custom quandoan post type',
            'public'             => true,
            'has_archive'        => true,
            'publicly_queryable' => true,
            'has_archive'        => true,
            'menu_icon'          => 'dashicons-media-document ',
            'supports'           => array('title', 'editor', 'thumbnail', 'post-thumbnail'),
            'rewrite'            => array('slug' => 'quandoan'),

        );

        register_post_type('quandoans', $aArgs);
    }
}
