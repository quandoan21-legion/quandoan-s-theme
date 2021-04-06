<?php
class MenuController {
    public function __construct()
    {
        add_action('init', [$this, 'registerMenu']);
    }

    public function registerMenu() {
        register_nav_menus(
            array(
                'main-nav'   => 'Menu chính',
                'footer-nav' => 'Menu footer',
                'header-nav' => 'Menu header',
            )
        );
    }
}