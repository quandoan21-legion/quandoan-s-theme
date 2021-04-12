<?php
namespace Src\Scripts;

class ThemeEnqueue
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'qd_enqueue']);
    }

    function qd_enqueue()
    {
        

        $ver = time();
        // css
        wp_register_style('qd_googlefont', ASSETS . 'https://fonts.googleapis.com/css?family=Work+Sans:400,600&display=swap');
        wp_register_style('qd_bootstrap', ASSETS .  '/assets/css/bootstrap.min.css');
        wp_register_style('qd_slick', ASSETS .  '/assets/css/slick.css');
        wp_register_style('qd_main', ASSETS .  '/assets/css/main.css');
        wp_register_style('qd_custom', ASSETS .  '/assets/css/custom.css');
        wp_register_style('qd_icofont', ASSETS .  '/assets/css/icofont.min.css');
        //enqueue
        wp_enqueue_style('qd_googlefont');
        wp_enqueue_style('qd_bootstrap');
        wp_enqueue_style('qd_slick');
        wp_enqueue_style('qd_main');
        wp_enqueue_style('qd_custom');
        wp_enqueue_style('qd_icofont');;
        
        // JS

        wp_register_script('qd_bootstrap',ASSETS .  '/assets/js/bootstrap.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_popper',ASSETS .  '/assets/js/popper.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_slick',ASSETS .  '/assets/js/slick.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_smooth-scroll',ASSETS .  '/assets/js/smooth-scroll.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_jquery-3.2.1',ASSETS .  '/assets/js/jquery-3.2.1.slim.min.js', array('jquery-core'), $ver, 'in_footer');
        wp_register_script('qd_main',ASSETS .  '/assets/js/main.js', array('jquery-core'), $ver, 'in_footer');

        wp_enqueue_script('qd_bootstrap');
        wp_enqueue_script('qd_popper');
        wp_enqueue_script('qd_slick');
        wp_enqueue_script('qd_smooth-scroll');
        wp_enqueue_script('qd_jquery-3.2.1');
        wp_enqueue_script('qd_main');
    }
}



