<?php

namespace OurServices\Controllers;

class RegisterOurServices
{
    public function __construct()
    {
        add_action('init', [$this, 'customAboutUs']);
    }

    public function customAboutUs()
    {
        $aLabels = [
            'name'          => 'OurServices',
            'singular_name' => 'OurService',
        ];

        $aArgs = [
            'labels'             => $aLabels,
            'description'        => 'just a custom Ourservice Post Type',
            'public'             => true,
            'has_archive'        => true,
            'publicly_queryable' => true,
            'menu_icons'         => 'dashicons-align-left',
            'rewrite'            => ['slug' => 'AboutUs'],
            'supports'           => ['title', 'editor', 'author', 'thumbnail']];

        register_post_type('ourservice', $aArgs);
    }
}