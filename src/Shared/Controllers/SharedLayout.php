<?php

namespace Src\Shared\Controllers;
use  SharedController\GridLayout\Controller\GridLayout as GridLayout;
use  SharedController\ListLayout\Controller\ListLayout as ListLayout;
use  SharedController\TextWithPostsLayout\Controller\TextWithPostsLayout as TextWithPostsLayout;

class SharedLayout
{
    function getLayout($layout)
    {
        switch ($layout) {
            case 'grid':
                $oDisplay = new GridLayout();
                break;

            case 'list':
                $oDisplay = new ListLayout();
                break;

            case 'text_with_posts':
                $oDisplay = new TextWithPostsLayout();
                break;
        }
        return $oDisplay;
    }
}