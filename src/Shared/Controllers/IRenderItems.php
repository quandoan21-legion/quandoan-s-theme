<?php

namespace Src\Shared\Controllers;

interface IRenderItems
{
    public function __construct();
    public function renderContainerTagClasses(array $aAtts=[]);
    public function renderHtml(\WP_Post $post, $aAtts);
}
