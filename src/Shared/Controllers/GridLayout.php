<?php

namespace Src\Shared\Controllers;

class GridLayout implements IRenderItems
{
    public $classes;

    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    {
        switch ($typeOfPost) {
            case 'important':
                $this->classes = "col-12 col-lg-" . $itemsPerRow . " blog-box blog-first";
                break;

            default:
                $this->classes = "col-12 col-lg-" . $itemsPerRow . " blog-box";
                break;
        }
        return $this;
    }
    public function renderHtml(object $oThis, array $aNeededVal)
    {
    }
}
