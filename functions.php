<?php
// SET UP - DEFINE
define('THEME_URI', get_theme_file_uri());
define('THEME_PATH', get_theme_file_path());
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");
require_once( CORE . "/init.php");
// INCLUDES

include('src/Portfolios/Controllers/PortfolioController.php');
include('src/Posts/Controllers/PostController.php');
include('src/mainController.php');

// HOOK ACTION - FILTER
include('src/Scripts/enqueue.php');
include('src/Scripts/custom_setting.php');
include('src/Scripts/custom_post_type.php');
include('src/Scripts/custom_action_hook.php');
include('src/Scripts/custom_filter_hook.php');
// add_action('init', 'quandoan_nav_menu');


/**
 * SHORT CODE
 */


