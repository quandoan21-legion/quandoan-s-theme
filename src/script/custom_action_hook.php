<?php

add_action('after_setup_theme', 'quantheme_after_theme_setup');
function quantheme_after_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menus(
        array(
            'main-nav' => 'Menu chính'
        )
    );
}



