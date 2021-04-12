<?php
namespace Theme;
use Src\Scripts\IncludeFiles as IncludeFiles; 

// SET UP - DEFINE
define('LIBRARY', get_theme_file_path());
define('ASSETS', get_theme_file_uri());
// INCLUDES
require_once(LIBRARY ."/vendor/autoload.php");
require_once("core/init.php");
new IncludeFiles();

// HOOK ACTION - FILTER


/**
 * SHORT CODE
 */


