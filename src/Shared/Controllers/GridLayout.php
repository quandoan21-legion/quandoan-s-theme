<?php

namespace Src\Shared\Controllers;

class GridLayout implements Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost)
    : string
    {
        return "col-12 col-lg-" . $itemsPerRow . " work-box";
    }
}
