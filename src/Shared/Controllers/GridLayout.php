<?php

namespace Src\Shared\Controllers;

class GridLayout implements Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    {
        switch ($typeOfPost) {
            case 'important':
                $containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                break;

            default:
                $containerClasses = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;
        }
        return $containerClasses;
    }
}
