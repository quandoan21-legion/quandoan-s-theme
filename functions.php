<?php

namespace Theme;

session_start();
use Src\Scripts\ThemeEnqueue as ThemeEnqueue;
use Src\Scripts\CustomFilterHooks as CustomFilterHooks;
use Src\Scripts\CustomActionHooks as CustomActionHooks;
use Src\MainController as MainController;
use Src\Shared\Controllers\SharedController as SharedController;
use Src\Shared\Controllers\SharedLayout as SharedLayout;
use TextWithPostsLayout\Controllers\TextWithPostsLayout as TextWithPostsLayout;
use TextWithPostsLayout\Controllers\TextWithPostsController as TextWithPostsController;
use TextWithPictureLayout\Controllers\TextWithPictureLayoutController as TextWithPictureLayoutController;
use MessageLayout\Controllers\MessageLayoutController as MessageLayoutController;
use Banner\Controllers\BannerController as BannerController;
use Portfolios\Controllers\RegisterPortfolio as RegisterPortfolio;
use Portfolios\Controllers\PortfolioController as PortfolioController;
use Posts\Controllers\RegisterPosts as RegisterPosts;
use Posts\Controllers\PostController as PostController;
use Src\Setting\CustomSetting as CustomSetting;
// SET UP - DEFINE
define('LIBRARY', get_theme_file_path());
define('ASSETS', get_theme_file_uri());
// INCLUDES
require_once(LIBRARY . "/vendor/autoload.php");
require_once("core/init.php");
add_theme_support( 'post-thumbnails' );

// HOOK ACTION - FILTER


/**
 * SHORT CODE
 */
new ThemeEnqueue();
new CustomFilterHooks();
new CustomActionHooks();
new MainController();
new SharedLayout();
new TextWithPostsLayout();
new TextWithPostsController();
new TextWithPictureLayoutController();
new MessageLayoutController();
new BannerController();
new PortfolioController();
new PostController();
new SharedController();
new RegisterPortfolio();
new RegisterPosts();
new CustomSetting();





