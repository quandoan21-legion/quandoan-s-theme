<?php

namespace TextWithPostsLayout\Controllers;

    class TextWithPostsLayout
{
    public function __construct()
    {
        add_action('init', [$this, 'customTextWithPostsLayout']);
    }

    public function customTextWithPostsLayout()
    {
        $aLabels = [
            'name'          => 'TextWithPostsLayout',
            'singular_name' => 'TextWithPostsLayout',
        ];

        $aArgs = [
            'labels'             => $aLabels,
            'description'        => 'just a custom Layout',
            'public'             => true,
            'has_archive'        => true,
            'publicly_queryable' => true,
            'menu_icons'         => 'dashicons-align-left',
            'rewrite'            => ['slug' => 'TextWithPostsLayout'],
            'supports'           => ['title', 'editor', 'author', 'thumbnail']];

        register_post_type('ourservice', $aArgs);
    }
}