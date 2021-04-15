<?php

namespace ThemeSrc\Menu\Controllers;

class MenuController
{
    public function __construct()
    {
        add_theme_support('menus');
        add_action('init', [$this, 'registerMenu']);
    }

    public function registerMenu()
    {
        $aNav = array(
            'main-nav '  => 'Menu chính',
        );
        foreach ($aNav as $value) {
            $key = array_search($value, $aNav);
            if (has_nav_menu($key) == false) {
                register_nav_menus( $key, $value);
            }
        }
    }
}
