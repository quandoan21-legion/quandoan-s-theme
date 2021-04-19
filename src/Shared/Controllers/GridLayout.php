<?php

namespace Src\Shared\Controllers;

class GridLayout implements Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    : string
    {
        $containerClasses = "col-12 col-lg-" . $itemsPerRow . " work-box";
        return $containerClasses;
    }
}
