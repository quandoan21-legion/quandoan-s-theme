<?php
if (! function_exists('quandoan_nav_menu')) {
    function quandoan_nav_menu() {
        register_nav_menus(
            array(
                'main-nav'   => 'Menu chính',
                'footer-nav' => 'Menu footer',
                'header-nav' => 'Menu header',
            )
        );
    }
}

    wp_nav_menu(array(
        'theme_location' => 'main-nav', // tên location cần hiển thị
        'container' => 'nav', // thẻ container của menu
        'container_class' => 'navbar navbar-expand-lg navbar-light', //class của container
        'menu_class' => 'collapse navbar-collapse' // class của menu bên trong
    ));