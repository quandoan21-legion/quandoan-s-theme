<?php

namespace Src\Shared\Controllers;

interface Layout
{
    public function renderContainerClass(string $itemsPerRow, string $typeOfPost);
    public function renderLayout(\WP_Post $post, array $aAtts);
}
