<?php
// SET UP - DEFINE
define('THEME_URI', get_theme_file_uri());
define('THEME_PATH', get_theme_file_path());
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");
require_once( CORE . "/init.php");
// INCLUDES
include('src/script/enqueue.php');
include('src/script/custom_setting.php');
include('src/script/custom_post_type.php');
include('src/script/custom_action_hook.php');
include('src/script/custom_filter_hook.php');
include('src/Portfolios/Controllers/PortfolioController.php');
include('src/Posts/Controllers/PostController.php');
include('src/mainController.php');


// HOOK ACTION -FILTER
add_action('wp_enqueue_scripts', 'qd_enqueue');
// add_action('init', 'quandoan_nav_menu');


/**
 * SHORT CODE
 */


