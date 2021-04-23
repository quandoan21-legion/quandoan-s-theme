<?php

namespace Src\Shared\Controllers;


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