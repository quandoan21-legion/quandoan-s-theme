<?php

namespace Src\Shared\Controllers;

interface Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost);
}
