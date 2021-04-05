<?php


if (!function_exists('qd_enqueue')) {
    function qd_enqueue()
    {
        $ver = time();
        // css
        wp_register_style('qd_googlefont', 'https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap');
        wp_register_style('qd_bootstrap', THEME_URI . '/assets/css/bootstrap.min.css');
        wp_register_style('qd_icofont', THEME_URI . '/icofont.min.css');
        wp_register_style('qd_slick', THEME_URI . '/assets/css/slick.css');
        wp_register_style('qd_main', THEME_URI . '/assets/css/main.css');
        //enqueue
        wp_enqueue_style('qd_googlefont');
        wp_enqueue_style('qd_bootstrap');
        wp_enqueue_style('qd_icofont');
        wp_enqueue_style('qd_slick');
        wp_enqueue_style('qd_main');

        // JS

        wp_register_script('qd_bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_popper', THEME_URI . '/assets/js/popper.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_slick', THEME_URI . '/assets/js/slick.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_smooth-scroll', THEME_URI . '/assets/js/smooth-scroll.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_jquery-3.2.1', THEME_URI . '/assets/js/jquery-3.2.1.slim.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_main', THEME_URI . '/assets/js/main.js', array('jquery-core'), $ver, 'in_footer');

        wp_enqueue_script('qd_bootstrap');
        wp_enqueue_script('qd_popper');
        wp_enqueue_script('qd_slick');
        wp_enqueue_script('qd_smooth-scroll');
        wp_enqueue_script('qd_jquery-3.2.1');
        wp_enqueue_script('qd_main');
    }
}
