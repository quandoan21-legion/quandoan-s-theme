<?php

namespace Src\Scripts;

use Src\Scripts\ThemeEnqueue as ThemeEnqueue;
use Src\Scripts\CustomFilterHooks as CustomFilterHooks;
use Src\Scripts\CustomActionHooks as CustomActionHooks;
use Src\Scripts\CustomPostType as CustomPostType;
use Src\Scripts\CustomSetting as CustomSetting;
use Posts\Controllers\PostController as PostController;
use Portfolios\Controllers\PortfolioController as PortfolioController;
use Src\MainController as MainController;

class IncludeFiles
{
    public function __construct()
    {
        new ThemeEnqueue();
        new CustomFilterHooks();
        new CustomActionHooks();
        new CustomPostType();
        new CustomSetting();
        new PostController();
        new PortfolioController();
        new MainController();
    }
}
