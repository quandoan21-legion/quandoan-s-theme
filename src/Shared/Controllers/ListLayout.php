<?php

namespace Src\Shared\Controllers;
use Src\Shared\Controllers\SharedController as SharedController;
class ListLayout implements Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    {
        $itemsPerRow = new SharedController;
        $itemsPerRow->renderContainerTagClass();
        echo $itemsPerRow;die;
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
