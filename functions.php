<?php
namespace Theme;
use Src\Scripts\ThemeEnqueue as ThemeEnqueue;
use Src\Scripts\CustomFilterHooks as CustomFilterHooks;
use Src\Scripts\CustomActionHooks as CustomActionHooks;
use Posts\Controllers\PostController as PostController;
use Portfolios\Controllers\PortfolioController as PortfolioController;
use Src\MainController as MainController;
use Portfolios\RegisterPortfolio as RegisterPortfolio;
use Posts\RegisterPosts as RegisterPosts;
use Src\Setting\CustomSetting as CustomSetting;
// SET UP - DEFINE
define('LIBRARY', get_theme_file_path());
define('ASSETS', get_theme_file_uri());
// INCLUDES
require_once(LIBRARY ."/vendor/autoload.php");
require_once("core/init.php");
add_filter('widget_text', 'do_shortcode');
add_theme_support('post-thumbnails');

// HOOK ACTION - FILTER


/**
 * SHORT CODE
 */
new ThemeEnqueue();
new CustomFilterHooks();
new CustomActionHooks();
new PostController();
new PortfolioController();
new MainController();
new RegisterPortfolio();
new RegisterPosts();
new CustomSetting();

