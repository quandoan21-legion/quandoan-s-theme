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

            case 'our_services':
                $oDisplay = new OurServicesLayout();
                break;
        }
        return $oDisplay;
    }
}